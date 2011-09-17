<?php if (!defined('THINK_PATH')) exit();?><!-- layout::Public:header::60 -->
<body class="iframeBody">
	<div class="category_add">
		<h3>添加分类</h3>
		<div class="line"></div>
		<div id="add_form">
		<form action="__URL__/update/id/<?php echo ($list["category_id"]); ?>" name="edit_category" method="post">
		<input type="hidden" name="category_id" value="<?php echo ($list["category_id"]); ?>" />
			<table>
				<tr>
					<td class="label green">上级栏目:</td>
					<td>
						<select name="parent_id">
							<option value="<?php echo ($list["parent_id"]); ?>" selected="selected" style="color:red!important;">保持原有分类</option>
							<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;$mod = ($i % 2 )?><?php echo category_tree($data["category_id"],$data["category_title"]);?><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="label green">优先级:</td>
					<td><input type="text" name="order_id"  value="<?php echo ($list["order_id"]); ?>" size="5"/></td>
				</tr>
				<tr>
					<td class="label green">栏目名称:</td>
					<td><input type="text" name="category_title" value="<?php echo ($list["category_title"]); ?>" /></td>
				</tr>
				<tr>
					<td class="label green">描述:</td>
					<td>
							<script charset="utf-8" src="__ROOT__/Public/Admin/Js/Kindeditor/kindeditor.js"></script>
							<script>
							KE.show({
							id : 'editor2',
							width : '800px',
							height : '600px'
							});
							</script>
							<textarea id="editor2" name="content"><?php echo ($list["content"]); ?></textarea>					
					</td>
				</tr>
			</table>
			<div class="line"></div>
			<input id="addCategory" class="green categorySubmit" value="编辑该分类" type="submit" />
			<div class="line"></div>
				</form>
		</div>
	</div>
<!-- layout::Public:footer::60 -->