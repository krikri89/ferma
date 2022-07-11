@extends('main')

@section('content')
<a href="{{route('animals-index')}}">Who's on the farm</a>


<form action="{{route('animals-store')}}" method="post">
    <select type="text" name="create_animal_input">

        <option value="Avis">Avis</option>
        <option value="Antis">Antis</option>
        <option value="Antilope">Antilope</option>
    </select>
    kg <input type="number" name="create_weight">
    @csrf
    <button type="submit">Create</button>
</form>

@endsection

@section('title')
KukuFarm
@endsection
