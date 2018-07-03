@csrf
<div class="form-group">
    <label for="name">Título</label>
    <input type="text" name="title" class="form-control" placeholder="Título" value="{{ $topic->title }}">
</div>

<div class="form-group">
    <label for="nationality">Descrição</label>
    <textarea type="text" name="body" class="form-control" placeholder="Texto">{{ $topic->body }}</textarea>
</div>
