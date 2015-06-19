<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <!-- {{ $name }}  : unescape data-->
    <!-- {{!! $name !!}}  : escape data-->
    <!-- <h1>About Pages : {{ $name }}</h1> -->
    <!-- <h1>About Pages : {!! $name !!}</h1> -->

    <h1>About Pages : {!! $first !!}{!! $last !!}</h1>

    <p>lorem ipsum</p>
</body>
</html>
