<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ITSD">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Varela+Round" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css" type="text/css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <link href="{{asset('FrontEnd/assets/css/photoswipe.4.1.3.css')}}" rel="stylesheet" />
    <link href="{{asset('FrontEnd/assets/css/default-skin-413/default-skin.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/style.css')}}?t=12312312">
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css/site.css')}}?t=12312312">
    <title>{{$title}} | SekolahSunnah.com</title>
    @yield('meta')
    @yield('css')
    <style>
        .select2-selection {
            transition: .3s ease;
            border-radius: .3rem !important;
            font-weight: 500;
            padding: 1.2rem;
            height: auto !important;
            background-image: none;
            background-color: #fff !important;
            position: relative;
            line-height: inherit;
            box-shadow: 0 0.2rem 1rem 0rem rgba(0,0,0, .1);
            border: .1rem solid rgba(0,0,0, .15) !important;
        }

        .select2-selection__arrow {
            height: 52px !important;
        }
    </style>
</head>

<body>
    <div class="page detail-page">
        <header class="hero has-dark-background">
            <div class="hero-wrapper">
                <div class="secondary-navigation">
                    <div class="container">
                        <ul class="left">
                            <li><span>
                                Direktori Sekolah Sunnah se-Indonesia
                            </span></li>
                        </ul>
                        <ul class="right">
                            <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i>Masuk
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="main-navigation">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                            <a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{asset('FrontEnd/assets/img/logo-ss-c.png')}}" alt=""></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navbar">
                                <ul class="navbar-nav">
                                    <li class="nav-item active"><a class="nav-link" href="{{URL::to('/')}}">Home</a></li>
                                    <!--<li class="nav-item has-child"><a class="nav-link" href="#">Sekolah</a>
                                        <ul class="child">
                                            <li class="nav-item has-child"><a href="#" class="nav-link">Ikhwan</a>
                                                <ul class="child">
                                                    <li class="nav-item"><a href="#" class="nav-link">Boarding School</a></li>
                                                    <li class="nav-item"><a href="#" class="nav-link">Fullday School</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item has-child"><a href="#" class="nav-link">Akhwat</a>
                                                <ul class="child">
                                                    <li class="nav-item"><a href="#" class="nav-link">Boarding School</a></li>
                                                    <li class="nav-item"><a href="#" class="nav-link">Fullday School</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>-->
                                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                                    <li class="nav-item"><a href="{{route('web.submit')}}" class="btn btn-primary text-caps btn-rounded btn-framed">Submit Data</a></li>
                                </ul>
                            </div>
                            <a href="#collapseMainSearchForm" class="main-search-form-toggle collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseMainSearchForm">
                                <i class="fa fa-search"></i>
                                <i class="fa fa-close"></i>
                            </a>
                        </nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('web.level', $school->level->name)}}">{{ $school->level->description }}</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </div>
                </div>
                <div class="collapse" id="collapseMainSearchForm" style="">
                @component('web.searchform', [
                'keyword' => '', 
                'cities' => $cities, 
                'city' => '',
                'facilities' => $facilities,
                'min_price' => '',
                'max_price' => '',
                'facilities_form' => array(),
                'expand' => false
                ])@endcomponent
                </div>
                @yield('title')
                <div class="background"></div>
            </div>
        </header>

        @yield('content')

        <footer class="footer">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <a href="#" class="brand"><img src="{{asset('FrontEnd/assets/img/logo-ss-b.png')}}" alt=""></a>
                            <p>
                                SekolahSunnah.com adalah direktori yang memuat kumpulan informasi sekolah bermanhaj salaf yang ada di Indonesia. Informasi yang kami sajikan telah kami filter sehingga insyaAllah terjaga dari segi manhaj dan keberadaannya.
                            </p>
                        </div>
                        <div class="col-md-3">
                            <h2>Laman</h2>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <nav>
                                        <ul class="list-unstyled">
                                            <li><a href="{{URL::to('/')}}">Home</a></li>
                                            <!--<li><a href="#">Sekolah</a></li>
                                            <li><a href="#">Kategori</a></li>-->
                                            <li><a href="{{route('web.submit')}}">Submit Data</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <nav>
                                        <ul class="list-unstyled">
                                            <li><a href="#">Tentang</a></li>
                                            <li><a href="{{route('login')}}">Masuk</a></li>
                                            <!--<li><a href="#">Daftar</a></li>-->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h2>Kontak</h2><address><figure>
                                    Yayasan IT Support Dakwah<br>
                                    Jonggol, Jawa Barat
                                </figure><br><strong>Email:</strong><a href="mailto: info@sekolahsunnah.com">info<code>@</code>sekolahsunnah.com</a><br><strong>WhatsApp: </strong> <a target="_blank" href="https://wa.me/6287876335618">6287876335618</a>
                            </address></div>
                    </div>
                </div>
                <div class="background">
                    <div class="background-image original-size"><img src="{{asset('FrontEnd/assets/img/bg-footer-ss.jpg')}}" alt=""></div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/popper.js@1.13.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58&libraries=places"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.0/masonry.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

    <script src="{{asset('FrontEnd/assets/js/site.js')}}?t=12312312"></script>

    <script src="{{asset('FrontEnd/assets/js/photoswipe.4.1.3.min.js')}}"></script>
    <script src="{{asset('FrontEnd/assets/js/photoswipe-ui-default.4.1.3.min.js')}}"></script>


    <script src="{{asset('FrontEnd/assets/js/site.js')}}?t=12312312"></script>

    <script>
        $(document).ready(function(){
            $('select').select2({'width': '100%'});
        });
    </script>
    @yield('scripts')
</body>

</html>
