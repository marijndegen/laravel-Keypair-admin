@if(Session::has('message'))
<div id="messageFrame" class="alert alert-success">
    <h3>{{$title}}</h3>
    <textarea class="form-control" id="messageInput">{{Session::pull('message')}}</textarea>
    <br>
    <button class="btn btn-success" onclick="copyText()">Copy message</button>
</div>
@endif