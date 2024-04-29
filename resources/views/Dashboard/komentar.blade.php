<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Comment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Optional: Custom styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            padding: 20px;
        }

        .comment-container {
            max-width: 600px;
            margin: auto;
        }

        .comment-form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .comment-form textarea {
            resize: none;
            min-height: 100px;
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 8px;
            margin-bottom: 10px;
        }

        .comment-form button {
            padding: 8px 16px;
            background-color: #4f46e5;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container mb-6 max-w-2xl mx-auto">
        <a href="/dashboard" class="text-blue-500">Back</a>

    </div>
    <div class="mb-6 max-w-2xl mx-auto bg-white p-8 rounded shadow-lg">
        <img src="{{ $foto->lokasiFile }}" alt="Photo" class="w-full rounded">
        <h2 class="text-lg font-semibold">{{ $foto->judulFoto }}</h2>
        <h4 class="text-gray-600">{{ $foto->deskripsiFoto }}</h4>
        <hr>
    </div>
    <div class="comment-container">

        <!-- Add Comment Form -->
        <form action="{{ route('komentar.store', ['id' => $foto->id]) }}" method="post" class="comment-form">
            @csrf
            <textarea name="komentar" id="comment" placeholder="Tambahkan komentar Anda..."
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"></textarea>
            <button type="submit" class="mt-3 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Tambahkan
                Komentar</button>
        </form>

        <!-- Existing Comments -->
        @foreach ($komen as $komentar)
            <div class="bg-white rounded-lg shadow-lg p-4 mt-4">
                <div class="flex items-start mb-4">
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="text-lg font-semibold">{{ $komentar->user->name }}</h3>
                        </div>
                        <p class="text-gray-700">{{ $komentar->komentar }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</body>

</html>
