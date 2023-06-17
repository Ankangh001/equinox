<!DOCTYPE html>
<html>
<head>
  <title>Account Verified</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      text-align: center;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 400px;
      margin: 100px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    p {
      font-size: 16px;
      margin-bottom: 20px;
    }

    .success-message {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #4CAF50;
    }
  </style>
</head>
<body>
  <div class="container">
	<?php if($res['success'] == 1){ ?>
		<h1><?= $res['message'] ?></h1>
		<a  href="<?=base_url('user')?>" class="success-message">
    Please login to your account.</a>
    <br>or <br> 
		<p class="message">You will be redirected to login page shortly...</p>
	<?php }elseif($res == 0){?>
		<h1><?= $res['message'] ?></h1>
		
    <a  href="<?=base_url('user')?>" class="success-message">
    Please login to your account.</a>
    <br>or <br> 
		<p class="message">You will be redirected to login page shortly...</p>
	<?php }else{?>
		<h1><?= $res['message'] ?></h1>
	<?php }?>
  </div>

  <script>
    setTimeout(() => {
      window.location.href="<?=base_url('user')?>"
    }, 5000);
  </script>
</body>
</html>
