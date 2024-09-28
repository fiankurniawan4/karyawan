<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>MyKaryawan | Home Page</title>

</head>

<body>
    <x-navbar></x-navbar>
    <div class="hero min-h-screen"
        style="background-image: url({{ asset('images/tes.jpg') }});">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-white">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">MyKaryawan</h1>
                <p class="mb-5">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                    exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <button class="btn btn-primary">Get Started</button>
            </div>
        </div>
    </div>
    <div class="min-h-screen">
        <h1>TEST</h1>
    </div>
</body>

</html>
