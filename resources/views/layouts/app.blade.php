<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @include('partials.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script>
        const getCSFR = () => document.querySelector('input[name=_token]').value;

        const fetchDelete = (id, url, contact = '') => {
            document.body.style.cursor = 'wait';

            const headers = new Headers({
                'X-CSRF-TOKEN': getCSFR()
            })

            if (confirm('Deseja eliminar "' + contact + '" permanentemente?')) {

                return fetch(url + id, {
                    method: 'DELETE',
                    headers
                }).then(function () {
                    window.location = url;
                })

            }

            document.body.style.cursor = 'unset';
        }
    </script>

</body>
</html>
