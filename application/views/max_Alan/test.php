<?php
// $key='1880552eee07498a602ac7b6fbcd94b2c256b163';
// $link='https://api.nomics.com/v1/currencies/ticker?key='.$key.'&ids=BTC&interval=1h,30d&convert=AUD&per-page=100&page=1';

// $ch=curl_init();
// curl_setopt($ch,CURLOPT_URL,$link);
// curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
// $result=curl_exec($ch);
// curl_close($ch);
// $result=json_decode($result,true);
// echo '<pre>';
// print_r($result);

// if($result){
// 	echo $result[0]['id'];

// }
?><!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='utf-8'>
<title>Loading Data from External File using Ajax in jQuery</title>
<script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
<script>
$(document).ready(function(){
    $('button').click(function(){
        $('#box').load('content.html');
		$('#box').css('transform', 'translateX(100px)');
    });
});
</script>
</head>
<body>
    <div id='box'>
        <h2>Click button to load new content inside DIV box</h2>
    </div>
    <button type='button'>Load Content</button>
</body>
</html>