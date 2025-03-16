<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>{{ $title }}</title>
		<!-- @vite(['resources/css/app.scss','resources/js/app.js']) -->
		<link rel="preload" as="style" href="/public/build/assets/app-yqKwvs5-.css">
		<link rel="modulepreload" href="/public/build/assets/app-Dm22P6S5.js">
		<link rel="stylesheet" href="/public/build/assets/app-yqKwvs5-.css">
		<script type="module" src="/public/build/assets/app-Dm22P6S5.js"></script>
	</head>
	<body>
		<div class="wain_wrapper">
			<div>
				<x-headerr />
				{{ $slot }}
			</div>
			
			<x-footer />
		</div>
	</body>
</html> 