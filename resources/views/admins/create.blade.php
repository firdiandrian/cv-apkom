<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            width: 440px;
            border: 2px solid #000;
            border-radius: 10px;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 10px;
        }
        .btn-block {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="centered-form">
    <div class="form-container">
        <form action="{{ route('admins.store') }}" method="POST">
            @csrf
            <center><h1>REGISTER ADMIN</h1></center>
            <div class="form-group">
                <input type="text" class="form-control" name="Nama" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="Email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="Password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <p class="text-center mt-3">Sudah punya akun? <a href="/admin/login">Login di sini</a></p>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>