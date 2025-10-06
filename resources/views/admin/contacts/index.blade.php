@extends('layouts.admin')
@section('title','Contactos')
@section('content')
<div class="container py-4">
  <h1 class="h4 mb-3">Contactos</h1>
  <div class="table-responsive">
    <table class="table table-sm align-middle">
      <thead><tr><th>#</th><th>Nombre</th><th>Email</th><th>Mensaje</th><th>Fecha</th></tr></thead>
      <tbody>
        @foreach($items as $c)
          <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->nombre }} {{ $c->apellido }}</td>
            <td><a href="mailto:{{ $c->email }}">{{ $c->email }}</a></td>
            <td style="max-width:480px;white-space:pre-wrap">{{ Str::limit($c->mensaje, 180) }}</td>
            <td>{{ $c->created_at->format('Y-m-d H:i') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-3">{{ $items->links() }}</div>
</div>
@endsection
