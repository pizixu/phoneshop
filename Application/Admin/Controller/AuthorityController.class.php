<?php
namespace Admin\Controller;
use Think\Controller;
class  AuthorityController extends Controller {
 	public function showlist(){
 		$list=M('auth')->select();
 		$this->assign('list',$list);
 		$this->display();
 	}
 	public function add(){
 		$model=M('auth');
 		if(IS_POST){
 		$data=$model->create();
 		$auth_id=$model->add($data);//先添加获取auth_id;
 			$info=array();
 		if($data['auth_pid']==0){
 			$info['auth_path']=$auth_id;
 			$info['auth_level']=0;
 		}else{
 			$info['auth_path']=$data['auth_pid'].'-'.$auth_id;
 			$info['auth_level']=1;
 		}
 			$info['auth_id']=$auth_id;
 			if($model->save($info)){
 				$this->success('增加权限成功!',U('showlist'),3);
 			}
 
 		}
 		$parent_auth=$model->where("auth_level=0")->select();//所有父级权限的信息;
 		$this->assign('parent_auth',$parent_auth);
 		$this->display();
 	}
 	public function update($auth_id){
 		$model=M('auth');
 		if(IS_POST){
 			$auth_info=$model->create();
 			if($auth_info){
 				 if($auth_info['auth_pid']==0){
 					$auth_info['auth_c']='';
 					$auth_info['auth_a']='';
 					$auth_info['auth_level']=0;
 					$auth_info['auth_path']=$auth_id;
 				}else{
 					$auth_info['auth_path']=$auth_info['auth_pid'].'-'.$auth_info['auth_id'];
 				}
 				if($model->save($auth_info)){
 					$this->success('修改权限成功!',U('showlist'),3);
 				}else{
 					$this->error('修改权限失败');
 				}
 			}

 		}
 		$model=M('auth');
 		$current_auth=M('auth')->find($auth_id);//当前权限的信息;
 		$parent_auth=$model->where("auth_level=0")->select();//所有父级权限的信息;
 		$this->assign('current_auth',$current_auth);
 		$this->assign('parent_auth',$parent_auth);
 		$this->display();
 	}
 	public function delete($auth_id){
 		 if($data=M('auth')->delete($auth_id)){
          $this->success('删除成功!',U('showlist'),3);
        }else{
          $this->error('删除失败!');
        }
 	}
}