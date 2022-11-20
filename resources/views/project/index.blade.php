<x-user.layouts.app>
    @php
    $breadcrumbs = [
        ['name' => 'Projects'],
    ];
    @endphp
    <x-user.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />
    <x-user.atoms.container>
        <div class="flex justify-between items-center">
            <div></div>
            <div>
                {{-- <x-user.atoms.link href="{{ route('user.project.order') }}">
                    Order
                </x-user.atoms.link> --}}
                <x-user.atoms.link href="{{ route('user.project.create') }}">
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
        
        @foreach ($tasks as $task)
            <div class="flex items-center space-x-2 p-3">
                <div class="flex-1">
                    <a href="{{ route("user.project.show", $task->project->id) }}">
                        {{ $task->project->title }}
                    </a>
                </div>
                <div class="flex-1">
                    <img class="w-20" src="/{{ $task->project->image->path }}" />
                </div>
                <div class="flex-1">
                    <x-user.atoms.link href="{{ route('user.project.edit', $task->project->id) }}">
                        Edit
                    </x-user.atoms.link>
                    <x-user.organisms.delete action="{{ route('user.project.destroy', $task->project->id) }}" />
                </div>
            </div>
        @endforeach
    </x-user.atoms.container>
</x-user.layouts.app>