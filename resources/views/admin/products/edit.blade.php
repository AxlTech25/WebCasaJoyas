@extends('layouts.app')
@section('title','Editar producto')
@section('content')
<div class="container py-4">
  <h1 class="h4 mb-3">Editar producto</h1>
  @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form method="post" action="{{ route('admin.productos.update',$p) }}" enctype="multipart/form-data">@method('PUT')
    @include('admin.products._form')
  </form>
</div>
@endsection
