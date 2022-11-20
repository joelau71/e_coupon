<x-user.layouts.app>
    <div>
        Hello, {{ $user->first_name }} {{ $user->last_name}}
    </div>
    <form method="post" class="mt-5" action="{{ route("user.changePassword2") }}" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        
        <div class="mt-4">
            <label for="current">Current Password: </label>
            <x-user.atoms.text name="current" id="current" value="{{ old('current') }}" />
            @error('current')
                <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label for="password">New Password: </label>
            <x-user.atoms.password name="password" id="password" value="{{ old('password') }}" />
            @error('password')
                <div class="text-sm text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label for="password_confirmation">Confirmation Password: </label>
            <x-user.atoms.password name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" />
            @error('password')
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
</x-user.layouts.app>