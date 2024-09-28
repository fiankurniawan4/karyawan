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
                    <h1 class="text-2xl font-semibold text-gray-800">Karyawan</h1>
                    <hr class="my-4">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold text-gray-800">Table Karywan</h2>
                        </div>
                        <form action="" method="GET" class="flex">
                            <label class="input input-bordered flex items-center gap-2">
                                <input name="keyword" type="text" class="grow" placeholder="Search" />
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                    class="w-4 h-4 opacity-70">
                                    <path fill-rule="evenodd"
                                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </label>
                        </form>
                    </div>
                    <div class="mt-4">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left text-sm font-semibold text-gray-500">No</th>
                                    <th class="text-left text-sm font-semibold text-gray-500">Nama</th>
                                    <th class="text-left text-sm font-semibold text-gray-500">Gaji</th>
                                    <th class="text-center text-sm font-semibold text-gray-500">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawan as $item)
                                    <tr>
                                        <td class="text-sm text-gray-800">{{ $loop->iteration }}</td>
                                        <td class="text-sm text-gray-800">{{ $item->nama }}</td>
                                        <td class="text-sm text-gray-800">Rp. {{ $item->rupiah($item->gaji) }}</td>
                                        <td
                                            class="text-sm text-gray-800 flex flex-row justify-center items-center gap-2">
                                            <a href="{{ route('dashboard.karyawan.edit', $item->id) }}"
                                                class="btn bg-blue-600 hover:bg-blue-400 text-white">Edit</a>
                                            <a href="{{ route('dashboard.karyawan.delete', $item->id) }}"
                                                class="btn bg-red-600 hover:bg-red-400 text-white">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (!request()->has('keyword'))
                            <div class="join grid grid-cols-3 mt-4">
                                <a href="{{ $karyawan->previousPageUrl() }}" class="join-item btn btn-outline">Prev</a>
                                <div class="border border-gray-400 flex justify-center items-center">
                                    {{ $karyawan->currentPage() }}</div>
                                <a href="{{ $karyawan->nextPageUrl() }}" class="join-item btn btn-outline">Next</a>
                            </div>
                        @else
                            <div class="join grid grid-cols-3 mt-4">
                                <a href="{{ route('dashboard.karyawan') }}" class="join-item btn btn-outline">Reset</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="fixed bottom-4 right-4">
        <a href="{{ route('dashboard.karyawan.add') }}" class="btn flex gap-2 items-center bg-blue-600 hover:bg-blue-400 text-white py-2 px-4 rounded-full shadow-lg">
            <svg viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <title>plus</title>
                    <desc>Created with Sketch Beta.</desc>
                    <defs> </defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                        sketch:type="MSPage">
                        <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-360.000000, -1035.000000)"
                            fill="#FFFFFF">
                            <path
                                d="M388,1053 L378,1053 L378,1063 C378,1064.1 377.104,1065 376,1065 C374.896,1065 374,1064.1 374,1063 L374,1053 L364,1053 C362.896,1053 362,1052.1 362,1051 C362,1049.9 362.896,1049 364,1049 L374,1049 L374,1039 C374,1037.9 374.896,1037 376,1037 C377.104,1037 378,1037.9 378,1039 L378,1049 L388,1049 C389.104,1049 390,1049.9 390,1051 C390,1052.1 389.104,1053 388,1053 L388,1053 Z M388,1047 L380,1047 L380,1039 C380,1036.79 378.209,1035 376,1035 C373.791,1035 372,1036.79 372,1039 L372,1047 L364,1047 C361.791,1047 360,1048.79 360,1051 C360,1053.21 361.791,1055 364,1055 L372,1055 L372,1063 C372,1065.21 373.791,1067 376,1067 C378.209,1067 380,1065.21 380,1063 L380,1055 L388,1055 C390.209,1055 392,1053.21 392,1051 C392,1048.79 390.209,1047 388,1047 L388,1047 Z"
                                id="plus" sketch:type="MSShapeGroup"> </path>
                        </g>
                    </g>
                </g>
            </svg>
            <span class="mr-2">Tambah Karyawan</span>
        </a>
    </div>

</body>
