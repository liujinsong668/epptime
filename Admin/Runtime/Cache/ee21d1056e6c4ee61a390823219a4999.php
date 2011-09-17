<?php if (!defined('THINK_PATH')) exit();?><!-- layout::Public:header::60 -->
<body class="iframeBody">
	<div class="category_add">
		<h3>添加分类</h3>
		<div class="line"></div>
		<div id="add_form">
		<form action="__URL__/insert" method="post" name="category_add">
			<table>
				<tr>
					<td class="label green">上级栏目:</td>
					<td>
						<select name="parent_id">
							<option value="0" selected="selected" style="color:blue!important;">根分类</option>
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($data["category_id"]); ?>"><?php echo tree_title($data['category_title'],$data['level']);?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="label green">优先级:</td>
					<td><input type="text" name="order_id"  value="1" size="5"/></td>
				</tr>
				<tr>
					<td class="label green">栏目名称:</td>
					<td><input type="text" name="category_title" /></td>
				</tr>
				<tr>
					<td class="label green">描述:</td>
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
			<div class="line"></div>
			<input id="addCategory" class="green categorySubmit" value="添加该分类" type="submit" />
			<div class="line"></div>
			</form>
		</div>
	</div>
<!-- layout::Public:footer::60 -->