@extends('layouts.main')
@section('content')
    <section class="row">
        <div class="col-12 m-auto">
            <div class="wrapper pb-5" style="background-color: aliceblue;color:black">
                <div class="container">

                    <h2 class="text-center pt-5 mb-5">Новости</h2>
                    @foreach ($contacts as $contact)
                        <div class="row mb-5 pb-5">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <h3>{{ $contact->getCinema->title }}</h3>
                                    </div>
                                    <div class="col-6">
                                        <img src="{{ $contact->logo_image }}" style="width:100%; height:150px">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <img src="{{ Storage::url($contact->getCinema->logo_image) }}"
                                            style="width:100%; height:300px">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <p style="width:100%; height:150px">{{ $contact->address }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 ml-5">
                                        {!! $contact->coordinates !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

        </div>
    </section>
@endsection

