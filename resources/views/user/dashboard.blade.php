<x-user.layouts.app>
    <div>
        Hello, {{ $user->first_name }} {{ $user->last_name}}
    </div>
    <div class="mt-3 flex">
        <div class="w-28">
            <img src="/{{ $user->image->path }}" alt="">
        </div>
        <div class="ml-4 flex-1 flex flex-col gap-y-2">
            <div>
                First Name: {{ $user->first_name }}
            </div>
            <div>
                Last Name: {{ $user->last_name }}
            </div>
            <div>
                Gender: {{ $user->gender }}
            </div>
            <div>
                Birthday: {{ $user->birthday }}
            </div>
            <div>
                Mobile: {{ $user->mobile }}
            </div>
            <div class="mt-4">
                <a class="bg-blue-600 text-white rounded px-4 py-2 hover:bg-blue-800" href="{{ route("user.edit") }}">Edit</a>
                <a class="bg-blue-600 text-white rounded px-4 py-2 hover:bg-blue-800" href="{{ route("user.changePassword") }}">Change Password</a>
            </div>
        </div>
    </div>
</x-user.layouts.app>