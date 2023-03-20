<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ env('APP_NAME') }}</title>
	@livewireStyles()
</head>
<body>
	<main>
		{{ $slot }}
	</main>
	
	@livewireScripts()
</body>
</html>