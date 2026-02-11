<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Listado de Clientes') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>Bienvenido a la sección de clientes.</p>
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('mensaje'))
            <div class="" role="alert">
                {{ Session::get('mensaje') }}
                <button type="button" class="" data-bs-dismiss="alert" aria-label="Close">
                    <span>Cerrar</span>
                </button>
            </div>            
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ url("/clientes") }}" class="flex items-center gap-2">
                <input type="text" name="buscar" placeholder="Buscar cliente" class="rounded-md" value="{{ $buscar }}">
                <button type="submit" class="bg-blue-500 text-white text-2xl w-28 h-10 rounded-md hover:bg-blue-600">Buscar</button>
            </form>
        </div>

        <div>
            <table class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <thead class="">
                    <tr>
                        <th class="px-4">Id</th>
                        <th class="px-4">Nombre</th>
                        <th class="px-4">Dirección</th>
                        <th class="px-4">Email</th>
                        <th class="px-4">Teléfono</th>
                        <th class="px-4">Logo src</th>
                        <th class="px-4">Logo preview</th>
                        <th class="px-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($cliente))
                        <tr>
                            <td class="px-4">{{ $cliente->id }}</td>
                            <td class="px-4">{{ $cliente->nombre }}</td>
                            <td class="px-4">{{ $cliente->direccion }}</td>
                            <td class="px-4">{{ $cliente->email }}</td>
                            <td class="px-4">{{ $cliente->telefono }}</td>
                            <td class="px-4">{{ $cliente->logo }}</td>
                            <td class="px-4"><img class="" src="{{ asset('storage') . '/' . $cliente->logo }}" id="image-preview" height="70" alt=""></td>
                            <td class="px-4">
                                <a class="" href="{{ url('/clientes/' . $cliente->id . '/edit') }}">Editar</a>
                                <form action="{{ url('/clientes/' . $cliente->id) }}"  method="POST" class="">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="" type="submit" onclick="return confirm('¿Quiere borrar el cliente seleccionado?')" value="Borrar">
                                </form>
                            </td>
                        </tr>
                    @else
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td class="px-4">{{ $cliente->id }}</td>
                                <td class="px-4">{{ $cliente->nombre }}</td>
                                <td class="px-4">{{ $cliente->direccion }}</td>
                                <td class="px-4">{{ $cliente->email }}</td>
                                <td class="px-4">{{ $cliente->telefono }}</td>
                                <td class="px-4">{{ $cliente->logo }}</td>
                                <td class="px-4"><img class="" src="{{ asset('storage') . '/' . $cliente->logo }}" id="image-preview" height="70" alt=""></td>
                                <td class="px-4">
                                    <a class="" href="{{ url('/clientes/' . $cliente->id . '/edit') }}">Editar</a>
                                    <form action="{{ url('/clientes/' . $cliente->id) }}"  method="POST" class="">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <input class="" type="submit" onclick="return confirm('¿Quiere borrar el cliente seleccionado?')" value="Borrar">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td class="px-4" colspan="7"><a class="underline text-blue-600" href="{{ url('clientes/create') }}">Nuevo</a></td>
                    </tr>
                </tfoot>
            </table>
            @if (empty($cliente) && isset($clientes))
                {{ $clientes->links() }} 
            @endif
        </div>
    </x-app-layout>
</body>
</html>