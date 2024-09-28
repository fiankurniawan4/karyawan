<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>MyKaryawan | Login</title>
</head>
<body>
    <x-navbar></x-navbar>
    <div class="min-h-screen flex justify-center items-center">
        <div class="flex flex-col border px-6 py-6 rounded-md shadow-md border-gray-300 items-center">
            <h3 class="text-2xl lg:text-3xl text-gray-400 font-bold font-sans">Login Form</h3>
            <p class="text-sm lg:text-md text-red-400">*Login to Karyawan Account</p>
            <form action="{{ route('login.post') }}" method="POST" class="mt-4 flex flex-col gap-2 justify-center items-center">
                @csrf
                <div class="">
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="w-4 h-4 opacity-70">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                        </svg>
                        <input type="text" class="grow" placeholder="Username" name="username" />
                    </label>
                </div>
                <div class="">
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="w-4 h-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <input type="password" class="grow" placeholder="Password" name="password" />
                    </label>
                </div>
                @foreach ($errors->all() as $error)
                    <p class="text-red-400 text-xs">{{ $error }}</p>
                @endforeach
                <button type="submit" class="btn btn-info text-gray-200 w-full">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
