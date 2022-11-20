<x-user.layouts.app>
    <div>
        Hello, {{ $user->first_name }} {{ $user->last_name}}
    </div>
    <form method="post" class="mt-5" action="{{ route("user.update") }}" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <div>
            <input type="file"
                name="image"
                class="upload-image-cropper"
                data-uic-display-width="300"
                data-uic-display-height="300"
                data-uic-target-width="300"
                data-uic-target-height="300"
                data-uic-title="Size: 300(w) x 300(h)"
                data-uic-path="/{{ $user->image->path }}"
            />
        </div>
        <div class="mt-4">
            <label for="first_name" class="cursor-pointer">First Name: </label>
            <x-user.atoms.text name="first_name" id="first_name" value="{{ $user->first_name }}"  />
            @error('first_name')
                <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-4">
            <label for="last_name" class="cursor-pointer">Last Name: </label>
            <x-user.atoms.text name="last_name" id="last_name" value="{{ $user->last_name }}" />
            @error('last_name')
                <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label for="email" class="cursor-pointer">Email: </label>
            <x-user.atoms.text name="email" id="email" value="{{ $user->email }}" />
            @error('email')
                <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label>Birthday:</label>
            <x-user.atoms.text class="datepicker" id="birthday" name="birthday" value="{{ $user->birthday }}" />
            @error('birthday')
                <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-4">
            <label for="mobile" class="cursor-pointer">Mobile: </label>
            <x-user.atoms.text name="mobile" id="mobile" value="{{ $user->mobile }}" />
            @error("mobile")
                <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label class="mr-4">Gender: </label>
            <input type="radio" name="gender" id="gender-m" value="m" @if ($user->gender == "m")
                checked
            @endif />
            <label class="mr-4 cursor-pointer" for="gender-m">Male</label>
            <input type="radio" name="gender" id="gender-f" value="f" @if ($user->gender == "f")
                checked
            @endif/>
            <label class="cursor-pointer" for="gender-f">Female</label>
            @error("gender")
                <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mt-4 flex justify-end gap-x-4">
            <a class="bg-blue-600 text-white rounded px-4 py-2 hover:bg-blue-800" href="{{ url()->previous() }}">
                Back
            </a>
            <button type="submit" class="bg-blue-600 text-white rounded px-4 py-2 hover:bg-blue-800 leading-[1.3]">
                Save
            </button>
        </div>
    </form>
    @push('head')
        <link rel="stylesheet" href="{{ asset("css/jquery-ui.min.css") }}" />
        <link rel="stylesheet" href="{{ asset("css/cropper.css") }}" />
        <link rel="stylesheet" href="{{ asset("css/uploadImageCropper.css") }}" />
    @endpush
    @push('footer')
        <script src="{{ asset("js/jquery-3.6.0.min.js") }}"></script>
        <script src="{{ asset("js/jquery-ui.min.js") }}"></script>
        <script src="{{ asset("js/cropper.min.js") }}"></script>
        <script src="{{ asset("js/uploadImageCropper.js") }}"></script>
        <script>
            $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
        </script>
    @endpush
</x-user.layouts.app>