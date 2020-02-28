<!DOCTYPE html>
<html lang="en">
<head>
 @include('cashier.layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('cashier.layouts.header')
      
        @include('cashier.layouts.sidebar')

         @section('main-content')
                @show
<!--footer-->
    @include('cashier.layouts.footer')
    
</body>
</html>