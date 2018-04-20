<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>MockServer</title>
<style>

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}



#customers
{
    font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
    width:100%;
    border-collapse:collapse;
}
#customers td, #customers th 
{	
	width:10%
    font-size:1em;
    border:1px solid #98bf21;
    padding:3px 7px 2px 7px;
}
#customers th 
{
    font-size:1.1em;
    text-align:left;
    padding-top:5px;
    padding-bottom:4px;
    background-color:#A7C942;
    color:#ffffff;
}
#customers tr.alt td 
{
    color:#000000;
    background-color:#EAF2D3;
}


.smart-green {
margin-left:auto;
margin-right:auto;
max-width: 100%;
background: #F8F8F8;
padding: 30px 30px 20px 30px;
font: 12px Arial, Helvetica, sans-serif;
color: #666;
border-radius: 5px;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
}
.smart-green h3 {
font: 14px "Trebuchet MS", Arial, Helvetica, sans-serif;
padding: 10px 0px 10px 20px;
display: block;
margin: -30px -30px 10px -30px;
color: #FFF;
background: #9DC45F;
text-shadow: 1px 1px 1px #949494;
border-radius: 5px 5px 0px 0px;
-webkit-border-radius: 5px 5px 0px 0px;
-moz-border-radius: 5px 5px 0px 0px;
border-bottom:1px solid #89AF4C;

}
.smart-green h3>span {
display: block;
font-size: 9px;
color: #FFF;
}

.smart-green label {
display: block;
margin: 0px 0px 5px;
}
.smart-green label>span {
float: left;
margin-top: 10px;
color: #5E5E5E;
}
.smart-green input[type="text"], .smart-green input[type="email"], .smart-green textarea, .smart-green select {
color: #555;
height: 30px;
line-height:15px;
width: 100%;
padding: 0px 0px 0px 10px;
margin-top: 2px;
border: 1px solid #E5E5E5;
background: #FBFBFB;
outline: 0;
-webkit-box-shadow: inset 1px 1px 2px rgba(238, 238, 238, 0.2);
box-shadow: inset 1px 1px 2px rgba(238, 238, 238, 0.2);
font: normal 14px/14px Arial, Helvetica, sans-serif;
}
.smart-green textarea{
height:100px;
padding-top: 10px;
}
.smart-green select {
background: url('down-arrow.png') no-repeat right, -moz-linear-gradient(top, #FBFBFB 0%, #E9E9E9 100%);
background: url('down-arrow.png') no-repeat right, -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FBFBFB), color-stop(100%,#E9E9E9));
appearance:none;
-webkit-appearance:none;
-moz-appearance: none;
text-indent: 0.01px;
text-overflow: '';
width:100%;
height:30px;
}
.smart-green .button {
background-color: #9DC45F;
border-radius: 5px;
-webkit-border-radius: 5px;
-moz-border-border-radius: 5px;
border: none;
padding: 10px 25px 10px 25px;
color: #FFF;
text-shadow: 1px 1px 1px #949494;
}
.smart-green .button:hover {
background-color:#80A24A;
}


</style>

</head>

<body>
<ul>
  <li><a href="<?php $base_url = $this->config->item('base_url');  echo $base_url."project/show"?>">项目列表</a></li>
  <li><a href="<?php $base_url = $this->config->item('base_url');  echo $base_url."project/create/"?>">创建项目</a></li>
  <li><a href="<?php $base_url = $this->config->item('base_url');  echo $base_url."mkcfg/info"?>">配置说明</a></li>
</ul>
