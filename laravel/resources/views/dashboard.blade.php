<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Gaya dasar */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6E8EF5, #A777E3);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container Dashboard */
        .dashboard-container {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
            width: 400px;
            text-align: center;
        }

        /* Judul Dashboard */
        h2 {
            margin-bottom: 20px;
            color: #4A4A4A;
            font-size: 24px;
            font-weight: 600;
        }

        /* Tombol Logout */
        button {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            background-color: #FF6F61;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e65c4f;
        }

        /* Link ke halaman login */
        .login-link {
            margin-top: 15px;
            display: block;
            color: #6E8EF5;
            font-size: 14px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-link:hover {
            color: #4a5fa7;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome to Dashboard</h2>

        <!-- Form logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <!-- Link untuk kembali ke halaman login jika diperlukan -->
        <a href="{{ route('login') }}" class="login-link">Go to Login Page</a>
    </div>
</body>
</html>

