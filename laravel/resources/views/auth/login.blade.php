<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and background styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6E8EF5, #A777E3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Login container styling */
        .login-container {
            background: #fff;
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            animation: fadeIn 0.8s ease-out;
        }

        /* Header styling */
        h2 {
            margin-bottom: 25px;
            color: #333;
            font-size: 28px;
            font-weight: 700;
        }

        /* Input styling */
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #6E8EF5;
            outline: none;
            background-color: #e6f0ff;
        }

        /* Submit button styling */
        button {
            width: 100%;
            padding: 14px;
            border-radius: 8px;
            background-color: #6E8EF5;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #5a78d1;
            transform: translateY(-2px);
        }

        /* Error message styling */
        .error-message {
            color: #D9534F;
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Register link styling */
        .register-link {
            margin-top: 15px;
            display: block;
            color: #6E8EF5;
            font-size: 14px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .register-link:hover {
            color: #4a5fa7;
        }

        /* Animation for fading in the login container */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .login-container {
                width: 90%;
                padding: 30px;
            }

            h2 {
                font-size: 24px;
            }

            button {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <!-- Error message if login fails -->
        @if ($errors->has('error'))
            <div class="error-message">
                {{ $errors->first('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <a href="{{ route('register') }}" class="register-link">Belum punya akun? Daftar di sini</a>
    </div>
</body>
</html>
