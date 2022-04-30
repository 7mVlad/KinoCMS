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
                <a href="{{route('admin.page.create')}}" class="btn btn-block btn-outline-success">Создать новую</a>
            </div>
        </div>

        <h2 class="font-weight-bold text-center mb-5">Список Страниц</h2>

        <div class="row">
            <table class="table table-striped table-dark col-10 m-auto text-center">
                <thead>
                  <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Дата создания</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Действия</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Главная страница</td>
                        <td>{{$mainPage->created_at}}</td>
                        @if($mainPage->status == 1)
                            <td>ВКЛ</td>
                        @else
                            <td>ВЫКЛ</td>
                        @endif
                        <td class="text-center">
                            <a class="btn btn-info btn-sm" href="{{route('admin.main-page.edit', $mainPage->id )}}">
                                <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Изменить
                            </a>
                        </td>
                    </tr>
                    @foreach ($pages as $page)
                    <tr>
                        <td>{{$page->title}}</td>
                        <td>{{$page->created_at}}</td>
                        @if($page->status == 1)
                            <td>ВКЛ</td>
                        @else
                            <td>ВЫКЛ</td>
                        @endif
                        <td class="text-center">
                            <a class="btn btn-info btn-sm" href="{{route('admin.page.edit', $page->id )}}">
                                <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Изменить
                            </a>
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

