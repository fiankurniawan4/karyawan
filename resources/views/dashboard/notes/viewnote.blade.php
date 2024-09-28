<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyKaryawan | {{ auth()->user()->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
</head>

<body class="relative bg-yellow-50 overflow-hidden max-h-screen font-open">
    <x-dash-nav></x-dash-nav>
    <main class="ml-60 max-h-screen overflow-auto">
        <div class="px-6 py-8">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl p-8 mb-5">
                    <div class="flex flex-row justify-between">
                        <h1 class="text-2xl font-semibold text-gray-800">{{ $note->title }}</h1>
                        <p class="text-md lg:text-lg">{{ $note->created_at->diffForHumans() }}</p>
                    </div>
                    <hr class="my-4">
                    <p class="text-gray-600 leading text-md lg:text-lg">{{ $note->content }}</p>
                </div>
                <div class="flex flex-row justify-between">
                    <a 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                    <a href="{{ route('dashboard.notes.destroy', $note->id) }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                </div>
            </div>
        </div>
    </main>

</body>
