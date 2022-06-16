  @extends('admin.layouts.main')
  @section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

          <!-- Main content -->
          <section class="content">
              <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                      <div class="col-12">

                          <form id="form" action="{{ route('admin.hall.update', $hall->id) }}" method="POST"
                              enctype="multipart/form-data" class="ml-4 mb-3">
                              @csrf
                              @method('PATCH')

                              {{-- Поле для названия --}}
                              <div class="form-group w-25">
                                  <label>Номер зала</label>
                                  <input type="text" class="form-control" name="hall_number" placeholder="Номер зала"
                                      value="{{ $hall->hall_number }}" required>
                              </div>

                              {{-- Поле для описания --}}
                              <div class="form-group w-75">
                                  <label>Описание зала</label>
                                  <textarea class="form-control" placeholder="Описание зала" name="description" style="resize: none; height:150px"
                                      required>{{ $hall->description }}</textarea>
                              </div>


                               {{-- Поле для схема зала --}}
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <label>Схема Зала</label>

                                    <div class="form-element ml-5 mb-5">

                                        <label>
                                            <input type="file" accept="image/*" name="hall_scheme"
                                                onchange="document.getElementById('schemeImage').src = window.URL.createObjectURL(this.files[0])">

                                            <img id="schemeImage"
                                                src="{{ isset($hall->hall_scheme) ? Storage::url($hall->hall_scheme) : 'https://bit.ly/3ubuq5o' }}"
                                                style="width: 250px">

                                        </label>


                                        {{-- Удаление картинок --}}
                                        <div class="btn-delete" style="margin-left:235px"
                                            onclick="imageSchemeDelete('{{ $hall->id ?? '' }}')">
                                            <span>x</span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            {{-- Поле для верхнего баннера --}}
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <label>Фото верхнего баннера</label>

                                    <div class="form-element ml-5 mb-5">

                                        <label>
                                            <input type="file" accept="image/*" name="top_banner"
                                                onchange="document.getElementById('bannerImage').src = window.URL.createObjectURL(this.files[0])">

                                            <img id="bannerImage"
                                                src="{{ isset($hall->top_banner) ? Storage::url($hall->top_banner) : 'https://bit.ly/3ubuq5o' }}"
                                                style="width: 250px">

                                        </label>


                                        {{-- Удаление картинок --}}
                                        <div class="btn-delete" style="margin-left:235px"
                                            onclick="imageBannerDelete('{{ $hall->id ?? '' }}')">
                                            <span>x</span>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            {{-- Поле для картинок --}}
                            <div class="form-group mt-5">
                                <div class="d-flex justify-content-between">
                                    <label>Галерея картинок <br><br> Размер: 1000 х 190</label>

                                    @for ($i = 0; $i < 5; $i++)
                                        <div class="form-element mr-5 mb-5">

                                            <label>
                                                <input type="file" accept="image/*" name="images[]"
                                                    onchange="document.getElementById('img-{{ $i }}').src = window.URL.createObjectURL(this.files[0])">

                                                <img id="img-{{ $i }}"
                                                    src="{{ isset($hallImages[$i]->path) ? Storage::url($hallImages[$i]->path) : 'https://bit.ly/3ubuq5o' }}">

                                            </label>

                                            {{-- Удаление картинок --}}
                                            <div class="btn-delete"
                                                onclick="imageDelete('{{ $hallImages[$i]->id ?? '' }}', {{ $i }})">
                                                <span>x</span>
                                            </div>

                                        </div>
                                    @endfor
                                </div>
                            </div>

                              {{-- SEO блок --}}
                              <div class="form-group w-50 ">
                                  <label class=" d-block">SEO блок:</label>
                                  <label>URL:</label>
                                  <input type="text" class="form-control mb-2" name="seo_url" placeholder="URL"
                                      value="{{ $seoBlock->url }}" required>
                                  <label>Title:</label>
                                  <input type="text" class="form-control mb-2" name="seo_title" placeholder="Title"
                                      value="{{ $seoBlock->title }}" required>
                                  <label>Keywords:</label>
                                  <input type="text" class="form-control mb-2" name="seo_keywords" placeholder="Word"
                                      value="{{ $seoBlock->keywords }}" required>
                                  <label>Description:</label>
                                  <input type="text" class="form-control mb-2" name="seo_description"
                                      placeholder="Description" value="{{ $seoBlock->description }}" required>

                              </div>

                              <div class="form-group d-flex justify-content-center">
                                  <input type="submit" class="btn btn-primary font-weight-bolder mr-3" value="Изменить">

                          </form>
                          <form action="#" method="POST">
                              {{-- {{route('admin.hall.delete', $hall->id)}} --}}
                              @csrf
                              @method('DELETE')
                              <input type="submit" class="btn btn-danger font-weight-bolder" value="Удалить">
                          </form>
                      </div>

                  </div>
              </div>
              <!-- /.row -->

      </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <script>
          function previewBeforeUpload(id) {

              document.querySelector("#" + id).addEventListener("change", function(e) {

                  if (e.target.files.length == 0) {
                      return;
                  }

                  let file = e.target.files[0];
                  let url = URL.createObjectURL(file);

                  document.querySelector("#" + id + "-preview div").style.visibility = "hidden";
                  document.querySelector("#" + id + "-preview img").src = url;

              });
          }

          function deleteImage(id) {
              document.querySelector("#submit-" + id).onclick = function() {
                  let path = document.querySelector("#img-" + id + "-preview img").src;
                  document.querySelector("#img-" + id + "-preview img").src = "https://bit.ly/3ubuq5o";
                  document.querySelector("#img-" + id + "-preview div").style.visibility = "visible";
                  add_field(path);

              }
          }

          previewBeforeUpload("img-logo");
          deleteImage("logo");
          previewBeforeUpload("img-banner");
          deleteImage("banner");
      </script>
  @endsection
