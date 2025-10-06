<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8"><title>Nuevo producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <h1 class="h3 mb-3">Nuevo producto</h1>

  <form action="{{ route('products.store') }}" method="POST" class="card card-body">
    @csrf

    <div class="mb-3">
  <label class="form-label">Nombre</label>
  <input type="text" name="name" class="form-control"
         value="{{ old('name', $product->name ?? '') }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <input type="text" name="description" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Precio</label>
      <input type="number" step="0.01" name="price" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Stock</label>
      <input type="number" name="stock" class="form-control" required>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button class="btn btn-primary">Guardar</button>
  </form>
</body>
</html>
