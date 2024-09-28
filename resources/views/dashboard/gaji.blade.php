<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                    <h1 class="text-2xl font-semibold text-gray-800">Gaji</h1>
                    <div class="mt-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800">Gaji Bulan Ini</h2>
                                <p class="text-sm text-gray-500">Gaji yang dikeluarkan bulan ini</p>
                            </div>
                            @php
                                $data = [];
                                foreach ($karyawan as $key => $value) {
                                    $data[] = $value;
                                }
                                $totalgaji = 0;
                                foreach ($data as $row) {
                                    if ($row['status'] == 'Sudah Digaji') {
                                        $totalgaji += $row['gaji'];
                                    }
                                }
                            @endphp
                            <div>
                                <p class="text-2xl font-semibold text-gray-800">Rp.
                                    {{ number_format($totalgaji, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex flex-row justify-between">
                                <h2 class="text-lg font-semibold text-gray-800">Karyawan & Gaji</h2>
                                <div class="flex flex-row gap-2">
                                    <form action="{{ route('dashboard.gaji.all') }}" method="POST" id="form">
                                        @csrf
                                        <button type="button" onclick="return confirmDelete();" class="btn bg-yellow-300 hover:bg-yellow-200">Gaji Semua</button>
                                    </form>
                                    <a href="{{ route('dashboard.laporan') }}" class="btn bg-yellow-300 hover:bg-yellow-200">Unduh laporan</a>
                                </div>
                            </div>
                            <div class="mt-4">
                                <table class="w-full">
                                    <thead>
                                        <tr>
                                            <th class="text-left text-sm font-semibold text-gray-500">Karyawan</th>
                                            <th class="text-left text-sm font-semibold text-gray-500">Tanggal</th>
                                            <th class="text-left text-sm font-semibold text-gray-500">Gaji</th>
                                            <th class="text-left text-sm font-semibold text-gray-500">Status</th>
                                            <th class="text-center text-sm font-semibold text-gray-500">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($karyawanT as $item)
                                            <tr>
                                                <td class="text-sm text-gray-800">{{ $item->nama }}</td>
                                                <td class="text-sm text-gray-800">
                                                    {{ $item->tanggal_digaji ? date('l, d F Y', strtotime($item->tanggal_digaji)) : '-' }}
                                                <td class="text-sm text-gray-800">Rp. {{ $item->rupiah($item->gaji) }}
                                                </td>
                                                <td class="text-sm text-gray-800">{{ $item->status }}</td>
                                                <td class="text-sm text-gray-800">
                                                    @if ($item->status == 'Belum Digaji')
                                                        <a href="{{ route('dashboard.gaji.karyawan', $item->id) }}"
                                                            class="btn bg-yellow-300 hover:bg-yellow-200 w-full">Gaji</a>
                                                    @else
                                                        <a 
                                                            class="btn bg-red-600 hover:bg-red-200 w-full">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="join grid grid-cols-3 mt-4">
                                    <a href="{{ $karyawanT->previousPageUrl() }}"
                                        class="join-item btn btn-outline">Previous</a>
                                    <div class="border border-gray-400 flex justify-center items-center">
                                        {{ $karyawanT->currentPage() }}</div>
                                    <a href="{{ $karyawanT->nextPageUrl() }}" class="join-item btn btn-outline">Next</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menggaji semua karyawan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, gaji semua!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form').submit();
                } else {
                    return false;
                }
            })
        }
    </script>
</body>
