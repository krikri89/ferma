@extends('main')
@section('content')
<ul>
    <form action="{{route('animals-update', $farm)}}" method="post">

        <input type="text" name="create_animal_input" value="{{$farm->farm}}" />
        <input type="number" name="create_weight" value="{{$farm->weight}}" />
        @csrf
        @method('put')
        <button type="submit">Update</button>
    </form>
</ul>
@endsection
