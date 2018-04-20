 <?php
	$data = json_encode($_POST);
	$mk_host = $this->config->item('mk_host');	
	$url= $mk_host."v1/project";
   
	$base_url = $this->config->item('base_url'); 
	$baseurl= $base_url."project/show";
	
	list($return_code, $return_content) = http_post_data($url, $data); 
	//print_r($return_content);

	$response = json_decode($return_content);
	$status =  $response->{'status'};
	if($status == "1")
	{
		echo "<script language=\"JavaScript\">\r\n";
		echo " alert(\"项目创建成功\");\r\n";
		echo " location.replace(\"$baseurl\");\r\n"; // 自己修改网址
		echo "</script>";
		exit;
	}
	elseif($status == "1105")
	{
		echo "<script language=\"JavaScript\">\r\n";
		echo " alert(\"项目名称已经存在\");\r\n";
		echo " location.replace(\"$baseurl\");\r\n"; // 自己修改网址
		echo "</script>";
		exit;
	}
	elseif($status == "1102")
    {
		echo "<script language=\"JavaScript\">\r\n";
		echo " alert(\"创建失败，参数错误\");\r\n";
		echo " location.replace(\"$baseurl\");\r\n"; // 自己修改网址
		echo "</script>";
		exit;
    }
	else
	{
		echo "<script language=\"JavaScript\">\r\n";
		echo " alert(\"项目创建失败\");\r\n";
		echo " location.replace(\"$baseurl\");\r\n"; // 自己修改网址
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
