<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur le site du KGB</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body class="h-full">
    <x-navigation.panel />
    <main class='flex container content-center flex-col justify-items-center mx-auto'>
        @yield('content')
    </main>
    <footer></footer>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>