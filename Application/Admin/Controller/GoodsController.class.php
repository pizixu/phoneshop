<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {
    public function showlist(){
      $model = M('goods'); // 实例化goods对象
      $recordcount= $model->count();// 查询满足要求的总记录数
      $page=new \Think\Page($recordcount,5);// 实例化分页类 传入总记录数和每页显示的记录数(5)
      //自定义分页样式设置;
      $page->lastSuffix=false;//最后一页是否显示总页数;
      $page->rollPage=4;//分页栏每页显示的页数;
      $page->setConfig('prev','【上一页】');
      $page->setConfig('next','【下一页】');
      $page->setConfig('first','【首页】');    
      $page->setConfig('last','【末页】');
      $page->setConfig('theme','共%TOTAL_ROW%条记录,当前是%NOW_PAGE%/%TOTAL_ROW%%FIRST% %UP_PAGE% %DOWN_PAGE% %END%');

      // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
      $startno=$page->firstRow;//起始行数;
      $pagesize=$page->listRows;//每页放多少个;
      $list=$model->limit("$startno,$pagesize")->select();
      $pagestr=$page->show();// 分页显示输出
      $this->assign('list',$list);// 赋值数据集
      $this->assign('pagestr',$pagestr);// 赋值分页输出
      $this->display(); // 输出模板
    }
    public function add(){
      $goods=M('goods');
      if(IS_POST){
          if($data=$goods->create()){
            //文件上传部分;
          if($_FILES['goods_image']['error']==0){
          $config=array(
            'rootPath'=>'./Application/Public/uploads/',
            );
          $upload=new \Think\Upload($config);
          $info = $upload->uploadOne($_FILES['goods_image']);
          //var_dump($info);
          $big=$info['savepath'].$info['savename'];
          $data['goods_big_img']=$big;
          $data['goods_create_time']=time();
      }
          //生成缩略图
          $image = new \Think\Image();
          //1:打开图片;
          $big_image=$upload->rootPath.$data['goods_big_img'];
          $image->open($big_image);
          //生成缩略图;
          $image->thumb(150, 150);// 按照原图的比例生成一个最大为150*150的缩略图;
          //保存
          $small_image=$upload->rootPath.$info['savepath'].'thumb_'.$info['savename'];
          $image->save($small_image);
          $data['goods_small_img']=$info['savepath'].'thumb_'.$info['savename'];


           if($goods->add($data)){
          //实现跳转;
              $this->success('添加商品成功!',U('showlist'),3);
             }else{
                  $this->error('添加商品失败!');
             }     
          }      
        }
        /*     if(IS_POST){
        if($goods=M('goods')->add(I('post.'))){
        $this->success('添加商品成功!',U('showlist'),3);
        }else{
        $this->error('添加商品失败!');
        }
        }*/
      //将模板中的选择分类显示取出;
          $category=M('category')->select();
          $this->assign('category',$category);
          $this->display();
    }
    public function update($goods_id){
      $goods=M('goods');
      if(IS_POST){
      if($data=$goods->create()){
          $data['goods_create_time']=time();//在提交的基础上,添加其他字段的值;
                                            //$data已经被create过滤的数组,直接赋值添加;
          if($goods->save($data)){
            $this->success('修改商品信息成功!',U('showlist'),3);
          }else{
            $this->error('修改商品信息失败!');
          }
      }
      }
      $data=M('goods')->find($goods_id);
      $category=M('category')->select();
      $this->assign('data',$data);
      $this->assign('category',$category);
      $this->display();
      }
    
    public function del($goods_id){
        if($goods=M('goods')->delete($goods_id)){
          $this->success('删除成功!',U('showlist'),3);
        }else{
          $this->error('删除失败!');
        }
    }
    public function send(){
      $send=new \Components\EmailTool();
      $send->send();
    }

}
 
