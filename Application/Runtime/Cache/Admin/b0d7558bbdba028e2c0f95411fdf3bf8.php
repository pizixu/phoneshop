<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TP语法判断</title>
</head>
<body>
	你的成绩是:<?php echo ($score); ?><br/>
  	<?php if($score > 90): ?>孩子,你是我的骄傲！
  		<?php elseif($score > 80): ?>
  		宝贝,好样的!
  		<?php elseif($score > 70): ?>
  		你离优秀不远了!
  		<?php elseif($condition > 60): ?>
  		看来,你不女里不行了!
  		</else>
  		放弃吧!<?php endif; ?>
  	<hr>
	<?php $__FOR_START_24762__=0;$__FOR_END_24762__=100;for($i=$__FOR_START_24762__;$i < $__FOR_END_24762__;$i+=10){ ?>锄禾日当午!<?php } ?>
</body>
</html>