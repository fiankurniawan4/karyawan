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
                            <h2 class="text-lg font-semibold text-gray-800">Edit Karywan</h2>
                        </div>
                    </div>
                    <div class="mt-4">
                        <form action="{{ route('dashboard.karyawan.update', $karyawan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col gap-4">
                                <div class="">
                                    <label for="nama">Nama</label>
                                    <label class="input input-bordered flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" /></svg>
                                        <input type="text" id="nama" name="nama" class="grow" placeholder="Nama" value="{{ $karyawan->nama }}" />
                                    </label>
                                </div>
                                <div class="">
                                    <label for="gaji">Gaji</label>
                                    <label class="input input-bordered flex items-center gap-2">
                                        <input type="text" class="grow" name="gaji" placeholder="Gaji" value="{{ $karyawan->gaji }}" />
                                    </label>
                                    <p class="text-sm text-red-600">*Note: angka seperti ini 1000 (akan menjadi 1.000) 3000000 (3.000.000) jadi isi tanpa titik ataupun koma</p>
                                </div>
                                <div class="">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="select select-bordered w-full">
                                        <option value="Belum Digaji" {{ $karyawan->status == "Belum Digaji" ? 'selected' : '' }}>Belum Digaji</option>
                                        <option value="Sudah Digaji" {{ $karyawan->status == "Sudah Digaji" ? 'selected' : '' }}>Sudah Digaji</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn bg-blue-600 hover:bg-blue-400 text-white">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
