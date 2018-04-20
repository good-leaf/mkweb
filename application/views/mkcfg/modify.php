<?php
  $pname = $_GET['pname'];
  $cfgid = $_GET['id'];

  date_default_timezone_set("PRC");

  $mk_host = $this->config->item('mk_host');
  $url=$$mk_host.'v1/project/'.$pname.'/config/'.$cfgid;
  $html = file_get_contents($url);

  $json = json_decode($html);
  $data =  $json->{'data'};
  
  $id = $data->{'id'};
  $proid = $data->{'proid'};
  $method = $data->{'method'};
  $path = $data->{'path'};
  $httpcode = $data->{'httpcode'};
  $summary = $data->{'summary'};
  $uptime = $data->{'uptime'};
  
  $headers = $data->{'headers'};
  $reqbody = $data->{'reqbody'};
  $resbody = $data->{'resbody'};

  
?>>
