@extends('Layout.app')

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
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description">
                </div>
                <button type="submit" class="btn btn-primary">Generate key</button>
            </form>
            @include('Elements.messageBox', ['title' => 'Encrypted message:'])
        </div>
    </div>
</div>
@endsection