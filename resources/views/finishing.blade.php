<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finishing</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts-temp/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css-temp/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css-temp/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css-temp/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css-temp/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css-temp/bootstrap-datepicker.css') }}">
            
            
    <link rel="stylesheet" href="{{ asset('fonts-temp/flaticon/font/flaticon.css') }}">
        
    <link rel="stylesheet" href="{{ asset('css-temp/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css-temp/jquery.fancybox.min.css') }}">
            
        
    <link rel="stylesheet" href="{{ asset('css-temp/style.css') }}">
</head>

    
<body>
    <div class="site-section" id="finishing">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-7">
                    <h2 class="heading">Finishing</h2>

                </div>
            </div>

            <div class="row">
                @foreach (App\Product::where('category_id', 4)->get() as $index => $item)
                    {{-- <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset($item->image) }}" alt="" width="50%"
                        height="40%">
                </div> --}}
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">{{ $item->header }}</h5>
                                </center>
                                <p class="card-text">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js-temp/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js-temp/popper.min.js') }}"></script>
<script src="{{ asset('js-temp/bootstrap.min.js') }}"></script>
<script src="{{ asset('js-temp/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js-temp/aos.js') }}"></script>
<script src="{{ asset('js-temp/jquery.sticky.js') }}"></script>
<script src="{{ asset('js-temp/stickyfill.min.js') }}"></script>
<script src="{{ asset('js-temp/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js-temp/isotope.pkgd.min.js') }}"></script>

<script src="{{ asset('js-temp/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js-temp/main.js') }}"></script>
</html>
