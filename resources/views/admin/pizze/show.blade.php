@extends('layouts.app')
@section('content')
<div class="container">
    {{-- @dd($post) --}}
    <h1>Nome: {{$pizza->nome}}</h1>
    <p>Prezzo: {{$pizza->prezzo}} &euro;</p>
    <p>Ingredienti: {{$pizza->ingredienti}}</p>
    @if ($pizza->vegetariano)
       <p>Vegetariano: Si</p>
       @else
       <p>Vegetariano: No</p>
    @endif
    {{-- <p>Vegetariano: {{$pizza->vegetariano}}</p>
    @if ($pizza->vegetariano)
        <p>Si</p>
        @else
        <p>No</p>
    @endif --}}
    <a class="btn btn-success" href="{{route('admin.pizza.index', $pizza)}}">Torna indietro</a>
    {{-- <a class="btn btn-primary" href="{{ route('admin.pizza.edit',$post)}}">Edit</a> --}}
    {{-- <form class="d-inline"
        method="POST"
        onsubmit="return confirm('Confirm the action? Oance deleted it can\'t be restored')"
        action="{{route('admin.posts.destroy', $post)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">DELETE</button>
    </form> --}}
</div>
@endsection
