  @extends('admin.layouts.main')
  @section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

          <!-- Main content -->
          <section class="content">
              <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                      <div class="col-12 mt-5">
                          <form action="{{ route('admin.main-page.update', $mainPage->id) }}" id="form" method="POST"
                              enctype="multipart/form-data" class="ml-4 mb-3">
                              @csrf
                              @method('PATCH')


                              <div class="form-group radio-switch">
                                  <input type="radio" name="status" id="public" value="0"
                                      {{ $mainPage->status == 0 ? 'checked' : '' }}>
                                  <label for="public">
                                      ВЫКЛ
                                  </label>
                                  <input type="radio" name="status" id="private" value="1"
                                      {{ $mainPage->status == 1 ? 'checked' : '' }}>
                                  <label for="private">
                                      ВКЛ
                                  </label>
                              </div>



                              {{-- Поле для названия --}}
                              <div class="form-group">
                                  <label>Телефон</label>
                                  <input type="text" class="form-control w-25 mb-3 mt-3" name="phone_one"
                                      placeholder="777 85 98" value="{{ $mainPage->phone_one }}" required>
                                  <input type="text" class="form-control w-25" name="phone_two" placeholder="777 85 98"
                                      value="{{ $mainPage->phone_two }}" required>
                              </div>

                              {{-- Поле для описания --}}
                              <div class="form-group w-75 mt-5">
                                  <label>SEO Текст:</label>
                                  <textarea class="form-control" placeholder="Текст" name="seo_text" style="resize: none; height:150px">{{ $mainPage->seo_text }}</textarea>
                              </div>


                              {{-- SEO блок --}}
                              <div class="form-group w-50 mt-5">
                                  <label class=" d-block">SEO блок:</label>
                                  <label>URL:</label>
                                  <input type="text" class="form-control mb-2" name="seo_url" placeholder="URL"
                                      value="{{ $seoBlock->url }}">
                                  <label>Title:</label>
                                  <input type="text" class="form-control mb-2" name="seo_title" placeholder="Title"
                                      value="{{ $seoBlock->title }}">
                                  <label>Keywords:</label>
                                  <input type="text" class="form-control mb-2" name="seo_keywords" placeholder="Word"
                                      value="{{ $seoBlock->keywords }}">
                                  <label>Description:</label>
                                  <input type="text" class="form-control mb-2" name="seo_description"
                                      placeholder="Description" value="{{ $seoBlock->description }}">

                              </div>

                              <input type="submit" class="btn btn-primary font-weight-bolder d-block m-auto"
                                  value="Изменить">

                          </form>


                      </div>
                  </div>
                  <!-- /.row -->

              </div><!-- /.container-fluid -->
          </section>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
  @endsection
