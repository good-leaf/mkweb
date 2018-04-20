 <?php
	$data = json_encode($_POST);
	$pname = $_POST['pname'];
	$method = $_POST['method'];
	$path = $_POST['path'];
	$sort = $_POST['sort'];
	$headers = json_decode($_POST['headers']);
	$condition = json_decode($_POST['condition']);
	$response = json_decode($_POST['response']);
	$httpcode = $_POST['httpcode'];
	$summary = $_POST['summary'];

	$params = array();
	$params['method'] = $method;
	$params['path'] = $path;
	$params['sort'] = intval($sort);
	$params['headers'] = $headers;
	$params['condition'] = $condition;
	$params['response'] = $response;
	$params['httpcode'] = intval($httpcode);
	$params['summary'] = $summary;

	$extra = array();

	if(empty($_POST['async_callback']))
	{

	}
	else
	{
		if($_POST['async_callback'] == "true")
		{
			$callback = array();
			$callback['method'] = $_POST['callback_method'];
			$callback['headers'] = json_decode($_POST['callback_headers']);
			$callback['url'] = $_POST['callback_url'];
			$callback['reqbody'] = json_decode($_POST['callback_reqbody']);

			$extra['sync'] = false;
			$extra['callback'] = $callback;
		}
		else
		{

		}
	}

	$params['extra'] = $extra; 
	$data = json_encode($params);
  
 
	$mk_host = $this->config->item('mk_host');
  	$url= $mk_host."v1/project/{$pname}/config";

	$base_url = $this->config->item('base_url');   
    $baseurl= $base_url."project/show";
    $createurl= $base_url."mkcfg/create?pname={$pname}";

    list($return_code, $return_content) = http_post_data($url, $data); 
    //print_r($return_content);

    $response = json_decode($return_content);
    $status =  $response->{'status'};
    if($status == "1")
    {
		echo "<script language=\"JavaScript\">\r\n";
		echo " alert(\"接口配置创建成功\");\r\n";
		echo " location.replace(\"$baseurl\");\r\n"; // 自己修改网址
		echo "</script>";
		exit;

    }
    elseif($status == "1106")
    {
		echo "<script language=\"JavaScript\">\r\n";
		echo " alert(\"接口配置更新失败\");\r\n";
		echo " location.replace(\"$createurl\");\r\n"; // 自己修改网址
		echo "</script>";
		exit;

    }
    elseif($status == "1102")
    {
        echo "<script language=\"JavaScript\">\r\n";
        echo " alert(\"接口配置创建失败，参数错误\");\r\n";
		echo " location.replace(\"$createurl\");\r\n"; // 自己修改网址
        echo "</script>";
        exit;
    }
    else
    {
        echo "<script language=\"JavaScript\">\r\n";
        echo " alert(\"接口配置创建失败\");\r\n";
        echo " location.replace(\"$createurl\");\r\n"; // 自己修改网址
        echo "</script>";
        exit;
    }


function http_post_data($url, $data_string) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Content-Length: " . strlen($data_string))
    );
    ob_start();
    curl_exec($ch);
    $return_content = ob_get_contents();
    ob_end_clean();
    $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    return array($return_code, $return_content);
}
 ?>
