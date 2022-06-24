@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <div class="row">

                     {{-- Статистика Сеансы По Полу --}}
                    <div class="col-6 p-5 ml-auto">
                        <!-- PIE CHART -->
                        <div class="card card-danger ">
                            <div class="card-header">
                                <h3 class="card-title">Пол</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pie-chart" width="800" height="450"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <div class="col-lg-3 col-6 p-5 mr-auto">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ count($users) }}</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ./col -->

                {{-- Статистика Сеансы --}}
                <div class="row">
                    <div class="col-10 m-auto pb-5">

                        <div class="card card-primary">
                            <div class="card-header">

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="line-chart" width="800" height="350"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                </div>

            {{-- Статистика тип устройства --}}
                <div class="row">
                    <div class="col-10 m-auto pb-5">

                        <div class="card card-success">
                            <div class="card-header">

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="line-chart-type" width="800" height="350"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                </div>


            </div>
        </section>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>

        //  Статистика Сеансы По Полу

        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
                labels: ["Мужской", "Женский"],
                datasets: [{
                    backgroundColor: ["rgb(80, 205, 122)", "rgb(236, 200, 90)"],
                    data: ["{{ $manUsers ?? ''}}", "{{ $womanUsers ?? '' }}"],
                }]
            },
            options: {
                title: {
                    display: true,
                    text: '100% от общего числа сеансов',
                    fontSize: 18
                }
            }
        });

        //  Статистика Сеансы

        new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: [`@foreach ($sessions as $key => $session) `, ` {{date('d.m.Y', strtotime($key))}} @endforeach`] ,
                datasets: [{
                    data: [`@foreach ($sessions as $key => $session) `, ` {{count($session)}} @endforeach`],
                    label: "Сеансы",
                    borderColor: "#3e95cd",
                    fill: true
                }]
            },
            options: {
                title: {
                    display: true,
                    fontSize: 22,
                    text: 'Сеансы'
                }
            }
        });

        //  Статистика тип устройства

        new Chart(document.getElementById("line-chart-type"), {
            type: 'line',
            data: {
                labels: [`@foreach ($dates as $key => $date) `, ` {{date('d.m.Y', strtotime($key))}} @endforeach`] ,
                datasets: [{
                    data: [`@foreach ($mobiles as $key => $mobile) `, ` {{count($mobile)}} @endforeach`],
                    label: "Мобильные устройства",
                    borderColor: "#f49d51",
                    fill: true
                },{
                    data: [`@foreach ($desktops as $key => $desktop) `, ` {{count($desktop)}} @endforeach`],
                    label: "Компьютер",
                    borderColor: "#56f451",
                    fill: true
                }]
            },
            options: {
                title: {
                    display: true,
                    fontSize: 22,
                    text: 'Устройства'
                }
            }
        });
    </script>
@endsection

