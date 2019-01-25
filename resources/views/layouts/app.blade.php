<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hat macca, OC cho, san pham kho, dau tay</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- <link rel="stylesheet" href="{{URL::asset('css/styles.css')}}" media="all" type="text/css"> -->
    <!--end config owl carsoule-->

    <link rel="stylesheet" href="/owlcarousel/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/owlcarousel/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">

    <!-- @yield('styles') -->
    @stack('styles')
</head>


<body>
    @include('partials.header')
    @yield('content')

    @include('partials.footer')

    <script src="/js/jquery.min.js"></script>
    <script src="/owlcarousel/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->
    <script src="/js/main.js"></script>
    @yield('scripts')
</body>
</html>