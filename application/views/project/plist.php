<?php
	date_default_timezone_set("PRC");
	$mk_host = $this->config->item('mk_host'); 
	$url = $mk_host."v1/project";
	$html = file_get_contents($url);

	$json = json_decode($html);
	$data =  $json->{'data'};


	echo '<table id="customers">';
	echo '<tr >';
	echo '<th>pname</th><th>mock type</th><th>summary</th><th>uptime</th><th>create config</th><th>config list</th>';
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

		echo '<td>'.$data[$row]->{'name'}.'</td>';
		echo '<td>'.$data[$row]->{'mock_type'}.'</td>';
		echo '<td>'.$data[$row]->{'summary'}.'</td>';
		$time = $data[$row]->{'uptime'} / 1000;
		echo '<td>'.date("Y-m-d H:i:s", $time).'</td>';

		echo '<td><a href="../mkcfg/create?pname='.$data[$row]->{'name'}.'">Create</a></td>';
		echo '<td><a href="../mkcfg/show?pname='.$data[$row]->{'name'}.'">Show</a></td>';
		echo '</tr>';
	}
	echo '</table>';

?>
