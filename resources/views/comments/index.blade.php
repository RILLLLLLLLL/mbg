@extends('layouts.admin')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Moderasi Komentar
</h2>

@if(session('success'))

<div class="bg-green-100 text-green-700 border border-green-300 rounded p-4 mb-5">
    {{ session('success') }}
</div>

@endif

<div class="bg-white rounded-lg shadow overflow-hidden">

<table class="min-w-full">

<thead class="bg-gray-100">

<tr>

<th class="p-3">Artikel</th>

<th class="p-3">Nama</th>

<th class="p-3">Komentar</th>

<th class="p-3">Status</th>

<th class="p-3">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($comments as $comment)

<tr class="border-t">

<td class="p-3">

{{ $comment->article->title }}

</td>

<td class="p-3">

{{ $comment->name }}

</td>

<td class="p-3">

{{ $comment->content }}

</td>

<td class="p-3">

@if($comment->status=='approved')

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

Approved

</span>

@else

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

Pending

</span>

@endif

</td>

<td class="p-3 flex gap-2">

<form
method="POST"
action="{{ route('comments.approve',$comment) }}">

@csrf
@method('PATCH')

<button
class="bg-green-600 text-white px-3 py-1 rounded">

Approve

</button>

</form>

<form action="{{ route('comments.reject', $comment) }}" method="POST">

    @csrf
    @method('PATCH')

    <button
        class="bg-red-600 text-white px-3 py-1 rounded">
        Reject
    </button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="5"
class="text-center p-6">

Belum ada komentar.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

<div class="mt-5">

{{ $comments->links() }}

</div>

@endsection