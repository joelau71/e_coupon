<x-user.layouts.app>

    @php
    $breadcrumbs = [
        ['name' => 'Elements'],
    ];
    @endphp
    <x-user.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />
    <x-user.atoms.container>
        <div class="flex justify-between items-center">
            <div></div>
            <div>
                <x-user.atoms.link href="{{ route('user.element.order') }}">
                    Order
                </x-user.atoms.link>
                <x-user.atoms.link href="{{ route('user.element.create') }}">
                    ADD
                </x-user.atoms.link>
            </div>
        </div>
    
        <x-user.atoms.header-banner>
            <div class="flex items-center flex-1">
                Title
            </div>
            <div class="flex items-center flex-1">
                Model
            </div>
            <div class="flex-1">
                Actions
            </div>
        </x-user.atoms.header-banner>
        
        @foreach ($elements as $element)
            <div class="flex items-center space-x-2 p-3">
                <div class="flex-1">
                    {{ $element->title }}
                </div>

                <div class="flex-1">
                    {{ $element->template->title }}
                </div>

                <div class="flex-1">
                    <x-user.atoms.link href="{{ route('user.element.edit', $element->id) }}">
                        Edit
                    </x-user.atoms.link>
                    @php
                        $model = Str::lower($element->template->title);
                        $link = "user.element.{$model}.index";
                    @endphp
                    <x-user.atoms.link href="{{ route($link, $element->id) }}">
                        Detail
                    </x-user.atoms.link>
                    <x-user.organisms.delete action="{{ route('user.element.destroy', $element->id) }}" />
                </div>
            </div>
        @endforeach
    </x-user.atoms.container>
</x-user.layouts.app>