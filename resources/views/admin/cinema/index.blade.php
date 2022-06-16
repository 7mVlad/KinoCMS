@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-2 mb-3 mt-3">
                        <a href="{{ route('admin.cinema.create') }}" class="btn btn-block btn-outline-success">Добавить
                            Кинотеатр</a>
                    </div>
                </div>

                <h2 class="font-weight-bold text-center">Список кинотеатров</h2>
                <div class="row pb-5">
                    @foreach ($cinemas as $cinema)
                        <div class="col-4 text-center m-5" style="height: 350px">
                            <a class="text-dark" href="{{ route('admin.cinema.edit', $cinema->id) }}">
                                <img width="100%" height="100%" src="{{ Storage::url($cinema->logo_image) }}">
                                <h3 class="mt-2"> {{ $cinema->title }} </h3>
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
