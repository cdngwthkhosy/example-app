<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Log in - Cendekia Muda </title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta12/dist/css/tabler.min.css">
	<style>
		@import url('https://rsms.me/inter/inter.css');
		:root {
			--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
		}
	  </style>
</head>
<body class=" d-flex flex-column bg-white">
	<div class="row g-0 flex-fill">
		<div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
			<div class="container container-tight my-5 px-lg-5">
				<div class="text-center mb-4">
					<a href="." class="navbar-brand navbar-brand-autodark"><img src={{ asset('img/logo.png') }} height="36"
							alt=""></a>
				</div>
				<h2 class="h3 text-center mb-3">
					Login to your account
				</h2>
				<form action={{route('post.login')}} method="post" autocomplete="off">
					@csrf
					<div class="mb-3">
						<label class="form-label">Email address</label>
						<input type="text" name="nik" class="form-control" placeholder="NIK" autocomplete="off">
					</div>
					<div class="mb-2">
						<label class="form-label">
							Password
							<span class="form-label-description">
								<a href="#">Lupa password</a>
							</span>
						</label>
						<div class="input-group input-group-flat">
							<input type="password" name="password" class="form-control" placeholder="Your password" autocomplete="off">
						</div>
					</div>
					<div class="form-footer">
						<button type="submit" class="btn btn-primary w-100">Sign in</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
			<div class="bg-cover h-100 min-vh-100" style="background-image: url(img/bg-cover-auth.jpg)">
			</div>
		</div>
	</div>
	<!-- Libs JS -->
	<!-- Tabler Core -->
	<script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta12/dist/js/tabler.min.js"></script>
</body>
</html>