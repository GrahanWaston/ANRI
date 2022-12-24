<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	<title>Login - CMS PUSDIKLAT ANRI</title>
	<link href="{{ asset('assets/css/tabler.min.css') }} " rel="stylesheet" />
	<link href="{{ asset('assets/css/app.css') }} " rel="stylesheet" />
</head>

<body class="d-flex flex-column antialiased">
	<div class="page page-center">
		<div class="container-tight py-4">
			<div class="text-center mb-4 text-white">
				<img src="{{ asset('assets/images/logo/logo.svg') }} " alt="" height="50">
			</div>

			@if (session()->has('error'))
				<div class="alert alert-danger d-flex align-items-center" role="alert">
					<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
						<use xlink:href="#exclamation-triangle-fill" />
					</svg>
					<div>
						Maaf username atau password anda salah! silahkan masukkan kembali username dan password yang sudah terdaftar
					</div>
				</div>
			@endif

			<form class="card card-md" action="/login" method="post" autocomplete="off" style="border:none;">
				@csrf
				<div class="card-body">
					<h2 class="card-title text-center mb-4">Silahkan Login Menggunakan akun anda</h2>
					<div class="mb-3">
						<label class="form-label">Username</label>
						<input type="text" class="form-control" placeholder="Enter Username" name="username" id="username" required @error('username') is-invalid @enderror>
						@error('email')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" class="form-control" placeholder="Enter Password" name="password" id="password">
					</div>
					<div class="form-footer">
                        <a href="/maintain/dashboard"><button type="submit" class="btn btn-primary w-100">Sign in</button></a>
					</div>
				</div>
			</form>
		</div>
	
		<div class="text-center text-muted mt-3">
			&copy; Copyright 2022. <br />Arsip Nasional Republik Indonesia<br />All rights reserved
		</div>
	</div>
</body>

<script src="{{ asset('assets/js/tabler.min.js') }} "></script>

</html>