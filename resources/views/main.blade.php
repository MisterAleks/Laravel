<!DOCTYPE html>
<html>
<head>
	<title>Прикладное ПО</title>
</head>
<body>
	<div>
		<h2>Йоу, работает! И шаблонизатор Blade прикручен)</h2>
		<h2>Шаблонизатор:</h2>
		@if (count($records) === 1)
			<h3>Одна запись</h3>
		@else
			<h3>Много записей</h3>
		@endif
	</div>
</body>
</html>