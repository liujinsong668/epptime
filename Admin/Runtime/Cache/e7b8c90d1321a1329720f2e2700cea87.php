<?php if (!defined('THINK_PATH')) exit();?><!-- layout::Public:header::60 -->
<body class="iframeBody">
	<div class="item_edit">
		<h3>文章列表</h3>
		<div class="line"></div>
		<div id="categoryList">
			<form>
				<table>
					<thead>
						<tr>
							<th width="40" class="green  bold">ID</th>
							<th width="40" class="green  bold">优先级</th>
							<th width="100" class="green  bold">所属栏目</th>
							<th class="green  bold">标题</th>
							<th width="100" class="green  bold">发布时间</th>
							<th width="70" class="green  bold">点击</th>
							<th width="70" class="green  bold">状态</th>
							<th width="150" class="green  bold">操作</th>
						</tr>
					 </thead>
					 <tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;$mod = ($i % 2 )?><tr>
								<td><?php echo ($data["item_id"]); ?></td>
								<td><?php echo ($data["order_id"]); ?></td>
							 	<td><?php echo ($data["category_title"]); ?></td>
								<td><?php echo ($data["item_title"]); ?></td>
								<td><?php echo (date("Y-m-d H:i",$data["publish_time"])); ?></td>
								<td><?php echo ($data["hits"]); ?></td>
								<td><?php echo item_status($data["status"]);?></td>	
								<td><a href="javascript:void(0);" class="green">审核</a> <a href="__URL__/edit/id/<?php echo ($data["item_id"]); ?>" class="green">编辑</a> <a href="__URL__/delete/id/<?php echo ($data["item_id"]); ?>" class="green">删除</a></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</form>
			<div class="line"></div>
			<a href="__URL__/add">添加文章</a>
			<div class="line"></div>
			<div id="changePage" class="line">
				<?php echo ($page); ?>
			</div>
			<div class="line clear"></div>
		</div>
	</div>
<!-- layout::Public:footer::60 -->