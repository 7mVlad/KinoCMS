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
                          <form id="form" action="{{ route('admin.film.update', $film->id) }}" method="POST"
                              enctype="multipart/form-data" class="ml-4 mb-3">
                              @csrf
                              @method('PATCH')
                              {{-- Поле для названия --}}
                              <div class="form-group w-25">
                                  <label>Название фильма</label>
                                  <input type="text" class="form-control" name="title" placeholder="Название фильма"
                                      value="{{ $film->title }}" required>
                              </div>

                              {{-- Поле для описания --}}
                              <div class="form-group w-75">
                                  <label>Описание фильма</label>
                                  <textarea class="form-control" placeholder="Описание фильма" name="content" style="resize: none; height:150px"
                                      required>{{ $film->content }}</textarea>
                              </div>

                              {{-- Поле для главной картинки --}}
                            <div class="form-group mt-5">
                                <div class="d-flex">
                                    <label>Главная картинка</label>

                                    <div class="form-element ml-5 mb-5">

                                        <label>
                                            <input type="file" accept="image/*" name="main_image"
                                                onchange="document.getElementById('mainImage').src = window.URL.createObjectURL(this.files[0])">

                                            <img id="mainImage"
                                                src="{{ isset($film->main_image) ? Storage::url($film->main_image) : 'https://bit.ly/3ubuq5o' }}"
                                                style="width: 250px">

                                        </label>


                                        {{-- Удаление картинок --}}
                                        <div class="btn-delete" style="margin-left:235px"
                                            onclick="imageMainDelete('{{ $film->id ?? '' }}')">
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
                                                    src="{{ isset($filmImages[$i]->path) ? Storage::url($filmImages[$i]->path) : 'https://bit.ly/3ubuq5o' }}">

                                            </label>

                                            {{-- Удаление картинок --}}
                                            <div class="btn-delete"
                                                onclick="imageDelete('{{ $filmImages[$i]->id ?? '' }}', {{ $i }})">
                                                <span>x</span>
                                            </div>

                                        </div>
                                    @endfor
                                </div>
                            </div>


                              {{-- Поле ссылки youtube --}}
                              <div class="form-group w-50 mb-5">
                                  <label>Ссылка на трейлер</label>
                                  <input type="text" class="form-control" name="trailer_link"
                                      placeholder="Ссылка на видео в youtube" value="{{ $film->trailer_link }}" required>
                              </div>


                              {{-- Поле для выбора типа кино --}}
                              <div class="form-group mt-3">
                                  <label class="mr-5">Тип кино</label>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" name="type_3d" value="1"
                                          {{ $film->type_3d == 1 ? 'checked' : '' }}>
                                      <label class="form-check-label">3D</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" name="type_2d" value="1"
                                          {{ $film->type_2d == 1 ? 'checked' : '' }}>
                                      <label class="form-check-label">2D</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" name="type_imax" value="1"
                                          {{ $film->type_imax == 1 ? 'checked' : '' }}>
                                      <label class="form-check-label">IMAX</label>
                                  </div>
                              </div>

                              {{-- Поле для выбора выхода фильма --}}
                              <div class="form-group mt-3">
                                  <label class="mr-5">Релиз фильма</label>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="release" value="1"
                                          {{ $film->release == 1 ? 'checked' : '' }}>
                                      <label class="form-check-label mr-4">В кино</label>
                                      <input class="form-check-input" type="radio" name="release" value="0"
                                          {{ $film->release == 0 ? 'checked' : '' }}>
                                      <label class="form-check-label">Скоро</label>

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
                          <form action="{{ route('admin.film.delete', $film->id) }}" method="POST">
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
  @endsection
