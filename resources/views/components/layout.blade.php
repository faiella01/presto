<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    {{-- DA CONTROLLARE <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="icon" href="/media/favicon.ico" type="image/x-icon"/>
    <title>{{$title ?? "Bradipi - Presto.it"}}</title>
</head>
<body>
    
    
    <div class="flex-wrapper">
        <div class="content">
            
            
            <x-topbar/>
            
            <x-navbar/>
            
            {{ $slot }}
            
        </div>
    </div>
    
    
    <div class="footer">
        
        <x-footer/>
    </div>
    
    <a href="#" onclick="topFunction()" id="myBtn" title="Go to top" class="bi bi-arrow-up-short"></a>
    
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
{{-- CONTROLLARE <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script> --}}
<script src="{{asset('/js/app.js')}}"></script>


</body>
</html>