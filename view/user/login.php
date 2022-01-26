<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
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
				<h1>Admin Login</h1>
				<?php
				if(isset($_POST['username'])){
					echo '<h3>Sai thông tin đăng nhập</h3>';
				}
				?>
				<div>
					<input type="text" placeholder="Email" required="" name="username" id="username" />
					<span class="form-message" style="color:#f33a58"></span>
				</div>
				<div>
					<input type="password" placeholder="Password" required="" name="password" id="password"  />
					<span class="form-message" style="color:#f33a58"></span>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="saveLogin" name="saveLogin">
					<label class="form-check-label" for="saveLogin">Ghi nhớ đăng nhập</label>
				</div>
				<div>
					<button style="font-size: 16px;"> <i class="fa fa-send"></i >Đăng nhập</button>
				</div>
				<div><a href="" style="font-size: 16px;">Quên mật khẩu?</a></div>
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