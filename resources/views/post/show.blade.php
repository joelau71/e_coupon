<x-user.layouts.app>

    @php
    $breadcrumbs = [
        ['name' => 'Post', "link" => route("user.post.index")],
        ["name" => "Show"]
    ];
    @endphp
    <x-user.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />

    <x-user.atoms.container>
        <div>
            <img src="/{{ $post->image->path}}" />
        </div>
        <div>
            <div class="font-bold text-2xl mt-4">
                {{ $post->title }}
            </div>
        </div>
        <div class="mt-4">
            {!! $post->body !!}
        </div>
        @if (count($post->comments) > 0)
        <div class="mt-4">
                <div class="font-bold">Comments:</div>
                <div class="border p-4 mt-2">
                    @foreach ($post->comments as $item)
                        <div class="flex mb-4">
                            <div class="w-1/4">
                                {{ $item->user->first_name }}: 
                            </div>
                            <div class="flex-1">
                                {{ $item->content }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </x-user.atoms.container>
</x-user.layouts.app>

