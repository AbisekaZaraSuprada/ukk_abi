<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        /* General Body Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f7ff;
            color: #333;
        }

        /* Navbar Styling */
        nav {
            background: linear-gradient(45deg, #ff7a18, #af002d, #320b86);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: white !important;
            font-weight: 600;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar-nav a {
            color: white;
        }

        .navbar-nav a:hover {
            color: #ffeb3b;
        }

        /* Form Card Styling */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to right, #ff9a8b, #ff6a88, #d57eeb);
        }

        .card-body {
            padding: 2rem;
            background-color: #fff;
            border-radius: 10px;
        }

        .card-body h5 {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border-radius: 25px;
            border: 1px solid #ddd;
            box-shadow: none;
            padding: 12px;
            margin-bottom: 10px;
        }

        .form-control:focus {
            border-color: #ff7a18;
            box-shadow: 0 0 8px rgba(255, 122, 24, 0.5);
        }

        .btn-primary {
            background-color: #ff7a18;
            border: none;
            padding: 12px;
            border-radius: 25px;
            font-weight: 500;
            text-transform: uppercase;
        }

        .btn-primary:hover {
            background-color: #ff5722;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-outline-primary {
            border: 2px solid #ff7a18;
            color: #ff7a18;
            padding: 10px 20px;
            border-radius: 25px;
        }

        .btn-outline-primary:hover {
            background-color: #ff7a18;
            color: white;
            transition: all 0.3s ease;
        }

        /* Responsive Styling */
        @media (max-width: 767px) {
            .card {
                margin-top: 20px;
            }
        }

        /* Bottom Text Link */
        p {
            text-align: center;
            font-size: 14px;
        }

        p a {
            color: #ff7a18;
            font-weight: bold;
        }

        p a:hover {
            color: #ff5722;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Web Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
                <a href="login.php" class="btn btn-outline-primary m-1">Masuk</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body bg-light">
                        <div class="text-center">
                            <h5>Daftar</h5>
                        </div>
                        <form action="config/aksi_register.php" method="POST">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>

                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>

                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>

                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="namalengkap" class="form-control" required>

                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>

                            <div class="d-grid mt-2">
                                <button class="btn btn-primary" type="submit" name="kirim">Daftar</button>
                            </div>
                        </form>
                        <hr>
                        <p>Sudah punya akun? <a href="login.php">Login disini!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>
