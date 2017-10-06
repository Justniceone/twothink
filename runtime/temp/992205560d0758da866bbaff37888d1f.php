<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\www\twothink\public/../application/admin/view/default/category\tree.html";i:1496373782;}*/ ?>
 <?php if(is_array($tree) || $tree instanceof \think\Collection || $tree instanceof \think\Paginator): $i = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?> 
	<dl class="cate-item">
		<dt class="cf">
			<form action="<?php echo url('edit'); ?>" method="post">
				<div class="btn-toolbar opt-btn cf">
					<a title="编辑" href="<?php echo url('edit?id='.$list['id'].'&pid='.$list['pid']); ?>">编辑</a>
					<a title="<?php echo show_status_op($list['status']); ?>" href="<?php echo url('setStatus?ids='.$list['id'].'&status='.abs(1-$list['status'])); ?>" class="ajax-get"><?php echo show_status_op($list['status']); ?></a>
					<a title="删除" href="<?php echo url('remove?id='.$list['id']); ?>" class="confirm ajax-get">删除</a>
					<a title="移动" href="<?php echo url('operate?type=move&from='.$list['id']); ?>">移动</a>
					<a title="合并" href="<?php echo url('operate?type=merge&from='.$list['id']); ?>">合并</a>
				</div>
				<div class="fold"><i></i></div>
				<div class="order"><input type="text" name="sort" class="text input-mini" value="<?php echo $list['sort']; ?>"></div>
				<div class="order"><?php echo !empty($list['allow_publish'])?'是':'否'; ?></div>
				<div class="name">
					<span class="tab-sign"></span>
					<input type="hidden" name="id" value="<?php echo $list['id']; ?>">
					<input type="text" name="title" class="text" value="<?php echo $list['title']; ?>">
					<a class="add-sub-cate" title="添加子分类" href="<?php echo url('add?pid='.$list['id']); ?>">
						<i class="icon-add"></i>
					</a>
					<span class="help-inline msg"></span>
				</div>
			</form>
		</dt>
		<?php if(!(empty($list['_']) || (($list['_'] instanceof \think\Collection || $list['_'] instanceof \think\Paginator ) && $list['_']->isEmpty()))): ?>
			<dd>
				<?php echo action('Category/tree', array($list['_'])); ?>
			</dd>
		<?php endif; ?>
		 
	</dl>
<?php endforeach; endif; else: echo "" ;endif; ?>