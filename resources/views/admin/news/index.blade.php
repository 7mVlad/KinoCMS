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
                <a href="{{route('admin.news.create')}}" class="btn btn-block btn-outline-success">Создать новость</a>
            </div>
        </div>

        <h2 class="font-weight-bold text-center mb-5">Список Новостей</h2>

        <div class="row">
            <table class="table table-striped table-dark col-10 m-auto text-center">
                <thead>
                  <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Статус</th>
                    <th scope="col" colspan="2" class="text-center">Действия</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($newsMuch as $news)
                    <tr>
                        <td>{{$news->title}}</td>
                        <td>{{$news->date}}</td>
                        @if($news->status == 1)
                            <td>ВКЛ</td>
                        @else
                            <td>ВЫКЛ</td>
                        @endif
                        <td class="text-right"><a href="{{route('admin.news.edit', $news->id )}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                        <td class="text-left">
                            <form action="{{route('admin.news.delete', $news->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fas fa-trash text-danger" role="button"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
        </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

