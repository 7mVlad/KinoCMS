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
        <div class="row">
            @foreach ($films as $film)
            <div class="col-2 text-center m-5" >
                <img width="250" height="250" src="{{ Storage::url($film->image_1) }}">

                <h3>saff</h3>
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

