<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Gallery</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f7ff;
            color: #333;
        }

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


        @media (max-width: 767px) {
            .card {
                margin-top: 20px;
            }
        }

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

 
        .landing-section {
            background: linear-gradient(135deg, #ff7a18, #af002d);
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .landing-section h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .landing-section p {
            font-size: 1.25rem;
            margin-bottom: 30px;
        }

        .landing-section .btn {
            background-color: #ff5722;
            border-radius: 25px;
            padding: 12px 24px;
            color: white;
            text-transform: uppercase;
        }

        .landing-section .btn:hover {
            background-color: #ff7a18;
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

 
    <section class="landing-section">
        <div>
            <h1>Welcome to Web Gallery</h1>

            <a href="register.php" class="btn">Get Started</a>
        </div>
    </section>

   

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
