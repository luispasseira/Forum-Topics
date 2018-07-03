@extends('layouts.app')

@section('content')
    <form action="/answers" method="post">
        @include('answers.form')
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
@endsection