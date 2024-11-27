<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Reset all styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and background */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6E8EF5, #A777E3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container styling */
        .register-container {
            background: #fff;
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            animation: fadeIn 0.8s ease-out;
        }

        /* Heading */
        h2 {
            margin-bottom: 25px;
            color: #333;
            font-size: 28px;
            font-weight: 700;
        }

        /* Form styling */
        input[type="text"],
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

        /* Link to login page */
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

        /* Animation for fade-in effect */
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

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            .register-container {
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
    <div class="register-container">
        <h2>Register</h2>

        <!-- Display error messages if there are any -->
        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>

        <a href="{{ route('login') }}" class="login-link">Already have an account? Login here</a>
    </div>
</body>
</html>
