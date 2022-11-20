<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')
    <style>
        [x-cloak]{
            display: none !important;
        }
    </style>
    @stack('head')
</head>

<body class="overflow-x-hidden">
    @include('sweetalert::alert')
    <div class="flex min-h-screen">
        <div class="flex-none bg-gray-600 w-48 relative shadow-2xl">
            <div class="fixed h-screen w-48">
                {{-- <div>
                    <a
                        href="{{ route("admin.dashboard") }}"
                        class="border-b border-white text-white block px-3 py-2 hover:bg-gray-900 bg-gray-900">
                        Dashboard
                    </a>
                </div> --}}
            
                <div>
                    <a class=" text-white block px-3 py-2 hover:bg-gray-900" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="p-6 flex-1">
            @yield('content')
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.5.2/cdn.js"></script>
    <script src="https://cdn.tiny.cloud/1/oc28g760xepwuf67x0d41w72jmhs2pra79599ky264hjbjsi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    @stack('footer')
</body>
</html>
