<?php
	header('Access-Control-Allow-Origin:*');
	date_default_timezone_set("PRC");
	echo '<form action="create_exe" method="post" class="smart-green">
			<h3>创建MOCK项目
			<span>请确保项目名称全局唯一.</span>
			</h3>
			<label>
			<span>项目名称 :</span>
			<input id="name" type="text" name="name" placeholder="请使用字母名称" />
			</label>

			<label>
			<span>Mock 类型 :</span>
				<select name="mock_type">
				<option value="http">http</option>
				<option value="https">https</option>
				</select>
			</label>

			<label>
			<span>项目描述 :</span>
			<textarea id="summary" name="summary" placeholder=""></textarea>
			</label>

			<label>
			<span>&nbsp;</span>
			<input type="submit" class="button" value="提交" />
			</label>
	</form>'
?>
