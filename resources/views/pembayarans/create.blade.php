<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
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
                        <div class="card-header">Add Pembayaran</div>
                        <div class="card-body">
                            <form id="createForm" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="pemesanan_id">Pembayaran</label>
                                    <select name="pemesanan_id" id="pemesanan_id" class="form-control">
                                        @foreach($orders as $order)
                                            <option value="{{ $order->id }}">
                                                {{ $order->barangs->NamaBarang}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="Bukti">Bukti</label>
                                    <input type="file" class="form-control" id="Bukti" name="Bukti" required>
                                </div>

                                <div class="form-group">
                                    <label for="Konfirmasi">Konfirmasi</label>
                                    <select name="Konfirmasi" id="Konfirmasi" class="form-control">
                                            
                                            <option value="Belum Lunas">BelumLunas</option>
                                            </select>
                                </div> 

                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="/menu" class="btn btn-secondary">Back</a>
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
                    url: '{{ route("pembayarans.store") }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        alert(response.message);
                        window.location.href = '/';
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                        alert('An error occurred while adding the item. Please try again.');
                        window.location.href = '/pembayarans/create';
                    }
                });
            });
        });
    </script>
</body>
</html>
