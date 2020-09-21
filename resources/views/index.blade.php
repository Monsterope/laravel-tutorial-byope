<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}" /> -->
  <title>Hello</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit:200,400,500,700&display=swap" rel="stylesheet">

</head>
<body>

<div id="app"></div>

<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>