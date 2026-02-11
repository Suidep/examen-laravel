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

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ url("/clientes") }}" class="flex items-center gap-2">
                <input type="text" name="buscar" placeholder="Buscar cliente" class="rounded-md" value="{{ $buscar }}">
                <button type="submit" class="bg-blue-500 text-white text-2xl w-28 h-10 rounded-md hover:bg-blue-600">Buscar</button>
            </form>
        </div>

        <div>
            <table>

            </table>
        </div>
    </x-app-layout>
</body>
</html>