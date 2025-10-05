@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body d-flex align-items-center justify-content-between">
        <div>
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Productos</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $products }}</div>
        </div>
        <i class="fas fa-ring fa-2x text-gray-300"></i>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body d-flex align-items-center justify-content-between">
        <div>
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Categorías</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $categories }}</div>
        </div>
        <i class="fas fa-tags fa-2x text-gray-300"></i>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body d-flex align-items-center justify-content-between">
        <div>
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Contactos</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $contacts }}</div>
        </div>
        <i class="fas fa-envelope fa-2x text-gray-300"></i>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-8 col-lg-7 mb-4">
    <div class="card shadow">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Ventas (últimos meses)</h6>
      </div>
      <div class="card-body"><canvas id="myAreaChart" height="120"></canvas></div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-5 mb-4">
    <div class="card shadow">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Mix por categoría</h6>
      </div>
      <div class="card-body"><canvas id="myPieChart" height="220"></canvas></div>
    </div>
  </div>
</div>
@endsection
