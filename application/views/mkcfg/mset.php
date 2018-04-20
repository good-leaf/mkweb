<?php
	header('Access-Control-Allow-Origin:*');
	$pname = $_GET['pname'];
	echo '<form action="create/mcreate" method="post" class="smart-green">
		<h3>创建MOCK接口配置</h3>

		<label>
		<span>项目名称 :</span>
		<input type="text" name="pname" value='.$pname.' readonly="true" >
		</label>
		<label>
		<span>异步回调支持 :</span>
			<select name="async_callback">
			<option value="false">false</option>
			<option value="true">true</option>
			</select>
		</label>

		<label>
		<span>&nbsp;</span>
		<input type="submit" class="button" value="提交" />
		</label>
	</form>'
?>
