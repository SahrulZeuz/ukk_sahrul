<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Sahrul</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <nav class="bg-gray-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-white text-xl font-semibold">Gallery Foto Sahrul</a>
                </div>
                <div class="flex items-center">
                    <a href="/dashboard"
                        class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-600">Home</a>
                    <a href="/album"
                        class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-600">Album</a>
                    <a href="/foto"
                        class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-600">Foto</a>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('logout') }}"
                        class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-600">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    {{-- gallery --}}

    <div class="container py-8 mx-auto">
        @if ($albums->isNotEmpty())
            <h1>Albums</h1>
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($albums as $al)
                <a href="{{ route('album.sort', ['id' => $al->id]) }}">
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $al->namaAlbum }}
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $al->deskripsi }}</p>
                </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="container py-8 mx-auto">
        @if ($fotos->isNotEmpty())
            <h1 class="text-2xl font-bold mb-4">Foto</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($fotos as $foto)
                    <div
                        class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 relative">
                        <!-- Tombol Delete -->
                        <form action="{{ route('foto.delete', ['id' => $foto->id]) }}" method="post"
                            class="absolute top-2 right-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')"
                                class="text-red-500 hover:text-red-700 focus:outline-none">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <!-- Gambar -->
                        <div class="abo">
                            <img src="{{ $foto->lokasiFile }}" alt="{{ $foto->lokasiFile }}"
                                class="w-full h-64 object-cover rounded-md">
                        </div>
                        <!-- Informasi Foto -->
                        <h5 class="mt-2 mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $foto->judulFoto }}
                        </h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $foto->deskripsiFoto }}</p>
                        <!-- Like dan Comments -->
                        <!-- Tambahkan bagian ini sesuai kebutuhan -->
                        <br>
                        <p class="text-gray-400">{{ $likeCounts[$foto->id] }} Like</p>
                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center space-x-2">
                                <form action="{{ route('like', ['id' => $foto->id]) }}" method="post">
                                    @csrf
                                    <button class="focus:outline-none mr-2">
                                        <i class="fas fa-thumbs-up text-blue-500 hover:text-blue-700 "></i> Like
                                    </button>
                                </form>
                                <a href="{{ route('komentar', ['id' => $foto->id]) }}" class="focus:outline-none">
                                    <i class="fas fa-comment text-green-500 hover:text-green-700"></i> Comments
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <p class="text-gray-500">Belum ada foto yang ditampilkan.</p>
        @endif
    </div>
</body>

</html>
