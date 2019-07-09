@extends('layout.app')

@section('content')
<style>
    .listedbtn {
        margin: 5px;
    }
</style>
<h2>Select a key</h2>
<div style="max-width:100px;">
    <table class="table" style="max-width: 50%">
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
            <tr class="asdf">
                <td class="asdf">{{$keyPair->id}}</td>
                <td class="asdf">{{$keyPair->description}}</td>
                <td class="asdf">
                    <a class="btn btn-success listedbtn" href={{route('enter_encrypted', ['key_id' => $keyPair->id])}}> Decrypt</a>
                    <a class="btn btn-danger listedbtn" href={{route('deleteKey', ['key_id' => $keyPair->id])}} onclick="return confirm('Are you sure?')"> Delete</a>
                    <a class="btn btn-warning listedbtn" href={{route('downloadPrivateKey', ['key_id' => $keyPair->id])}}> Download Private Key</a>
                    <a class="btn btn-info listedbtn" href={{route('downloadPublicKey', ['key_id' => $keyPair->id])}}> Download Public Key</a>
                </td>
                <td class="asdf">{{substr($keyPair->public_key, 0, 200)}}...</td>
                <td class="asdf">{{substr($keyPair->private_key, 0, 200)}}...</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection