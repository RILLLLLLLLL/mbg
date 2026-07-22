@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')

<div class="bg-white rounded-lg shadow p-6">

    <h2 class="text-2xl font-bold mb-6">
        Edit Artikel
    </h2>

    <form
        action="{{ route('articles.update',$article) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('articles.form')

        <div class="mt-6 flex gap-2">

            <button
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded">

                Update

            </button>

            <a
                href="{{ route('articles.index') }}"
                class="bg-gray-500 text-white px-5 py-2 rounded">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection