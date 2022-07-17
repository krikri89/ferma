@extends('layouts.app')


@section('content')
<ul>
    <li>
        <div class="animals_list">{{$farm->farm}}: {{$farm->weight}} kg</div>

        </div>
        <div class="controls">
            <a href="{{route('animals-edit', $farm)}}">EDIT</a>
            <form class="delete" action="{{route('animals-delete', $farm)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Destroy</button>
            </form>
        </div>
    </li>
</ul>

@endsection
