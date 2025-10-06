<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Mostrar listado de productos.
     */
   public function index()
{
    $products = \App\Models\Product::orderBy('id', 'asc')->paginate(10);

    // Alternativa equivalente: ->latest('id')
    return view('products.index', compact('products'));
}


    /**
     * Mostrar formulario para crear nuevo producto.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Guardar un nuevo producto en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0'],
            'stock'       => ['required', 'integer', 'min:0'],
        ]);

        // Crear el producto
        Product::create($data);

        // Redirigir con mensaje
        return redirect()->route('products.index')
                         ->with('success', 'Producto creado correctamente.');
    }

    /**
     * Mostrar un producto específico.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Mostrar formulario de edición de un producto.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Actualizar un producto existente.
     */
    public function update(Request $request, Product $product)
    {
        // Validar datos
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'min:0'],
            'stock'       => ['required', 'integer', 'min:0'],
        ]);

        // Actualizar producto
        $product->update($data);

        // Redirigir con mensaje
        return redirect()->route('products.index')
                         ->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Eliminar un producto.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Producto eliminado correctamente.');
    }
}
