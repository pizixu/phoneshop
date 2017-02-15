<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends Controller{
	public function showlist(){
		$list=M('role')->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function update($role_id){
/*	方法1:	$list=M('role');
		if(IS_POST){
		if($data=$list->create()){
			if($list->save($data)){
				$this->success('分配权限成功!',U('showlist'),3);
			}else{
				$this->error('分配权限失败!');
			}
		}
		
		}
		$role=M('role')->find($role_id);
		$this->assign('role',$role);*/
	/*	方法2:*/
	$data1=M('role');
	if(IS_POST){
	 	$auth_id_array=$_POST['auth'];
	 	$auth_id_string=implode(',',$auth_id_array);
	 	$auth=M('auth')->select($auth_id_string);
	 	$array=array();
	 	foreach ($auth as $v) {
	 		if(empty($v['auth_c'])||empty($v['auth_a']))
	 			continue;
	 		$array[]=$v['auth_c'].'-'.$v['auth_a'];
	 	}
	 		$role_auth_ac=implode(',',$array);
	 		$data['role_id']=$role_id;
	 		$data['role_auth_ids']=$auth_id_string;
	 		$data['role_auth_ac']=$role_auth_ac;
	 	if($data1->save($data)){
	 		$this->success('分配权限成功!',U('showlist'),3);
	 	}else{
	 		$this->error('分配权限失败');
	 	}
		$info=$data1->create();
	}
		 $role=M('role')->find($role_id);
		 $this->assign('role',$role);
		 $role_auth_ids=$role['role_auth_ids'];
		 $role_auth_id_array=explode(',',$role_auth_ids);//把权限的集合字符串切割成数组;
		 $this->assign('role_auth_id_array',$role_auth_id_array);

		 $info1=M('auth')->where("auth_level=0")->select();
      	 $info2=M('auth')->where("auth_level=1")->select();
      	 $this->assign('info1',$info1);
      	 $this->assign('info2',$info2);
		 $this->display();
	}
}

?>