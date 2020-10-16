<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    
    <main id="app">
        <navigation></navigation>
        <div class="py-5">
            <router-view></router-view>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>