<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to Gmail sender</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
</head>

<body>
	<form action="<?= base_url('login') ?>" method="post">
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
					<div class="card card-signin my-5">
						<div class="card-body">
							<h5 class="card-title text-center">Gmail Account</h5>
							<h5 class="card-title text-center"><b>( This website does't record any data )</b></h5>
							<h6 class="card-title text-center"><a href="https://myaccount.google.com/lesssecureapps" target="_blank">Enable Less Secure Apps Access</a></h6>
							<form class="form-signin">
								<div class="form-group">
									<label for="inputEmail">Name</label>
									<input type="text" id="inputEmail" class="form-control" name="name" placeholder="Dasplay Name" required autofocus>
								</div>

								<div class="form-group">
									<label for="inputEmail">Email address</label>
									<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
								</div>

								<div class="form-group">
									<label for="inputPassword">Password</label>
									<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
								</div>
								<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Continue</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>

</html>