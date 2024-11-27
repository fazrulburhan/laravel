<!-- resources/views/siswa/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            border-radius: 5px;
        }

        input[type="text"], input[type="email"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
        }

        button:hover {
            background-color: #45a049;
        }

        .cancel-button {
            background-color: #f44336;
        }

        .cancel-button:hover {
            background-color: #da190b;
        }
    </style>
</head>
<body>

    <h2>Edit Siswa</h2>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ $siswa->nama }}" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $siswa->email }}" required>

        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}" required>

        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat">{{ $siswa->alamat }}</textarea>

        <button type="submit">Update Siswa</button>
        <button><a href="{{ route('siswa.index') }}" class="cancel-button">Batal</a></button>
    </form>

    

</body>
</html>