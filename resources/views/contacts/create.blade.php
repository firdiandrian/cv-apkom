@include('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Massage</title>
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
<div class="bg-white py-24 sm:py-16">
<body class="bg-light">
    <div class="vertical-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add New Massage</div>

                        <div class="card-body">
                            <form id="createForm" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="NamaPengirim">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="NamaPengirim" name="NamaPengirim" required>
                                </div>

                                <div class="form-group">
                                    <label for="EmailPengirim">Email</label>
                                    <input type="text" class="form-control" id="EmailPengirim" name="EmailPengirim" required>
                                </div>

                                <div class="form-group">
                                    <label for="NoTelpPengirim">No Telepon</label>
                                    <input type="number" class="form-control" id="NoTelpPengirim" name="NoTelpPengirim" required>
                                </div>

                                <div class="form-group">
                                    <label for="Massage">Massage</label>
                                    <textarea type="text" class="form-control" id="Massage" name="Massage" required> </textarea>
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
    </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
    $('#createForm').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '{{ route("contacts.store") }}',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                alert(response.message);
                window.location.href = '/contacts/create';
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
                alert('An error occurred while adding the item. Please try again.');
                window.location.href = '/contacts/create';
            }
        });
    });
});
    </script>
   
</body>
<section>
 
</html>