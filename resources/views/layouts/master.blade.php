<!-- resources/views/layouts/master.blade.php -->
<html>
	<head>
		<title>Система - @yield('title')</title>
	</head>
	<body>
		<div>
		@section('sidebar')
			Верхняя часть сайта
		@show
		</div>
		<hr>
		<div class="container">
			@yield('content')
		</div>
	</body>
</html>