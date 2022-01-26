<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Forgot password</title>
	<link rel="stylesheet" type="text/css" href="public/css/stylelogin.css" media="screen" />
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style>
		h3{
			color: #f33a58;
		}
	</style>
</head>
<body>
	<div class="container">
		<section id="content">
			<form action="index.php" method="post" id="form-1">
				<h1>Forgot password</h1>
				<?php
				if(isset($_POST['username'])){
					echo '<h3>Không tồn tại email này</h3>';
				}
                else{
                    echo '<h3>Đã gửi password về email đăng ký</h3>';
                }
				?>
				<div>
					<input type="text" placeholder="Email" required="" name="username" id="username" />
					<span class="form-message" style="color:#f33a58"></span>
				</div>
				<div>
					<button style="font-size: 16px;"> <i class="fa fa-send"></i >Submit</button>
				</div>
			</form>
	
		</section>
	</div>
	<script src="public/js/validator.js"></script>
	<script>
		Validator({
			form: '#form-1',
			errorSelector: '.form-message',
			rules: [
				Validator.isRequired('#username'),
				Validator.isEmail('#username'),
				Validator.isRequired('#password')
			]
		})
	</script>
</body>

</html>