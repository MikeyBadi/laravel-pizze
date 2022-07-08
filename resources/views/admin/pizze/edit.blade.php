@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-3 mb-4">Modifica una pizza</h1>
        <p style="font-size: 18px">Compila i dati e fai click su <span
                style="color: blue; text-decoration: underline">invia</span> per modificare una pizza nel database.</p>
        @if ($errors->any())
            <div class="w-50 alert alert-danger">
                <ul>
                    {{-- $errors->all() reistituisce l'array ceon tutti gli errori --}}
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="w-50">
            <form action="{{ route('admin.pizza.update', $pizza) }}" method="POST">
                {{-- @csrf deve essere inserito in tutti i form altrimenti il form non è valido --}}
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label sc-label">Nome pizza:</label>
                    {{-- il name dell'input deve corrispondere al nome della colonna della tabella di riferimento --}}
                    <input type="text" id="nome" name="nome" value="{{ old('nome', $pizza->nome) }}"
                        class="form-control @error('nome') is-invalid @enderror" placeholder="Nome pizza">
                    @error('nome')
                        <p class="error-msg text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="prezzo" class="form-label">Prezzo:</label>
                    <input type="number" min="0" class="form-control @error('prezzo') is-invalid @enderror" name="prezzo" id="prezzo" cols="30"
                        rows="10" placeholder="prezzo" value="{{ old('prezzo', $pizza->prezzo) }}">

                    @error('prezzo')
                        <p class="error-msg text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ingredienti" class="form-label">Ingredienti:</label>
                    <input type="text" id="ingredienti" name="ingredienti" value="{{ old('ingredienti', $pizza->ingredienti) }}"
                        class="form-control @error('ingredienti') is-invalid @enderror " placeholder="Ingredienti pizza">
                    @error('ingredienti')
                        <p class="error-msg text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div>
                    <h4>Vegetariano:</h4>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="vegetariano" id="vegetariano" value="0"
                        @if ($pizza->vegetariano === 0)
                            checked
                        @endif>
                        <label class="form-check-label" for="flexRadioDefault1">
                            No
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="vegetariano" id="vegetariano" value="1"
                        @if ($pizza->vegetariano === 1)
                            checked
                        @endif>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Si
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Invia</button>
                <a href="{{ route('admin.pizza.index')}}" class="btn btn-warning"
                onclick="return confirm('Are you sure?')">Indietro</a>

            </form>
        </div>
    </div>
@endsection
