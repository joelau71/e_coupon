<x-user.layouts.app>

    @php
    $breadcrumbs = [
        ['name' => 'Project', "link" => route("user.project.index")],
        ["name" => "Show"]
    ];
    @endphp
    <x-user.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />

    <x-user.atoms.container>
        <div>
            <img src="/{{ $project->image->path}}" />
        </div>
        <div>
            <div class="font-bold text-2xl mt-4">
                {{ $project->title }}
            </div>
        </div>

        @if (count($tasks) > 0)
        <div class="mt-4">
                <div class="font-bold">Tasks:</div>
                <div class="border p-4 mt-2">
                    @foreach ($tasks as $task)
                        <div class="">
                          {{ $task->user->first_name }}: {{ $task->title }}
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </x-user.atoms.container>
</x-user.layouts.app>

