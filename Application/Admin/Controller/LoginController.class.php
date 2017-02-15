<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function login(){
		if(IS_POST){
			$obj= new \Think\Verify();
			if($obj->check(I('post.captcha','','trim'))){
				$data['mg_name']=I('post.admin_user');
				$data['mg_pwd']=I('post.admin_psd','',mysql_real_escape_string);
				$row=M('manager')->where($data)->find();
				if($row){
					session('mg_id',$row['mg_id']);
					$this->redirect('Manager/index');
				}else{
				$this->error('用户名或密码错误!',U('login'),4);
				}
				
			}else{
				$this->error('验证码错误',U('login'),4);
			}
		 
		}
		$this->display();
	}

	public function verifyImg(){
		$config=array(
			'imageH'    =>  30,               // 验证码图片高度
			'imageW'    =>  100,               // 验证码图片宽度
			'length'    =>  4,               // 验证码位数
			'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
			'useCurve'  =>  true,            // 是否画混淆曲线
			'fontSize'  =>  15,              // 验证码字体大小(px)
			'useNoise'  =>  true,            // 是否添加杂点
			);
		$obj=new \Think\Verify($config);
		$obj->entry();
	}
}
?>