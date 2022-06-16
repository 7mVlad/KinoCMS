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
                <a href="{{route('admin.stock.create')}}" class="btn btn-block btn-outline-success">Добавить акцию</a>
            </div>
        </div>

        <h2 class="font-weight-bold text-center mb-5">Список Акций</h2>

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
                    @foreach ($stocks as $stock)
                    <tr>
                        <td>{{$stock->title}}</td>
                        <td>{{date('d.m.Y', strtotime($stock->date))}}</td>
                        @if($stock->status == 1)
                            <td>ВКЛ</td>
                        @else
                            <td>ВЫКЛ</td>
                        @endif
                        <td class="text-right">
                            <a class="btn btn-info btn-sm" href="{{route('admin.stock.edit', $stock->id )}}">
                                <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Изменить
                            </a>
                        </td>
                        <td class="text-left">
                            <form action="{{route('admin.stock.delete', $stock->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash" role="button">&nbsp;&nbsp;Удалить</i>
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

