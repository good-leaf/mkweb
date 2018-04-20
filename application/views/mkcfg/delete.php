 <?php
	$pname = $_GET['pname'];
	$cfgid = $_GET['id'];
	
	$mk_host =  $this->config->item('mk_host'); 
  	$url= $mk_host."v1/project/{$pname}/config/{$cfgid}"; 

	$base_url = $this->config->item('base_url');      
    $baseurl= $base_url."mkcfg/show?pname={$pname}";

    list($return_code, $return_content) = http_delete_data($url); 

    $response = json_decode($return_content);
    $status =  $response->{'status'};
    
	if($status == "1")
    {
		echo "<script language=\"JavaScript\">\r\n";
		echo " alert(\"接口配置删除成功\");\r\n";
		echo " location.replace(\"$baseurl\");\r\n"; // 自己修改网址
		echo "</script>";
		exit;
    }
    else
    {
        echo "<script language=\"JavaScript\">\r\n";
        echo " alert(\"接口配置删除失败\");\r\n";
        echo " location.replace(\"$baseurl\");\r\n"; // 自己修改网址
        echo "</script>";
        exit;
    }

function http_delete_data($url) {
    $ch = curl_init();
  
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

    //curl_setopt($ch, CURLOPT_POSTFIELDS, $data);   
    ob_start();
    curl_exec($ch);
    $return_content = ob_get_contents();
    ob_end_clean();
    $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    return array($return_code, $return_content);
}
 ?>
