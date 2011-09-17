<?php if (!defined('THINK_PATH')) exit();?><!-- layout::Public:header::60 -->
<body class="iframeBody">
	<div class="item_add">
		<h3>编辑文章</h3>
		<div class="line"></div>
		<form action="__URL__/update/id/<?php echo ($list["item_id"]); ?>" method="post" name="item_add">
			<input type="hidden" name="item_id" value="<?php echo ($list["item_id"]); ?>" />
			<table>
					<tr>
						<td class="label green">优先级:</td>
						<td><input type="text" name="order_id" value="<?php echo ($list["order_id"]); ?>"/></td>
					</tr>
					<tr>
						<td class="label green">所属栏目:</td>
						<td>
							<select name="category_id">
								<option selected="selected" value="<?php echo ($list["category_id"]); ?>" style="color:blue!important;"><?php echo ($list["category_title"]); ?></option>
								<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($data["category_id"]); ?>"><?php echo tree_title($data['category_title'],$data['level']);?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label green">标题:</td><td><input type="text" name="item_title" value="<?php echo ($list["item_title"]); ?>"/></td>
					</tr>
					<tr>
						<td class="label green">发布日期:</td><td><input type="text" name="publish_time" value="<?php echo (date("Y-m-d H:i",$list["publish_time"])); ?>"/></td>
					</tr>
					<tr>
						<td class="label green">关键字:</td><td><input type="text" name="keywords" value="<?php echo ($list["keywords"]); ?>"/></td>
					</tr>
					<tr>
						<td class="label green">作者:</td><td><input type="text" name="author" value="<?php echo ($list["author"]); ?>"/></td>
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
							<textarea id="editor" name="content"><?php echo ($list["content"]); ?></textarea>							
						</td>
					</tr>
				</table>
			<input id="addCategory" class="green categorySubmit" value="编辑该文章" type="submit" />
			<div class="line"></div>
		</form>
	</div>
<!-- layout::Public:footer::60 -->