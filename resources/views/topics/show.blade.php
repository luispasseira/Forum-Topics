@extends('layouts.app')

@section('content')
    <p>
    <form action="/topics/{{ $topic->id }}" method="post">
        <a href="/topics/" class="btn btn-info">Voltar</a>
        @if($user_id == $topic->user->id)
            @if($topic->state == true)
                <a href="/topics/{{ $topic->id }}/edit" class="btn btn-success">Editar</a>
                @method("DELETE")
                @csrf
                <input type="submit" class="btn btn-danger" value="Fechar tópico">
            @endif
        @endif
    </form>
    </p>
    <h1>{{ $topic->title }}</h1><br>
    <div class="form-group">
        <label for="nationality">Descrição</label>
        <textarea disabled type="text" name="body" class="form-control"
                  placeholder="Texto">{{ $topic->body }}</textarea>
    </div>

    <div class="form-group">
        <label>Repostas</label><br>
        @if($topic->state == true)
            <a href="/answers/create/{{ $topic->id }}" class="btn btn-secondary">Responder</a><br>
        @endif
        @if(sizeof($topic->answers) != 0)
            @foreach ($topic->answers as $answer)
                <br></brZ><textarea class="form-control" disabled>{{ $answer->body }}</textarea><br>
            @endforeach
        @else
            <br><p>Sem respostas</p> <br>
        @endif
    </div>
@endsection