@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <div class="col-6 p-5">
                        <!-- PIE CHART -->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Пол</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pie-chart" width="800" height="450" ></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <div class="col-lg-3 col-6 p-5">
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

                <!-- /.row -->



            </div>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
                labels: ["Мужской", "Женский"],
                datasets: [{
                    backgroundColor: ["rgb(80, 205, 122)", "rgb(236, 200, 90)"],
                    data: [{{$manUsers}}, {{$womanUsers}}]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: '100% от общего числа сеансов'
                }
            }
        });
    </script>
@endsection
