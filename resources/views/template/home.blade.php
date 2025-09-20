@extends('layouts.index')

@section('main')

<section class="d-flex flex-wrap mt-3 justify-content-center">
    @if ($posts->count())
        @foreach ($posts as $post )
            <div class="card mx-2 mb-3" style="width: 19rem;">
                <img src="images/html.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    {{ Str::limit(strip_tags($post->content), 100, '...') }}
                    <a href="{{ route('single' , ['id' => $post->id]) }}" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    @else
        <div>
            does not posts
        </div>
    @endif
</section>

<div class="d-flex justify-content-center mt-3">
    {{ $posts->links() }}
</div>


@endsection