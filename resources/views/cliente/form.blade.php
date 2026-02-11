@if (count($errors) > 0)
    <div class="" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="">
    <label for="nombre">Nombre</label>
    <input class="" type="text" name="nombre" id="nombre" maxlength="64" value="{{ isset($cliente->nombre) ? $cliente->nombre : old('nombre') }}">
</div>
<div class="">
    <label for="direccion">Dirección</label>
    <input class="" type="text" name="direccion" id="direccion" maxlength="64" value="{{ isset($cliente->direccion) ? $cliente->direccion : old('direccion') }}">
</div>
<div class="">
    <label for="email">Email</label>
    <input class="" type="text" name="email" id="email" maxlength="100" value="{{ isset($cliente->email) ? $cliente->email : old('email') }}">
</div>
<div class="">
    <label for="telefono">Teléfono</label>
    <input class="" type="text" name="telefono" id="telefono" maxlength="11" value="{{ isset($cliente->telefono) ? $cliente->telefono : old('telefono') }}">
</div>
<div class="">
    <label for="logo">Logo</label>
    @if (isset($cliente->logo))
        <img class="" src="{{ asset('storage') . '/' . $cliente->logo }}" style="height: 70px" alt="">
    @endif
    <input class="" type="file" name="logo" id="logo" accept="image/*">
    <img class="" style="height: 70px" id="image-preview" src="" alt="">
</div>
<button class="" type="submit">{{ $submit }}</button>
<a class="" href="{{ url('clientes') }}">{{ $cancel }}</a>