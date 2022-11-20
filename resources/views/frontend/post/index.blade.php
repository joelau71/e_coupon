@extends("frontend.layout.app")
@section('content')
    <div class="container m-auto px-8">
        <div>
            <img src="/{{ $post->image->path }}" alt="">
        </div>
        <div class="font-bold text-2xl text-center">
            {{ $post->title }}
        </div>
        <div>
            {!! $post->body !!}
        </div>
    </div>
@endsection