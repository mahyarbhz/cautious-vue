<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cautious Vue</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.11/tailwind.min.css" integrity="sha512-x2cJ7AaAfneohxPgwnLNuG8QoQIarTu+GKmfKwVNJyGohutC647m9EUmB9bz/HBWzyjdz32WMkIx74eXHIsvhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
        <div id="app" class="min-h-screen bg-gray-100">
            <products-form></products-form>
            <br>
            <products-list></products-list>
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
