<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8"><title>Editar producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h1 class="h3 mb-3">Editar producto #{{ $product->id }}</h1>

  <form action="{{ route('products.update',$product) }}" method="POST" class="card card-body">
    @csrf
    @method('PUT')

<div class="mb-3">
  <label class="form-label">Nombre</label>
  <input type="text" name="name" class="form-control"
         value="{{ old('name', $product->name ?? '') }}" required>
</div>


    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <input type="text" name="description" class="form-control"
             value="{{ old('description',$product->description) }}" required>
      @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Precio</label>
      <input type="number" step="0.01" name="price" class="form-control"
             value="{{ old('price',$product->price) }}" required>
      @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Stock</label>
      <input type="number" name="stock" class="form-control"
             value="{{ old('stock',$product->stock) }}" required>
      @error('stock') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button class="btn btn-primary">Actualizar</button>
  </form>
</body>
</html>
