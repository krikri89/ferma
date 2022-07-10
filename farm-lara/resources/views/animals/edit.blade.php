@extends('main')
@section('content')
<ul>
    <form action="{{route('animals-update', $farm)}}" method="post">

        <input type="animal" name="create_animal_input" value="{{$farm->farm}}:{{$farm->weight}}" />
        @csrf
        @method('put')
        <button type="submit">Update</button>
    </form>
</ul>
@endsection
