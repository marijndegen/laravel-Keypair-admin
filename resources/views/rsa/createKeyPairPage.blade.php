@extends('layout.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <h1>Generating a 6144 bit RSA key</h1>

        <div class="links">
            <form method="post" action="{{route('rsa/create_key_pair_action')}}">
                @csrf
                <div class="form-group">
                    @error('description')
                    <div class="alert alert-danger">{{ trans($message) }}</div>
                    @enderror
                    <input type="text" class="form-control @error('description') is-invalid @enderror"" name=" description" placeholder="Description">
                </div>
                <button type="submit" class="btn btn-primary">Generate key</button>
            </form>
            @if(Session::has('message'))
            <div id="messageFrame" class="alert alert-success">
                <h3>Encrypted message:</h3>
                <input type="text" class="form-control" value="{{Session::pull('message')}}" id="messageInput">
                <button class="btn btn-success" onclick="copyText()">Copy message</button>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    let copied = false;

    function copyText() {
        const copyText = document.getElementById("messageInput");
        copyText.select();
        document.execCommand("copy");

        if (!copied) {
            const textNode = document.createTextNode("Message copied!");
            const paragraph = document.createElement("p");
            paragraph.appendChild(textNode);

            const messageFrame = document.getElementById("messageFrame");
            messageFrame.appendChild(paragraph);

            copied = true;
        }

    }
</script>
@endsection