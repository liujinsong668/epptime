<?php if (!defined('THINK_PATH')) exit();?><!-- layout::Public:header::60 -->
<body class="iframeBody">
	<div class="item_add">
		<h3>添加文章</h3>
		<div class="line"></div>
		<form action="__URL__/insert" method="post" name="item_add">
			<table>
					<tr>
						<td class="label green">优先级:</td>
						<td><input type="text" name="order_id" value="1"/></td>
					</tr>
					<tr>
						<td class="label green">所属栏目:</td>
						<td>
							<select name="category_id">
								<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($data["category_id"]); ?>"><?php echo tree_title($data['category_title'],$data['level']);?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label green">标题:</td><td><input type="text" name="item_title" value=""/></td>
					</tr>
					<tr>
						<td class="label green">发布日期:</td><td><input type="text" name="publish_time" value="<?php echo date('Y-m-d h:i')?>"/></td>
					</tr>
					<tr>
						<td class="label green">关键字:</td><td><input type="text" name="keywords" value=""/></td>
					</tr>
					<tr>
						<td class="label green">作者:</td><td><input type="text" name="author" value=""/></td>
					</tr>
					<tr>
						<td class="label green">内容:</td>
						<td>
							<script charset="utf-8" src="__ROOT__/Public/Admin/Js/Kindeditor/kindeditor.js"></script>
							<script>
							KE.show({
							id : 'editor',
							width : '800px',
							height : '600px'
							});
							</script>
							<textarea id="editor" name="content"></textarea>							
						</td>
					</tr>
				</table>
			<input id="addCategory" class="green categorySubmit" value="添加该文章" type="submit" />
			<div class="line"></div>
		</form>
	</div>
<!-- layout::Public:footer::60 -->