@extends('main')

@section('content')

<form action="{{route('animals-store')}}" method="POST">
    <select name="create_animal_input">

        <option value="avis">Avis</option>
        <option value="antis">Antis</option>
        <option value="antilope">Antilope</option>
    </select>
    @csrf
    <button type="submit">Create</button>
</form>
<ul>
    @foreach($farms as $farm)
    <li>{{$farm->id}} :{{$farm->farm}} {{$farm->weight}} KG</li>
    @endforeach
</ul>
@endsection

@section('title')
KukuFarm
@endsection
