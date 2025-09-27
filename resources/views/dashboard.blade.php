@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <h1>Bienvenido, {{ Auth::user()->name }}</h1>
    <p>Este es tu panel de usuario.</p>
</div>
@endsection
