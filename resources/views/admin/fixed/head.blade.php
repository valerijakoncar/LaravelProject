<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cool Stuff - @yield("title")</title>
    <meta charset="utf-8"/>
    <meta name="description" content="">
    <meta name="keywords" content=""/>
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('images/edited/pink_QOU_icon.ico') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Carter+One=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/style.css") }}"/>
    <!--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->
    <script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script type="application/x-javascript">
        tinymce.init({
            selector:'#TypeHere',
            width: 600,
            height: 300,
            //margin-left:  auto,
            //init_instance_callback: "getAuthorText",
        });
    </script>
</head>
