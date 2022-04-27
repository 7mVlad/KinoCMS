@extends('layouts.main')
@section('content')
    <div class="col-12"
        style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg'); background-size: cover;  background-attachment: fixed;">
        <section class="row" style="padding-top: 100px;">
            <div class="col-8 m-auto">
                <div class="wrap">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col d-flex">
                                <p class="mb-0 phone mr-5"><span class="fa fa-phone"></span> <a href="#">+00 1234
                                        567</a></p>
                                <p class="mb-0 phone"><span class="fa fa-phone"></span> <a href="#">+00 1234 567</a>
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
                        <a class="navbar-brand" href="index.html">Kino <span>CMS</span></a>
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
                                <li class="nav-item"><a href="#" class="nav-link">Афиша</a></li>

                                <li class="nav-item"><a href="#" class="nav-link">Расписание</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Скоро</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Кинотеатры</a></li>
                                <li class="nav-item"><a href="#" class="nav-link">Акции</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">О Кинотеатре</a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                                        <a class="dropdown-item" href="#">Новости</a>
                                        <a class="dropdown-item" href="#">Реклама</a>
                                        <a class="dropdown-item" href="#">Кафе</a>
                                        <a class="dropdown-item" href="#">Мобильное приложение</a>
                                        <a class="dropdown-item" href="#">Контакты</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="btn btn-primary ml-3 mr-3">
                        Войти
                    </div>
                </nav>
                <!-- END nav -->
            </div>

        </section>
        <section class="row">
            <div class="col-8 m-auto">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" style="height: 500px;"
                                src="https://natworld.info/wp-content/uploads/2018/01/-%D0%BF%D1%80%D0%B8%D1%80%D0%BE%D0%B4%D1%8B-e1534007720297.jpg"
                                alt="Первый слайд">
                            <div class="carousel-caption d-none d-md-block">
                                <p>Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" style="height: 500px;"
                                src="https://oir.mobi/uploads/posts/2021-06/1623706543_34-oir_mobi-p-krasivaya-priroda-mira-priroda-krasivo-fot-35.jpg"
                                alt="Второй слайд">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" style="height: 500px;"
                                src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg" alt="Третий слайд">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" style="height: 500px;"
                                src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg" alt="Третий слайд">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" style="height: 500px;"
                                src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg" alt="Третий слайд">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-8 m-auto">
                <div class="wrapper pb-5" style="background-color: aliceblue;">
                    <h2 class="text-center pt-3">Смотрите Сегодня</h2>

                    <div class="film__inner d-flex flex-wrap">

                        <div class="row ml-5 mr-5 pb-5">

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>


                        </div>


                    </div>


                    <h2 class="text-center pt-3">Смотрите Скоро</h2>

                    <div class="film__inner d-flex flex-wrap">

                        <div class="row ml-5 mr-5 pb-5">

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>

                            <div class="col-3 text-center mt-5 pb-5" style="height: 300px">
                                <a class="text-dark" href="#">
                                    <img width="100%" height="100%"
                                        src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg">
                                    <h6 class="mt-2"> Название фильма</h4>
                                        <div class="btn btn-success btn-sm">Купить билет</div>
                                </a>
                            </div>


                        </div>


                    </div>

                </div>




            </div>
        </section>

        <section class="row">
            <div class="col-8 m-auto">
                <div class="wrapper pb-5" style="background-color: aliceblue;">
                    <h2 class="text-center pt-3">Новости и Акции</h2>

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="https://natworld.info/wp-content/uploads/2018/01/-%D0%BF%D1%80%D0%B8%D1%80%D0%BE%D0%B4%D1%8B-e1534007720297.jpg"
                                    alt="Первый слайд" style="height: 500px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="https://icocnews.ru/wp-content/uploads/2015/09/priroda.jpg" alt="Первый слайд"
                                    style="height: 500px;">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="https://oir.mobi/uploads/posts/2021-06/1623706543_34-oir_mobi-p-krasivaya-priroda-mira-priroda-krasivo-fot-35.jpg"
                                    alt="Первый слайд" style="height: 500px;">
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
        </section>

        <section class="row">
            <div class="col-8 m-auto">
                <div class="wrapper" style="background-color: aliceblue; color: #000;">
                    <h2 class="text-center pt-3">SEO текст</h2>

                    <p class="p-5 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error enim esse ut
                        voluptatibus repellat repudiandae commodi vitae corporis. Illo facere cumque, iste et accusamus
                        dolor nesciunt, itaque velit tempore, architecto harum excepturi unde ipsa? Consequuntur, optio
                        facere. Illum, cum placeat?</p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <section class="row">
            <div class="col-8 m-auto">
                <div class="wrapper" style="background-color: aliceblue; color: #000;">
                    <footer class="text-center text-lg-start text-muted pt-3">
                        <!-- Section: Social media -->


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

                                        <h6 class="pt-5">Разработка сайтов: AVADA-MEDIA</h6>
                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                        <!-- Links -->
                                        <h6 class="text-uppercase fw-bold mb-4">
                                            <a href="#" class="text-reset">Афиша</a>
                                        </h6>
                                        <p>
                                            <a href="#!" class="text-reset">Расписание</a>
                                        </p>
                                        <p>
                                            <a href="#!" class="text-reset">Скоро</a>
                                        </p>
                                        <p>
                                            <a href="#!" class="text-reset">Кинотеатры</a>
                                        </p>
                                        <p>
                                            <a href="#!" class="text-reset">Акции</a>
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
                                            <a href="#!" class="text-reset">Новости</a>
                                        </p>
                                        <p>
                                            <a href="#!" class="text-reset">Реклама</a>
                                        </p>
                                        <p>
                                            <a href="#!" class="text-reset">Кафе-бар</a>
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
    </div>
@endsection
