@extends('layouts.index')
@section('main')

        <section class="mt-4">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="col-5">
                    <img src="./images/html.jpg" alt="PHP tutorial" width="100%">
                </div>
                <div class="col-7">
                    <div class="ps-4">
                        <h1>{{$posts->title}}</h1>
                        <div>
                            <time class="pe-5 text-secondary">{{ $posts->created_at->format('Y M D') }}</time>
                            <span class="ps-5 text-primary">{{ $posts->user->name }}</span>
                        </div>
                        <p class="mt-5"> {{  $posts->content  }} <p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection