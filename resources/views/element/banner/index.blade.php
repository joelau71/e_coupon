<x-user.layouts.app>

    @php
    $breadcrumbs = [
        ['name' => 'Element', "link" => route("user.element.index")],
        ["name" => $element->title],
        ["name" => "Banner", "link" => route("user.element.banner.index", $element->id)],
        ["name" => "Create"]
    ];
    @endphp
    <x-user.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />
    <x-user.atoms.container>
        <div class="flex justify-between items-center">
            <div></div>
            <div>
                <x-user.atoms.link href="{{ route('user.element.banner.order', $element->id) }}">
                    Order
                </x-user.atoms.link>
                <x-user.atoms.link href="{{ route('user.element.banner.create', $element->id) }}">
                    ADD
                </x-user.atoms.link>
            </div>
        </div>
    
        <x-user.atoms.header-banner>
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
        
        @foreach ($banners as $banner)
            <div class="flex items-center space-x-2 p-3">
                <div class="flex-1">
                    {{ $banner->title }}
                </div>
                <div class="flex-1">
                    <img class="w-20" src="/{{ $banner->image->path }}" />
                </div>
                <div class="flex-1">
                    <x-user.atoms.link href="{{ route('user.element.banner.edit', [
                        'element_id' => $element->id,
                        'id' => $banner->id
                    ]) }}">
                        Edit
                    </x-user.atoms.link>
                    <x-user.organisms.delete action="{{ route('user.element.banner.destroy', [
                        'element_id' => $element->id,
                        'id' => $banner->id
                    ]) }}" />
                </div>
            </div>
        @endforeach
    </x-user.atoms.container>
</x-user.layouts.app>