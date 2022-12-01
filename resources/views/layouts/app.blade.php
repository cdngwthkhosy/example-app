<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cendekia Muda</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta12/dist/css/tabler.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Poppins');

		:root {
			--tblr-font-sans-serif: Poppins, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
		}
	</style>

</head>

<body>
	<header class="navbar navbar-expand-md navbar-dark d-print-none" style="background: #313556">
		<div class="container-xl">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
				<span class="navbar-toggler-icon"></span>
			</button>
			<h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
				<a href=".">
					<img src={{ asset('img/logo-white.png') }} width="32" alt="Cendekia Muda" class="navbar-brand-image">
				</a>
			</h1>
			<div class="navbar-nav flex-row order-md-last">

				{{-- Start Notification --}}
				@include('layouts.components.notification')
				{{-- End Notification --}}

				{{-- Start User Dropdown --}}
				@include('layouts.components.user-dropdown')
				{{-- End User Dropdown --}}

			</div>
			<div class="collapse navbar-collapse" id="navbar-menu">
				<ul class="navbar-nav">

					{{-- Start Menu --}}
					@include('layouts.components.menu')
					{{-- End Menu --}}

				</ul>
			</div>
		</div>
	</header>

	<div class="page-wrapper">
		{{-- Content Body --}}
		@yield('body')
	</div>

	<!-- Libs JS -->
	<!-- Tabler Core -->
	<script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta12/dist/js/tabler.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"
		integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready( function () {
			$('#myTable').DataTable();
		} );
	</script>
	<script>
		new TomSelect("#select-user",{
		create: false,
		sortField: {
		field: "text",
		direction: "asc"
	}
});
	</script>
	@yield('js')
</body>

</html>