@extends('layouts.app')

@section('content')
    <h1>Criar Tópico</h1>
    <form action="/topics" method="post">
        @include('topics.form')
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
@endsection