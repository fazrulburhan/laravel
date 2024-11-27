<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <style>
        /* Reset some default browser styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Button Styling */
        .add-button, .logout-button, .profile-button {
            display: inline-block;
            padding: 12px 20px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            margin-bottom: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .add-button {
            background-color: #28a745;
            margin-right: 10px;
        }

        .add-button:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .logout-button {
            background-color: #dc3545;
        }

        .logout-button:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }

        .profile-button {
            background-color: #007bff;
        }

        .profile-button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

       /* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px 15px;
    text-align: center;
    border: 1px solid #ddd;
}

th {
    background-color: #007bff; /* Warna biru pada header */
    color: white; /* Teks putih untuk header */
    font-size: 1.1rem;
    font-weight: bold;
}

td {
    font-size: 0.9rem;
    background-color: #f9f9f9; /* Warna latar belakang sel data */
}

tr:nth-child(even) td {
    background-color: #f1f1f1; /* Alternatif warna untuk baris genap */
}

tr:hover {
    background-color: #e0e0e0; /* Efek hover pada baris tabel */
    cursor: pointer;
}

.actions a {
    text-decoration: none;
    color: #007bff;
    margin-right: 10px;
    font-weight: bold;
    transition: color 0.3s ease;
}

.actions a:hover {
    color: #0056b3;
}

.actions button {
    background: none;
    border: none;
    color: #dc3545;
    cursor: pointer;
    font-weight: bold;
    transition: color 0.3s ease;
}

.actions button:hover {
    color: #c82333;
 }

        

        /* Empty State Styling */
        .empty-state {
            text-align: center;
            font-size: 1.2rem;
            color: #6c757d;
            padding: 20px;
        }

        /* Profile Section */
        .profile-section {
            background-color: white;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .profile-header img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 20px;
        }

        .profile-header h3 {
            font-size: 1.5rem;
            color: #333;
        }

        .profile-header .email {
            color: #6c757d;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                font-size: 0.8rem;
            }

            th, td {
                padding: 10px;
            }

            .add-button, .logout-button, .profile-button {
                padding: 10px 15px;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-header img {
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Profile Section -->
        <div class="profile-section">
            <div class="profile-header">
                <!-- Profile Picture -->
                <img src="{{ auth()->user()->foto ? Storage::url(auth()->user()->foto) : 'foto.jpg' }}" alt="Profile Picture">
                <div>
                    <h4></h4>
                </div>
                <div>
                    <h3>Fazrul Burhan</h3>
                    <p class="email">fazrulburhan@gmail.com</p>
                </div>
            </div> 
        </div>

        <h2>Daftar Siswa</h2>

        <!-- Buttons Section -->
        <div class="buttons">
            <!-- Button to add a new student -->
            <a href="{{ route('siswa.create') }}" class="add-button">Tambah Siswa</a>

            <!-- Logout Button -->
            <a href="{{ route('logout') }}" class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <!-- Hidden logout form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <!-- Table of Students -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($siswa as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td class="actions">
                        <!-- Edit link -->
                        <a href="{{ route('siswa.edit', $data->id) }}">Edit</a>

                        <!-- Delete form -->
                        <form action="{{ route('siswa.destroy', $data->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="empty-state">Tidak ada data siswa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>