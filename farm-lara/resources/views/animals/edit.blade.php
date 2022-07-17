@extends('layouts.app')

@section('content')
<a href="{{route('animals-index')}}">Who's on the farm</a>


<ul>
    <form action="{{route('animals-update', $farm)}}" method="post">

        <input type="text" name="create_animal_input" value="{{$farm->farm}}" readonly />
        <input type="number" name="create_weight" value="{{$farm->weight}}" />
        @csrf
        @method('put')
        <button type="submit">Update</button>
    </form>
</ul>
@endsection
