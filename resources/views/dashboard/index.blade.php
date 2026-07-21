@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">

    Dashboard

</h1>

<div class="bg-white rounded shadow p-6">

    Selamat datang,

    <strong>{{ Auth::user()->name }}</strong>

</div>

@endsection