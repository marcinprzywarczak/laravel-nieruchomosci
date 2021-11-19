@props(['styles' => '', 'scripts' => ''])

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", initial-scale="1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Bootstrap v5.0</title>
        <script>
            window.config = {
                locale: "{{ config('app.locale') }}"
            }
        </script>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        {{$styles}}
    </head>
    <body>
        {{$slot}}
    </body>

    <script src="{{asset('js/app.js')}}"></script>

    {{$scripts}}
</html>