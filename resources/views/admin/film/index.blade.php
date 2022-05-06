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
                <a href="{{route('admin.film.create')}}" class="btn btn-block btn-outline-success">Добавить фильм</a>
            </div>
        </div>

        <h2 class="font-weight-bold text-center">Список текущих фильмов</h2>
        <div class="row mb-5">
            @foreach ($films as $film)
            @if($film->release == 1)
            <div class="col-2 text-center m-5" style="height: 250px" >
                <a class="text-dark" href="{{route('admin.film.edit', $film->id )}}">
                    <img width="100%" height="100%" src="{{ Storage::url($film->main_image) }}">
                    <h4 class="mt-2"> {{$film->title}} </h4>
                </a>
            </div>

            @endif
            @endforeach
        </div>
        <!-- /.row -->

        <h2 class="font-weight-bold text-center">Список фильмов которые скоро покажут</h2>
        <div class="row  mb-5">
            @foreach ($films as $film)
            @if($film->release == 0)
            <div class="col-2 text-center m-5" style="height: 250px" >
                <a class="text-dark" href="{{route('admin.film.edit', $film->id )}}">
                    <img width="100%" height="100%" src="{{ Storage::url($film->main_image) }}">
                    <h4 class="mt-2"> {{$film->title}} </h4>
                </a>
            </div>
            @endif
            @endforeach
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

