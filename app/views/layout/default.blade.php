<!doctype html>
<html lang="en">
<head>
@include('layout.header')
 </head>
<body>
@include('layout.topmenu')
<div class="container-fluid">
<div class="row">
<div class="col-sm-12 col-md-12 main">
@yield('content')
</div>
</div>
</div>
</body>
</html>