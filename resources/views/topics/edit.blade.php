@extends('layouts.app')

@section('content')
<h1>Editar tópico</h1>
<form action="/topics/{{ $topic->id }}" method="post">
    @method('put')
    @include('topics.form')
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection