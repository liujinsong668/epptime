<?php if (!defined('THINK_PATH')) exit();?><!-- layout::Public:header::60 -->
<body class="iframeBody">
	<div class="category_edit">
		<h3>分类列表</h3>
		<div class="line"></div>
		<div id="categoryList">
			<form>
				<table>
					<thead>
						<tr class="categoryList_title">
							<th width="50" class="green bold">优先级</th>
							<th width="30" class="green bold">ID</th>
							<th width="300" class="green bold">栏目名称</th>
							<th class="green bold">描述</th>
							<th width="70" class="green bold">文章数</th>
							<th width="70" class="green bold">状态</th>
							<th width="160" class="green bold">操作</th>
						</tr>
					 </thead>
					 <tbody>
						 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;$mod = ($i % 2 )?><tr>
								<td><?php echo ($data["order_id"]); ?></td>
								<td><?php echo ($data["category_id"]); ?></td>
								<td style="text-align:left"><?php echo tree_title($data['category_title'],$data['level']);?></td>
								<td><?php echo ($data["content"]); ?></td>
								<td><?php echo ($data["itemnum"]); ?></td>
								<td><?php echo (category_status($data["status"])); ?></td>
								<td><a href="__URL__/edit/id/<?php echo ($data["category_id"]); ?>" class="green">编辑</a> <a href="__URL__/delete/id/<?php echo ($data["category_id"]); ?>" class="green">删除</a></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</form>
			<div class="line"></div>
			<a href="__URL__/add">添加分类</a>
			<div class="line"></div>
			<div class="line clear"></div>
		</div>
	</div>
<!-- layout::Public:footer::60 -->