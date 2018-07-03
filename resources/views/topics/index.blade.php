@extends('layouts.app')

@section('content')
    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <h1>Tópicos</h1>
    <p>
        <a href="/topics/create" class="btn btn-primary">Perguntar</a>
    </p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($topics as $topic)
            <tr>
                <td><a href="/topics/{{ $topic->id }}">{{ $topic->title }}</a></td>
                <td>
                @switch($topic->state)

                    @case(true)
                    Aberto
                    @break
                    @case(false)
                    Fechado
                    @break
                    @default
                    Desconhecido
                @endswitch
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection