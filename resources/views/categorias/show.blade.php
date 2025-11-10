<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de la Categoría</title>
</head>
<body>
    <h1>Detalles de la Categoría</h1>

    <p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>
    <p><strong>Descripción:</strong> {{ $categoria->descripcion ?? 'Sin descripción' }}</p>
    <p><strong>Estado:</strong> 
        @if($categoria->estado === 'activo')
            <span style="color: green;">Activo</span>
        @else
            <span style="color: red;">Inactivo</span>
        @endif
    </p>
    <p><strong>Prioridad:</strong> {{ $categoria->prioridad }}</p>

    <br>
    <a href="{{ route('categorias.index') }}">
        <button>Volver al listado</button>
    </a>
</body>
</html>
