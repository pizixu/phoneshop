<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改权限</title>
</head>
<body>
    <form action="/phoneshop/index.php/Admin/Authority/update/auth_id/16" method="post">
    <input type="hidden" name="auth_id" value="<?php echo ($current_auth["auth_id"]); ?>">
<table width="453" border="1" align="center">
  <tr>
    <th colspan="2" valign="middle">修改权限</th>
  </tr>
  <tr>
    <td width="170">权限名称:</td>  
      <td><input name="auth_name" type="text" id="textfield3" value="<?php echo ($current_auth["auth_name"]); ?>"></td>
  </tr>
  <tr>
    <td valign="middle">选择父级:</td>
    <td> 
      <select name="auth_pid" id="select">
        <option value="">请选择父级:</option>
      <?php if(is_array($parent_auth)): $i = 0; $__LIST__ = $parent_auth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['auth_id'] == $current_auth['auth_pid']): ?><option value="<?php echo ($vo["auth_id"]); ?>" selected="selected"><?php echo ($vo["auth_name"]); ?></option>
                <?php else: ?>
                 <option value="<?php echo ($vo["auth_id"]); ?>"><?php echo ($vo["auth_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </select>
     </td>
  </tr>
  <tr>
    <td>控制器名称:</td>
    <td> 
      <input name="auth_c" type="text" id="textfield2" value=" <?php echo ($current_auth["auth_c"]); ?>">
    </td>
  </tr>
  <tr>
    <td>方法名称:</td>
    <td> 
      <input name="auth_a" type="text" id="textfield3" value="<?php echo ($current_auth["auth_a"]); ?>">
     </td>
  </tr>
  <tr>
    <td colspan="2"> <input type="submit" name="button" id="button" value="提交"></td>
  </tr>
</table>

    </form>
</body>
</html>