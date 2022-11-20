<div class="container px-8 m-auto">
    <div class="flex flex-wrap">
        @foreach ($posts as $post)
            <div class="w-1/4">
                <img src="/{{ $post->image->path }}" alt="">
                <div>
                    {{ $post->title }}
                </div>
            </div>
        @endforeach
    </div>
</div>