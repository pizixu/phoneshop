<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改角色</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="http://localhost/phoneshop/Application/Admin/Public/css/mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：角色管理-》修改角色信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/phoneshop/index.php/Admin/Role/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="/phoneshop/index.php/Admin/Role/update/role_id/1" method="post" enctype="multipart/form-data">
<!--  方法1：             <table border="1" width="100%" class="table_a">
              <tr></tr>
              <tr>
                <td>角色序号</td>
                <td><input type="text" name="role_id" id="role_name" value="<?php echo ($role["role_id"]); ?>" /></td>
              </tr>
              <tr>
                <td>角色名称</td>
                <td><input type="text" name="role_name" id="role_name" value="<?php echo ($role["role_name"]); ?>" /></td>
              </tr>
              <tr>
                <td>权限集合</td>
                <td><input type="text" name="role_auth_ids" id="role_name" value="<?php echo ($role["role_auth_ids"]); ?>" /></td>
              </tr>
              <tr>
                <td>模块操作</td>
                <td><input type="text" name="role_auth_ac" id="role_price" value="<?php echo ($role["role_auth_ac"]); ?>" /></td>
              </tr>
              <tr>
                <input type="hidden" name="role_id" value="<?php echo ($role["role_id"]); ?>" />
              </tr>
              <tr>
                <td colspan="2" align="center"><input type="submit" value="修改提交" /></td>
              </tr>
              </table> -->
    <!-- 方法2:-->     
            <dl>
                <?php if(is_array($info1)): $i = 0; $__LIST__ = $info1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><dt>
                <?php if(in_array($vo1['auth_id'],$role_auth_id_array)): ?><input type="checkbox" name="auth[]" value="<?php echo ($vo1["auth_id"]); ?>" checked="checked">
                    <?php else: ?>
                    <input type="checkbox" name="auth[]" value="<?php echo ($vo1["auth_id"]); ?>"><?php endif; ?>
                <?php echo ($vo1["auth_name"]); ?>
                </dt>
                <?php if(is_array($info2)): $i = 0; $__LIST__ = $info2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if($vo1['auth_id'] == $vo2[auth_pid]): ?><dd>
                <?php if(in_array($vo2['auth_id'],$role_auth_id_array)): ?><input type="checkbox" name="auth[]" value="<?php echo ($vo2["auth_id"]); ?>" checked="checked">
                  <?php else: ?>
                   <input type="checkbox" name="auth[]" value="<?php echo ($vo2["auth_id"]); ?>"><?php endif; ?>            
                <?php echo ($vo2["auth_name"]); ?>
                </dd><?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
            </dl>   
            <input type="submit" value="修改提交"> 

           </form>
        </div>
    </body>
</html>