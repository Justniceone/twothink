<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\www\twothink\public/../application/home/view/default/category\lists.html";i:1496373782;}*/ ?>
<?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;if($current == $cate['id']): ?>
		<li class="active">
			<a href="<?php echo url('Article/lists?category='.$cate['name']); ?>">
				<i class="icon-chevron-right"></i><?php echo $cate['title']; ?>
			</a>
		</li>
	<?php else: ?>
		<li>
			<a href="<?php echo url('Article/lists?category='.$cate['name']); ?>">
				<i class="icon-chevron-right"></i><?php echo $cate['title']; ?>
			</a>
		</li>
	<?php endif; endforeach; endif; else: echo "" ;endif; ?>
