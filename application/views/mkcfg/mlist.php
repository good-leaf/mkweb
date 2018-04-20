<?php
	//echo $pname;
	$pname = $_GET['pname'];

	date_default_timezone_set("PRC");

	$base_url = $this->config->item('base_url');
	$mk_host = $this->config->item('mk_host');
	$url= $mk_host.'v1/project/'.$pname.'/config';
	$html = file_get_contents($url);

	$json = json_decode($html);
	$data =  $json->{'data'};

	echo '<table id="customers">';
	echo '<tr >';
	echo '<th>id</th><th>pname</th><th>method</th><th>path</th><th>sort</th><th>headers</th>';
	echo '<th>condition</th><th>response</th><th>httpcode</th><th>summary</th><th>extra</th>';
	echo '<th>uptime</th><th>delete</th>';
	echo '</tr>';

	for($row=0;$row<count($data);$row++)
	{
		if($row %2==0)
		{
			echo '<tr>';
		}
		else
		{
			echo '<tr class="alt">';
		}

		echo '<td>'.$data[$row]->{'id'}.'</td>';
		echo '<td>'.$data[$row]->{'proid'}.'</td>';
		echo '<td>'.$data[$row]->{'method'}.'</td>';
		echo '<td>'.$data[$row]->{'path'}.'</td>';
		echo '<td>'.$data[$row]->{'sort'}.'</td>';
		echo '<td>'.json_encode($data[$row]->{'headers'}).'</td>';
		echo '<td>'.json_encode($data[$row]->{'condition'}).'</td>';
		echo '<td>'.json_encode($data[$row]->{'response'}).'</td>';
		echo '<td>'.$data[$row]->{'httpcode'}.'</td>';
		echo '<td>'.$data[$row]->{'summary'}.'</td>';
		echo '<td>'.json_encode($data[$row]->{'extra'}).'</td>';
		$time = $data[$row]->{'uptime'} / 1000;
		echo '<td>'.date("Y-m-d H:i:s", $time).'</td>';
		//echo '<td><a href="'.$base_url.'mkcfg/modify?pname='.$pname.'&id='.$data[$row]->{'id'}.'">Modify</a></td>';
		echo '<td><a href="'.$base_url.'mkcfg/delete?pname='.$pname.'&id='.$data[$row]->{'id'}.'">Delete</a></td>';
		echo '</tr>';
	}
  echo '</table>';

  		
?>
