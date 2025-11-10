<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Mostrar todas las categorías
    public function index()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('categorias.index', compact('categorias'));
    }

    // Guardar una nueva categoría
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|unique:categorias,nombre|max:255',
            'descripcion' => 'nullable|string',
            'fecha' => 'nullable|date',
            'estado' => 'required|string',
            'prioridad' => 'required|integer|min:1|max:5',
        ]);

        Categoria::create($validated);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
    }

    // Mostrar detalles de una categoría
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.show', compact('categoria'));
    }
}
