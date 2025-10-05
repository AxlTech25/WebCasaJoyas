@extends('layouts.admin')
@section('title','Nuevo producto')
@section('content')
<div class="container py-4">
  <h1 class="h4 mb-3">Nuevo producto</h1>
  @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form method="post" action="{{ route('admin.productos.store') }}" enctype="multipart/form-data">
    @include('admin.products._form')
  </form>
</div>
@endsection
