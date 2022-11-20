<x-user.layouts.app>

    @php
    $breadcrumbs = [
        ['name' => 'Post', "link" => route("user.post.index")],
        ["name" => "Edit"]
    ];
    @endphp
    <x-user.atoms.breadcrumb :breadcrumbs="$breadcrumbs" />

    <x-user.atoms.container>
        <form action="{{ route('user.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <x-user.atoms.required />

            <div>
                <input type="file"
                    name="image"
                    class="upload-image-cropper"
                    data-uic-display-width="600"
                    data-uic-display-height="400"
                    data-uic-target-width="600"
                    data-uic-target-height="400"
                    data-uic-title="Size: 600(w) x 400(h)"
                    data-uic-path="/{{ $post->image->path }}"
                />
                @error("image")
                    <x-user.atoms.error>
                        {{ $message }}
                    </x-user.atoms.error>
                @enderror
            </div>

            <x-user.organisms.text title="Slug" field="slug" required="true" value="{{ $post->url->slug }}" />
        
            <x-user.organisms.text title="Title" field="title" required="true" value="{{ $post->title }}" />

            <x-user.organisms.textarea title="Body" field="body" isRichText required="true">
                {!! $post->body !!}
            </x-user.organisms.textarea>

            <x-user.atoms.row>
                <x-user.atoms.label>Tags</x-user.atoms.label>
                <select name="tags[]" multiple class="select2 w-full">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @if (in_array($tag->id, $selectedTags))
                            selected
                        @endif>{{ $tag->title }}</option>
                    @endforeach
                </select>
            </x-user.atoms.row>

            <hr class="my-10">
            <div class="text-right">
                <x-user.atoms.link href="{{ route('user.post.index') }}">
                    Back
                </x-user.atoms.link>
                <x-user.atoms.button>
                    Save
                </x-user.atoms.button>
            </div>
        </form>
    </x-user.atoms.container>
    @push('head')
        <link rel="stylesheet" href="{{ asset("css/select2.min.css") }}" />
        <link rel="stylesheet" href="{{ asset("css/cropper.css") }}" />
        <link rel="stylesheet" href="{{ asset("css/uploadImageCropper.css") }}" />
        <style>
            .select2-container{
                width: 100% !important;
            }
            .select2-container--default .select2-selection--multiple{
                border: 1px solid #e5e7eb;
            }
        </style>
    @endpush
    @push('footer')
        <script src="{{ asset("js/jquery-3.6.0.min.js") }}"></script>
        <script src="{{ asset("js/select2.min.js") }}"></script>
        <script src="{{ asset("js/cropper.min.js") }}"></script>
        <script src="{{ asset("js/uploadImageCropper.js") }}"></script>
        <script>
            $(".select2").select2();
        </script>
    @endpush
</x-user.layouts.app>

