<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla Categorías IBG</title>
</head>
<body>
    <h1>Tabla Categorías Iker Benavente</h1>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Mostrar lista de categorías --}}
    @if($categorias->isEmpty())
        <p>No hay categorías registradas.</p>
    @else
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion ?? 'Sin descripción' }}</td>
                        <td>{{ $categoria->fecha ?? 'No indicada' }}</td>
                        <td>
                            <a href="{{ route('categorias.show', $categoria->id) }}">
                                <button>Ver detalles</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <hr>

    <h2>Agregar nueva categoría</h2>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf

        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion"></textarea><br><br>

        <label>Fecha:</label><br>
        <input type="date" name="fecha"><br><br>

        <label>Estado:</label><br>
        <select name="estado">
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select><br><br>

        <label>Prioridad:</label><br>
        <input type="number" name="prioridad" min="1" max="5" value="1"><br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
