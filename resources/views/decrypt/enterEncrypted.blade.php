@extends('layout.app')

@section('content')
<h2>Decrypt a message</h2>
<form method="post" action="/decrypt_message/encryptedSingleFile/{{$keyPair->id}}">
    @csrf
    <div class="form-group">
        <label for="exampleInputPassword1"></label>
        <input class="form-control" type="text" placeholder="Decrypt a single unformatted message from the key: {{$keyPair->description}}" name="message">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@if(Session::has('plainText'))
<div class="alert alert-success">
    <pre>{{Session::pull('plainText')}}</pre>
</div>
@endif
<hr>
<form method="post" action="/decrypt_message/encryptedJsonFile/{{$keyPair->id}}">
    @csrf
    <div class="form-group">
        <textarea class="form-control" rows="4" placeholder="Decrypt multiple messages from a json file: \n" name="jsonMessage"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    var textAreas = document.getElementsByTagName('textarea');

    Array.prototype.forEach.call(textAreas, function(elem) {
        elem.placeholder = elem.placeholder.replace(/\\n/g, '\n');
    });
</script>
@endsection