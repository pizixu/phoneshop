<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $this->display();
    }
      public function show(){
      	//var_dump(get_defined_constants(true));//获取所有的系统常量;
      	//常用的几个系统常量
      	//echo "当前请求地址:".__SELF__.'<br/>';//当前请求地址:/phoneshop/index.php/admin/index/show
      	//echo "当前分组:".__MODULE__.'<br/>';//当前分组:/phoneshop/index.php/Admin
      	//echo "当前控制器".__CONTROLLER__.'<br/>';//当前控制器/phoneshop/index.php/Admin/Index
      	//echo "当前方法:".__ACTION__.'<br/>';//当前方法:/phoneshop/index.php/Admin/Index/show
      	//echo "当前网站地址:".__ROOT__.'<br/>';//当前网站地址:/phoneshop
       //$this->display();
    }
      public function test1(){
        $this->assign('score',88);
        $this->display();
      }
}