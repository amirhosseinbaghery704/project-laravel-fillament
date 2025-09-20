<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @include('partial.nav')
    <section class=" container d-flex flex-wrap mt-3 justify-content-center">
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
  </body>  
<</html>


<div class="d-flex justify-content-center mt-3">
    {{ $posts->links() }}
</div>