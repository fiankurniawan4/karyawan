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
                    <h1 class="text-lg font-semibold text-gray-800">Home Dashboard</h1>
                    <hr class="my-10">
                    <div class="grid grid-cols-2 gap-x-20">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">Jumlah Karyawan</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="col-span-2">
                                    <div class="p-4 bg-green-100 rounded-xl">
                                        <div class="font-bold text-2xl leading-none">{{ count($karyawan) }}</div>
                                        <div class="mt-2">Karyawan</div>
                                    </div>
                                </div>
                                @php
                                    $data = [];
                                    foreach ($karyawan as $key => $value) {
                                        $data[] = $value;
                                    }
                                    $jumlah = 0;
                                    $jumlahdigaji = 0;
                                    foreach ($data as $row) {
                                        if ($row['status'] == 'Belum Digaji') {
                                            $jumlah++;
                                        }
                                        if ($row['status'] == 'Sudah Digaji') {
                                            $jumlahdigaji++;
                                        }
                                    }
                                @endphp
                                <div class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                                    <div class="font-bold text-2xl leading-none">{{ $jumlahdigaji }}</div>
                                    <div class="mt-2">Telah digaji</div>
                                </div>
                                <div class="p-4 bg-yellow-100 rounded-xl text-gray-800">
                                    <div class="font-bold text-2xl leading-none">{{ $jumlah }}</div>
                                    <div class="mt-2">Belum digaji</div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="flex flex-row justify-between mb-2">
                                <h2 class="text-lg font-semibold text-gray-800 mb-4">Catatan Kamu</h2>
                                <a href="{{ route('dashboard.notes') }}" class="btn btn-primary">Tambah Catatan</a>
                            </div>
                            <div class="space-y-4">
                                @foreach ($note as $item)
                                    <div class="p-4 bg-white border rounded-xl text-gray-800 space-y-2">
                                        <div class="flex justify-between">
                                            <div class="text-gray-400 text-xs">Number {{ $loop->iteration }}</div>
                                            <div class="text-gray-400 text-xs">{{ $item->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                        <a href="{{ route('dashboard.notes.view', $item->id) }}"
                                            class="font-bold hover:text-yellow-800 hover:underline">{{ $item->title }}</a>
                                        <div class="flex flex-row items-center gap-2 text-sm text-gray-600">
                                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M12 6V12" stroke="#000000" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                            {{ date('d F Y', strtotime($item->created_at)) }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
