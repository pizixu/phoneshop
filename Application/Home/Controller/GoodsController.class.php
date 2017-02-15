<?php
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller{
	public function index(){
		 $this->display();
	}
	public function show(){
		 $this->display();//调用当前控制器的当前方法所对应的模板;
		 $this->display('index');//调用当前控制器的另一个方法所对应的模板;
		 $this->display('Index/show');//调用另一个控制器的另一个方法所对应的模板;
	}
}
?>