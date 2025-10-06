<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>CRUD Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 m-0">Listado de productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Nuevo</a>
  </div>

  @if($products->count())
    <table class="table table-bordered align-middle">
      <thead class="table-light">
        <tr>
          <th>ID</th>
          <th>Nombre</th> <!-- ✅ NUEVA COLUMNA -->
          <th>Descripción</th>
          <th>Precio</th>
          <th>Stock</th>
          <th class="text-end">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $p)
        <tr>
          <td>{{ $p->id }}</td>
          <td>{{ $p->name }}</td> <!-- ✅ NUEVA COLUMNA -->
          <td>{{ $p->description }}</td>
          <td>${{ number_format($p->price,2) }}</td>
          <td>{{ $p->stock }}</td>
          <td class="text-end">
            <a class="btn btn-sm btn-info text-white" href="{{ route('products.show',$p) }}">Ver</a>
            <a class="btn btn-sm btn-warning" href="{{ route('products.edit',$p) }}">Editar</a>
            <form action="{{ route('products.destroy',$p) }}" method="POST" class="d-inline delete-form">
  @csrf
  @method('DELETE')
  <button class="btn btn-sm btn-danger">Eliminar</button>
</form>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div class="alert alert-info">No hay productos registrados.</div>
  @endif

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const deleteForms = document.querySelectorAll('form.delete-form');

  deleteForms.forEach(form => {
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción eliminará el producto definitivamente.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
});
</script>


</body>
</html>
