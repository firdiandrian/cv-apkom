<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Barang Baru</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }

        .vertical-center {
            min-height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body class="bg-light">
    <div class="vertical-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Tambahkan Barang Baru</div>

                        <div class="card-body">
                            <form id="createForm" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="NamaBarang">Nama Barang</label>
                                    <input type="text" class="form-control" id="NamaBarang" name="NamaBarang" required>
                                </div>

                                <div class="form-group">
                                    <label for="Harga">Harga Barang</label>
                                    Rp.<input type="text" class="form-control" id="Harga" name="Harga" required>
                                </div>

                                <div class="form-group">
                                    <label for="Stok">Stok Barang</label>
                                    <input type="number" class="form-control" id="Stok" name="Stok" required>
                                </div>

                                <div class="form-group">
                                    <label for="Foto">Foto Barang</label>
                                    <input type="file" class="form-control-file" id="Foto" name="Foto">
                                </div>

                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="/../../api/api/barangs" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
    $('#createForm').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '{{ route("barangs.store") }}',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                alert(response.message);
                window.location.href = '/barangs';
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
                alert('An error occurred while adding the item. Please try again.');
                window.location.href = '/barang/create';
            }
        });
    });
});
    </script>
</body>
</html>
<!-- <!DOCTYPE html>
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
        <form action="{{ route('barangs.store') }}" method="POST">
            @csrf
            <center><h1>REGISTER ADMIN</h1></center>
            <div class="form-group">
                <input type="text" class="form-control" name="NamaBarang" placeholder="NamaBarang" required>
            </div>
            <div class="form-group">
                <input type="Stok" class="form-control" name="Stok" placeholder="Stok" required>
            </div>
            <div class="form-group">
                <input type="Harga" class="form-control" name="Harga" placeholder="Harga" required>
            </div>
            <div class="form-group">
                <label for="Foto">Foto:</label>
                <input type="file" class="form-control-file" id="Foto" name="Foto" required>
                @if ($errors->has('Foto'))
                    <div class="alert alert-danger">{{ $errors->first('Foto') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <p class="text-center mt-3">Sudah punya akun? <a href="/">Login di sini</a></p>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-6">Create Admin</h1>
    <form action="{{ route('barangs.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang:</label>
            <input type="text" name="NamaBarang" id="NamaBarang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="Stok" class="block text-gray-700 text-sm font-bold mb-2">Stok:</label>
            <input type="Stok" name="Stok" id="Stok" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="Harga" class="block text-gray-700 text-sm font-bold mb-2">Harga:</label>
            <input type="Harga" name="Harga" id="Harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="Foto" class="block text-gray-700 text-sm font-bold mb-2">Foto:</label>
            <input type="Foto" name="Foto" id="Foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> --> -->