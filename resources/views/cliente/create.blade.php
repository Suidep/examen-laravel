<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario insercción</title>
</head>
<body>
    <div class="">    
        <p>Formulario para insertar cliente</p>
        <form action="{{ url('/clientes/') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('cliente.form', ['submit' => 'Añadir cliente', 'cancel' => 'Cancelar la inserción'])
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', ()=>{
            const fileInput = document.getElementById('logo');
            const imgPreview = document.getElementById('image-preview');

            fileInput.addEventListener('change', (event)=>{
                const file = event.target.files[0];
                const fileReader = new FileReader();

                fileReader.addEventListener('load', (e)=>{
                    imgPreview.src = e.target.result;
                });

                fileReader.readAsDataURL(file);
            });
        });
    </script>
</body>
</html>