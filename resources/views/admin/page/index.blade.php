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
                          <a href="{{ route('admin.page.create') }}" class="btn btn-block btn-outline-success">Создать
                              новую</a>
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
                                  <td>{{date('d.m.Y', strtotime($mainPage->created_at))}}</td>
                                  @if ($mainPage->status == 1)
                                      <td>ВКЛ</td>
                                  @else
                                      <td>ВЫКЛ</td>
                                  @endif
                                  <td class="text-center">
                                      <a class="btn btn-info btn-sm"
                                          href="{{ route('admin.main-page.edit', $mainPage->id) }}">
                                          <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Изменить
                                      </a>
                                  </td>
                              </tr>
                              @foreach ($pages as $page)
                                  <tr>
                                      <td>{{ $page->title }}</td>
                                      <td>{{date('d.m.Y', strtotime($page->created_at))}}</td>
                                      @if ($page->status == 1)
                                          <td>ВКЛ</td>
                                      @else
                                          <td>ВЫКЛ</td>
                                      @endif
                                      <td class="text-center">
                                          <a class="btn btn-info btn-sm" href="{{ route('admin.page.edit', $page->id) }}">
                                              <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Изменить
                                          </a>
                                      </td>
                                      @if ($page->id != 1 && $page->id != 2 && $page->id != 3 && $page->id != 4 && $page->id != 5 && $page->id != 6)
                                          <td class="text-left">
                                              <form action="{{route('admin.page.delete', $page->id)}}" method="POST">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger btn-sm">
                                                      <i class="fas fa-trash" role="button">&nbsp;&nbsp;Удалить</i>
                                                  </button>
                                              </form>
                                          </td>
                                      @endif

                                  </tr>
                              @endforeach
                              <tr>
                                  <td>Контакты</td>
                                  <td>{{date('d.m.Y', strtotime($mainPage->created_at))}}</td>
                                  @if ($mainPage->status == 1)
                                      <td>ВКЛ</td>
                                  @else
                                      <td>ВЫКЛ</td>
                                  @endif
                                  <td class="text-center">
                                      <a class="btn btn-info btn-sm" href="{{ route('admin.contact.edit') }}">
                                          <i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Изменить
                                      </a>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>


              </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
  @endsection
