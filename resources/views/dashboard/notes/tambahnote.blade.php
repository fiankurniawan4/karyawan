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
                    <h1 class="text-2xl font-semibold text-gray-800">Notes</h1>
                    <hr class="my-4">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold text-gray-800">Tambah Note</h2>
                        </div>
                    </div>
                    <div class="mt-4">
                        <form action="{{ route('dashboard.notes.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-col gap-4">
                                <div class="">
                                    <label for="title">Judul</label>
                                    <label class="input input-bordered flex items-center gap-2">
                                        <input type="text" id="title" name="title" class="grow" placeholder="Judul"/>
                                    </label>
                                </div>
                                <div class="flex flex-col">
                                    <label for="content">Deskripsi</label>
                                    <textarea class="textarea textarea-bordered" name="content" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn bg-blue-600 hover:bg-blue-400 text-white">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
