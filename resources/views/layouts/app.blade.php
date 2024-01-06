<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ env('APP_NAME') }}</title>
	{{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
	@livewireStyles()
</head>
<body>

	@auth
		<form action="{{ route('logout') }}" method="post">
			@csrf
			<x-submit-button value='logout'></x-submit-button>
		</form>
	@endauth
	
	<main>
		{{ $slot }}
	</main>
	
	@livewireScripts()
</body>
</html>