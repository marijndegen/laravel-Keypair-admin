@extends('layout.app')

@section('content')
<h2>Select a key</h2>
<table class="table" style="max-width: 80%">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Description</th>
            <th scope="col">Decrypt</th>
            <th scope="col">Public key</th>
            <th scope="col">Private key</th>
        </tr>
    </thead>
    <tbody>
        @foreach($keyPairs as $keyPair)
        <tr class="asdf">
            <td class="asdf">{{$keyPair->id}}</td>
            <td class="asdf">{{$keyPair->description}}</td>
            <td class="asdf"><a class="btn btn-primary" href={{route('enter_encrypted', ['key_id' => $keyPair->id])}}> {{$keyPair->description}}</a></td>
            <td class="asdf">{{substr($keyPair->public_key, 0, 200)}}...</td>
            <td class="asdf">{{substr($keyPair->private_key, 0, 200)}}...</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection