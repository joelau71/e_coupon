<x-user.layouts.app>

    @php
    $breadcrumbs = [
        ['name' => 'Element', "link" => route("user.element.index")],
        ["name" => "Create"]
    ];
    @endphp
    <x-user.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />

    <x-user.atoms.container>
        <form action="{{ route('user.element.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-user.atoms.required />

            <x-user.organisms.text title="Title" field="title" required="true" />

            <x-user.atoms.row>
                <x-user.atoms.label class="required">Template</x-user.atoms.label>
                <select name="template" class="select2 w-full border mt-4 p-2">
                    <option value="">--Select--</option>
                    @foreach ($templates as $template)
                        <option value="{{ $template->id }}">{{ $template->title }}</option>
                    @endforeach
                </select>
            </x-user.atoms.row>

            <hr class="my-10">
            <div class="text-right">
                <x-user.atoms.link href="{{ route('user.element.index') }}">
                    Back
                </x-user.atoms.link>
                <x-user.atoms.button>
                    Save
                </x-user.atoms.button>
            </div>
        </form>
    </x-user.atoms.container>
</x-user.layouts.app>

