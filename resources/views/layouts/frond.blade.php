<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  <!--     Fonts and icons     -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link id="pagestyle" href="{{ asset('forntEnd/css/bootstrap.css') }}" rel="stylesheet" />
  <link id="pagestyle" href="{{ asset('forntEnd/css/custom.css') }}" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">  

</head>

<body class=""> 
     @include('layouts.inc.forntnav')
        <div class="content">
          @yield('content')
       </div>
   <div class="whattsapp_chat">
     <a href=" https://wa.me/+8801614857798?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
       <img src="{{ asset('assets/images/whattsapp.png')}}" alt=" whattsapp logo" width="70">
     </a>
   </div>
   

  <script src="{{ asset('forntEnd/js/bootstrap.js') }}" defer></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/62776630b0d10b6f3e71206d/1g2h7kplf';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
  <script src="{{ asset('forntEnd/js/custom.js') }}" defer></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>

    var availableTags = [ ];
    $.ajax({
      method:"GET",
      url:"/product-list",
     
      success:function (response){
        startAutoComplete(response);
      }
    });
    function startAutoComplete(availableTags){
      $("#search-product").autocomplete({
      source: availableTags
    });

    }
 
  </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('status'))
    <script>
      swal("{{ session('status') }}");
    </script>
  
@endif
   @yield('scripts')    
</body>
</html>
