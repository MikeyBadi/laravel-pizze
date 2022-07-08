@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
        <p>Welcome to Index List</p>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pizzas as $pizza)
                    <tr>
                        <th scope="row">{{$pizza->id}}</th>
                        <td>{{$pizza->nome}}</td>
                        <td>
                            {{-- <a class="btn btn-success" href="{{ route('admin.posts.show',$post)}}">Show</a> --}}
                            <a class="btn btn-success" href="{{ route('admin.pizza.show',$pizza)}}">Show</a>
                            <a class="btn btn-primary" href="{{ route('admin.pizza.edit',$pizza)}}">Edit</a>
                        <form class="d-inline"
                            method="POST"
                            onsubmit="return confirm('Confirm the action? Oance deleted it can\'t be restored')"
                            action="{{ route('admin.pizza.destroy', $pizza)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection
