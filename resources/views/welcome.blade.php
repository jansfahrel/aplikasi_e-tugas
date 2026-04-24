<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Tugas | Professional Assignment Management</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --secondary: #6366f1;
            --text-main: #1e293b;
            --text-light: #64748b;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: radial-gradient(circle at top right, #4f46e5, #1e1b4b);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* CONTAINER */
        .container {
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            display: flex;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* LEFT SIDE - Branding */
        .left {
            width: 50%;
            padding: 60px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            background: rgba(255, 255, 255, 0.03);
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
            letter-spacing: 1px;
        }

        .logo i {
            background: var(--primary);
            padding: 10px;
            border-radius: 12px;
            font-size: 18px;
        }

        .tag {
            background: rgba(99, 102, 241, 0.2);
            color: #c7d2fe;
            display: inline-block;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: fit-content;
        }

        .left h1 {
            font-size: 42px;
            line-height: 1.2;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .left p {
            font-size: 16px;
            opacity: 0.8;
            line-height: 1.6;
            font-weight: 300;
        }

        /* RIGHT SIDE - Form */
        .right {
            width: 50%;
            background: var(--white);
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right h2 {
            color: var(--text-main);
            font-size: 28px;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .right p.subtitle {
            color: var(--text-light);
            margin-bottom: 35px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1.5px solid #e2e8f0;
            background: #f8fafc;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: var(--primary);
            background: var(--white);
            outline: none;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 13px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-light);
            cursor: pointer;
        }

        .remember-me input {
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .forgot-pass {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-pass:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: var(--primary);
            color: white;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
        }

        button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.4);
        }

        .footer-text {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: var(--text-light);
        }

        .footer-text a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        /* RESPONSIVE */
        @media (max-width: 850px) {
            .container {
                flex-direction: column;
                max-width: 450px;
                min-height: auto;
            }
            .left {
                width: 100%;
                padding: 40px;
            }
            .right {
                width: 100%;
                padding: 40px;
            }
            .left h1 {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- LEFT SIDE -->
    <div class="left">
        <div class="logo">
            <i class="fas fa-book-open"></i>
            E-Tugas
        </div>

        

        <h1>Kelola Tugas Kini Lebih Mudah.</h1>

        <p>
            Sistem manajemen tugas modern yang dirancang untuk efisiensi pengumpulan, 
            penilaian tepat waktu, dan pemantauan progress secara real-time.
        </p>
    </div>

    <!-- RIGHT SIDE -->
    <div class="right">
        <h2>Selamat Datang</h2>
        <p class="subtitle">Silakan login untuk mengakses akun Anda.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label>Alamat Email</label>
                <input type="email" name="email" placeholder="" required>
            </div>

            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="password" name="password" placeholder="" required>
            </div>

            <div class="options">
                <label class="remember-me">
                    <input type="checkbox" name="remember"> Ingat saya
                </label>
                <a href="#" class="forgot-pass">Lupa password?</a>
            </div>

            <button type="submit">Masuk ke Dashboard</button>
        </form>

        <p class="footer-text">
            Belum punya akun? <a href="#">Hubungi Admin</a>
        </p>
    </div>
</div>

</body>
</html>