<?php
	header('Access-Control-Allow-Origin:*');
	date_default_timezone_set("PRC");
	$pname = $_POST['pname'];
	echo '<form action="mcreate_exe" method="post" class="smart-green">
		<h3>创建MOCK接口配置</h3>

		<label>
        <span>项目名称 :</span>
		<input type="text" name="pname" value='.$pname.' readonly="true">  
        </label>

		<label>
		<span>请求方式 :</span>
			<select name="method">
			<option value="post">post</option>
			<option value="get">get</option>
			<option value="put">put</option>
			<option value="delete">delete</option>
			</select>
		</label>
		
		<label>
		<span>路径 :</span>
		<input id="path" type="text" name="path" placeholder="/path" />
		</label>
		
		<label>
		<span>请求头参数 :</span>
		<textarea id="herders" name="headers" placeholder="json"></textarea>
		</label>
		
		<label>
		<span>匹配条件 :</span>
		<textarea id="condition" name="condition" placeholder="json"></textarea>
		</label>

		<label>
			<span>匹配优先级 :</span>
			<input id="sort" type="text" value="0" name="sort" placeholder="0" />
		</label>
		
		<label>
		<span>响应数据 :</span>
		<textarea id="response" name="response" placeholder="json"></textarea>
		</label>
		
		<label>
		<span>响应状态 :</span>
		<input id="httpcode" type="text" value="200" name="httpcode" placeholder="200" />
		</label>
		
		<label>
		<span>接口描述 :</span>
		<textarea id="summary" name="summary" placeholder=""></textarea>	
	    </label>';

	if($_POST['async_callback'] == "true")
	{
		echo '
			<label>
			<span>异步回调支持>></span>
			<input type="text" name="async_callback" value="true" readonly="true" >
			</label>
			
			<label>
			<span>请求方式 :</span>
				<select name="callback_method">
				<option value="post">post</option>
				<option value="get">get</option>
				<option value="put">put</option>
				<option value="delete">delete</option>
				</select>
			</label>

			<label>
			<span>请求地址 :</span>
			<textarea id="callback_url" name="callback_url" placeholder="http://domain/path" ></textarea>
			</label>

			<label>
			<span>请求头参数 :</span>
			<textarea id="callback_headers" name="callback_headers" placeholder="json" ></textarea>
			</label>

			<label>
			<span>请求数据 :</span>
			<textarea id="callback_reqbody" name="callback_reqbody" placeholder="json" ></textarea>
			</label>
				
		';

	}
	else
	{


	}

	echo '
		<label>
		<span>&nbsp;</span>
		<input type="submit" class="button" value="提交" />
		</label>
	</form>'
?>
