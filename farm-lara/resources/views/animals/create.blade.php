@extends('main')

@section('content')

<form action="{{route('animals-store')}}" method="post">
    <select type="text" name="create_animal_input">

        <option value="avis">Avis</option>
        <option value="antis">Antis</option>
        <option value="antilope">Antilope</option>
    </select>
    KG <input type="number" name="create_weight">
    @csrf
    <button type="submit">Create</button>
</form>

@endsection

@section('title')
KukuFarm
@endsection
