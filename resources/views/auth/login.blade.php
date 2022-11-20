<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>

<body>
    @include('sweetalert::alert')
    <div class="flex justify-end min-h-screen items-center bg-cover bg-center overflow-hidden">
        <img class="absolute w-full h-full object-cover" src="{{ $url }}" id="auth-login-bg" alt="">
        <div class="px-10 mr-20 bg-white bg-opacity-40 backdrop-filter backdrop-blur-sm sm:rounded-lg text-gray-700">
            <form method="POST" class="w-96" action="{{ url("auth/login") }}">
                @csrf
                <div class="mt-4">
                    <label for="email" class="required">
                        Email
                    </label>
                    <input id="email" class="w-full p-2 mt-2" type="email" name="email" required="required" autofocus="autofocus" />
                </div>
    
                <div class="mt-4">
                    <label for="password" class="required">
                        Password
                    </label>
                    <input id="password" class="w-full p-2 mt-2" type="password" name="password" required="required" autocomplete="current-password" />
                </div>
    
                <div class="mt-4">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <label for="remember_me" class="inline-flex items-center">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>
    
                <div class="my-6 text-right">
                    <button class="inline-block cursor-pointer bg-green-600 text-white rounded px-6 py-2 hover:bg-green-500 ml-4" type="submit">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>