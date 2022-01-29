@extends('layout.app')

@section('content')
<style>
    .listedbtn {
        margin: 5px;
    }
</style>
<h2>Select a key</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Description</th>
            <th scope="col">Options</th>
            <th scope="col">Public key</th>
            <th scope="col">Private key</th>
        </tr>
    </thead>
    <tbody>
        @foreach($keyPairs as $keyPair)
        <tr>
            <td>{{$keyPair->id}}</td>
            <td>{{$keyPair->description}}</td>
            <td>
                <a class="btn btn-success listedbtn" href={{route('key_pair/decrypt_page', ['key_id' => $keyPair->id])}}> Decrypt</a>
                <a class="btn btn-danger listedbtn" href={{route('key_pair/delete', ['key_id' => $keyPair->id])}} onclick="return confirm('Are you sure?')"> Delete</a>
                <a class="btn btn-warning listedbtn" href={{route('downloadPrivateKey', ['key_id' => $keyPair->id])}}> Download Private Key</a>
                <a class="btn btn-info listedbtn" href={{route('downloadPublicKey', ['key_id' => $keyPair->id])}}> Download Public Key</a>
            </td>
            <td>{{substr($keyPair->public_key, 0, 200)}}...</td>
            <td>{{substr($keyPair->private_key, 0, 200)}}...</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection