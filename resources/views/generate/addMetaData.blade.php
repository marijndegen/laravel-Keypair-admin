@extends('layout.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Generating a 6144 bit RSA key
        </div>



        <div class="links">
            <form method="post" action="{{route('new_key')}}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="description" placeholder="Description">
                </div>
                <button type="submit" class="btn btn-primary">Generate key</button>
            </form>
            @if(Session::has('message'))
            <div class="alert alert-success">
                <input type="text" class="form-control" value="{{Session::pull('message')}}" id="myInput">
                <button onclick="myFunction()">Copy text</button>
                <script>
                    function myFunction() {
                        /* Get the text field */
                        var copyText = document.getElementById("myInput");

                        /* Select the text field */
                        copyText.select();

                        /* Copy the text inside the text field */
                        document.execCommand("copy");
                    }
                </script>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection