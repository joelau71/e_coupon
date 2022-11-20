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
        <form action="{{ route('user.element.banner.store', $element->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-user.atoms.required />

            <div>
                <input type="file"
                    name="image"
                    class="upload-image-cropper"
                    data-uic-display-width="1920"
                    data-uic-display-height="600"
                    data-uic-target-width="1920"
                    data-uic-target-height="600"
                    data-uic-title="Size: 1920(w) x 600(h)"
                />
                @error("image")
                    <x-user.atoms.error>
                        {{ $message }}
                    </x-user.atoms.error>
                @enderror
            </div>

            <x-user.organisms.text title="Title" field="title" required="true" />

            <x-user.organisms.textarea title="Body" field="body" required="true"></x-user.organisms.textarea>

            <hr class="my-10">
            <div class="text-right">
                <x-user.atoms.link href="{{ route('user.element.banner.index', $element->id) }}">
                    Back
                </x-user.atoms.link>
                <x-user.atoms.button>
                    Save
                </x-user.atoms.button>
            </div>
        </form>
    </x-user.atoms.container>
    @push('head')
        <link rel="stylesheet" href="{{ asset("css/cropper.css") }}" />
        <link rel="stylesheet" href="{{ asset("css/uploadImageCropper.css") }}" />
    @endpush
    @push('footer')
        <script src="{{ asset("js/jquery-3.6.0.min.js") }}"></script>
        <script src="{{ asset("js/cropper.min.js") }}"></script>
        <script src="{{ asset("js/uploadImageCropper.js") }}"></script>
    @endpush
</x-user.layouts.app>

