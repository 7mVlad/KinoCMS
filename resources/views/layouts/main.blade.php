<!doctype html>
<html lang="en">

<head>
	<title>KinoCMS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('frontAssets/css/style.css')}}">

</head>

<body>

    <section class="row">
        <div class="col-12 m-auto">
            <div class="wrap">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col d-flex">
                            <p class="mb-0 phone mr-5"><span class="fa fa-phone"></span> <a
                                    href="#">{{ $mainPage->phone_one }}</a></p>
                            <p class="mb-0 phone"><span class="fa fa-phone"></span> <a
                                    href="#">{{ $mainPage->phone_two }}</a>
                            </p>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <div class="social-media">
                                <p class="mb-0 d-flex">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span
                                            class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span
                                            class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span
                                            class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span
                                            class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{route('main.index')}}">Kino <span>CMS</span></a>
                    <form action="#" class="searchform order-sm-start order-lg-last">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control " placeholder="Поиск">
                            <button type="submit" placeholder="" class="form-control search"><span
                                    class="fa fa-search"></span></button>
                        </div>
                    </form>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span> Menu
                    </button>
                    <div class="collapse navbar-collapse" id="ftco-nav">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item"><a href="{{route('poster.index')}}" class="nav-link">Афиша</a></li>

                            {{-- <li class="nav-item"><a href="#" class="nav-link">Расписание</a></li> --}}
                            <li class="nav-item"><a href="{{route('soon.index')}}" class="nav-link">Скоро</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Кинотеатры</a></li>
                            <li class="nav-item"><a href="{{route('stock.index')}}" class="nav-link">Акции</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">О Кинотеатре</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04">
                                    <a class="dropdown-item" href="{{route('news.index')}}">Новости</a>
                                    <a class="dropdown-item" href="{{route('page.show', '4')}}">Реклама</a>
                                    <a class="dropdown-item" href="{{route('page.show', '2')}}">Кафе</a>
                                    <a class="dropdown-item" href="{{route('page.show', '3')}}">Vip-зал</a>
                                    <a class="dropdown-item" href="{{route('page.show', '5')}}">Детская комната</a>
                                    <a class="dropdown-item" href="{{route('mobile.show')}}">Мобильное приложение</a>
                                    <a class="dropdown-item" href="#">Контакты</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- END nav -->
        </div>

    </section>

@yield('content')


<!-- Footer -->
<section class="row">
    <div class="col-12 m-auto">
        <div class="wrapper" style="background-color: aliceblue; color: #000;">
            <footer class="text-center text-lg-start text-muted pt-3">
                <!-- Section: Social media -->
                <div style="max-width: 1200px;border-top: 2px solid #000;margin:auto;">

                </div>

                <!-- Section: Links  -->
                <section>
                    <div class="container text-center text-md-start mt-5">
                        <!-- Grid row -->
                        <div class="row ">
                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                <h6 class="text-uppercase fw-bold mb-4">
                                    Мобильные приложения
                                </h6>
                                <div class="d-flex">
                                    <img src="{{ asset('frontAssets/image/google-play-badge.png') }}" alt=""
                                        width="150px">
                                    <img src="{{ asset('frontAssets/image/store.png') }}" alt="" width="150px">
                                </div>

                                <h6 class="pt-5">Разработка сайтов: <br> AVADA-MEDIA</h6>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    <a href="{{route('poster.index')}}" class="text-reset">Афиша</a>
                                </h6>
                                {{-- <p>
                                        <a href="#!" class="text-reset">Расписание</a>
                                    </p> --}}
                                <p>
                                    <a href="{{route('soon.index')}}" class="text-reset">Скоро</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Кинотеатры</a>
                                </p>
                                <p>
                                    <a href="{{route('stock.index')}}" class="text-reset">Акции</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                <!-- Links -->
                                <h6 class="text-uppercase fw-bold mb-4">
                                    <a href="#" class="text-reset">О Кинотеатре</a>
                                </h6>
                                <p>
                                    <a href="{{route('news.index')}}" class="text-reset">Новости</a>
                                </p>
                                <p>
                                    <a href="{{route('page.show', '4')}}" class="text-reset">Реклама</a>
                                </p>
                                <p>
                                    <a href="{{route('page.show', '2')}}" class="text-reset">Кафе-бар</a>
                                </p>
                                <p>
                                    <a href="{{route('page.show', '3')}}" class="text-reset">Vip-зал</a>
                                </p>
                                <p>
                                    <a href="{{route('page.show', '5')}}" class="text-reset">Детская комната</a>
                                </p>
                                <p>
                                    <a href="#!" class="text-reset">Контакты</a>
                                </p>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                <div class="text-white">
                                    <!-- Grid container -->
                                    <div class="container p-4 pb-0">
                                        <!-- Section: Social media -->
                                        <section class="mb-4">
                                            <!-- Facebook -->
                                            <a class="btn btn-primary btn-floating m-1"
                                                style="background-color: #3b5998;" href="#!" role="button"><i
                                                    class="fa fa-facebook-f"></i></a>

                                            <!-- Twitter -->
                                            <a class="btn btn-primary btn-floating m-1"
                                                style="background-color: #55acee;" href="#!" role="button"><i
                                                    class="fa fa-twitter"></i></a>

                                            <!-- Google -->
                                            <a class="btn btn-primary btn-floating m-1"
                                                style="background-color: #dd4b39;" href="#!" role="button"><i
                                                    class="fa fa-google"></i></a>

                                            <!-- Instagram -->
                                            <a class="btn btn-primary btn-floating m-1"
                                                style="background-color: #ac2bac;" href="#!" role="button"><i
                                                    class="fa fa-instagram"></i></a>

                                        </section>
                                        <!-- Section: Social media -->
                                    </div>
                                    <!-- Grid container -->

                                </div>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </div>
                </section>
                <!-- Section: Links  -->

                <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    <strong>Kino CMS &copy; 2022 </strong>All rights reserved.
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </div>
    </div>
</section>


<script src="{{asset('frontAssets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontAssets/js/popper.js')}}"></script>
<script src="{{asset('frontAssets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontAssets/js/main.js')}}"></script>

</body>

</html>
