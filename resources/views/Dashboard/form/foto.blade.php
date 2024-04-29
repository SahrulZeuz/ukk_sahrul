<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-md shadow-md mt-10">
        <h2 class="text-2xl font-semibold mb-4">Tambah Foto</h2>
        <form action="{{ route('foto.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Foto</label>
                <input type="text" id="title" name="judulFoto"
                    class="mt-1 block w-full rounded-md px-4 py-3 border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Album</label>
                <textarea id="description" name="deskripsiFoto"
                    class="mt-1 block w-full rounded-md px-4 py-3 border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Foto</label>
                <input type="file" name="lokasiFile" id="image"
                    class="mt-1 block w-full rounded-md px-4 py-3 border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label for="album" class="block text-sm font-medium text-gray-700">Pilih Album</label>
                <select name="albumId" id="album"
                    class="mt-1 block w-full rounded-md px-4 py-3 border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    @foreach ($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->namaAlbum }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-3 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-300 ease-in-out">Tambah
                Foto</button>
        </form>
    </div>
</body>

</html>
