<x-user.layouts.app>

    @php
    $breadcrumbs = [
        ['name' => 'Posts'],
    ];
    @endphp
    <x-user.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />
    <x-user.atoms.container>
        <div class="flex justify-between items-center">
            <div></div>
            <div>
                <x-user.atoms.link href="{{ route('user.post.order') }}">
                    Order
                </x-user.atoms.link>
                <x-user.atoms.link href="{{ route('user.post.create') }}">
                    ADD
                </x-user.atoms.link>
            </div>
        </div>
    
        <x-user.atoms.header-banner>
            <div class="flex items-center flex-1">
                Slug
            </div>
            <div class="flex items-center flex-1">
                Title
            </div>
            <div class="flex items-center flex-1">
                Thumbnail
            </div>
            <div class="flex-1">
                Actions
            </div>
        </x-user.atoms.header-banner>
        
        @foreach ($posts as $post)
            <div class="flex items-center space-x-2 p-3">
                <div class="flex-1">
                    <a href="{{ route("slug", $post->url->slug) }}" target="_blank">
                        {{ $post->url->slug }}
                    </a>
                </div>
                <div class="flex-1">
                    <a href="{{ route("user.post.show", $post->id) }}">
                        {{ $post->title }}
                    </a>
                </div>
                <div class="flex-1">
                    <img class="w-20" src="/{{ $post->image->path }}" />
                </div>
                <div class="flex-1">
                    <x-user.atoms.link href="{{ route('user.post.edit', $post->id) }}">
                        Edit
                    </x-user.atoms.link>
                    <x-user.organisms.delete action="{{ route('user.post.destroy', $post->id) }}" />
                </div>
            </div>
        @endforeach
    </x-user.atoms.container>
</x-user.layouts.app>