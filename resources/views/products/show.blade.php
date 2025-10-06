<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ver producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">Detalles del producto</h1>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Descripción</h5>
      <p class="card-text">{{ $product->description }}</p>

      <div class="row">
        <div class="col-md-4">
          <h6>Precio:</h6>
          <p>${{ number_format($product->price, 2) }}</p>
        </div>

        <div class="col-md-4">
          <h6>Stock:</h6>
          <p>{{ $product->stock }}</p>
        </div>

        
      </div>
    </div>
  </div>

  <div class="mt-4">
    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline"
          onsubmit="return confirm('¿Eliminar este producto?')">
      @csrf
