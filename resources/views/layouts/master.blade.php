<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Harry Kim | Full Stack Developer</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Animate.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <script src="https://kit.fontawesome.com/fa595007a2.js" crossorigin="anonymous"></script>



</head>
<body>

<div id="app">
    <v-app>
        <v-content>

            @yield('content')

        </v-content>

        <the-footer></the-footer>

    </v-app>


</div>

</body>

<style>
    html {
        scroll-behavior: smooth;

    }

</style>
</html>
