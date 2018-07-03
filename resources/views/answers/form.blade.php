@csrf
<div class="form-group">
    <h1>Responder a {{ $topic->title }}</h1>
    <input hidden name="topic_id" value="{{ $topic->id }}">
</div>

<div class="form-group">
    <label for="nationality">Resposta</label>
    <textarea type="text" name="body" class="form-control" placeholder="Texto"></textarea>
</div>
