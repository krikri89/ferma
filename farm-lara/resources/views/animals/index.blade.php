@extends('layouts.app')


@section('content')
<ul>
    @forelse($farms as $farm)
    <li>
        <div class="animals_list">{{$farm->farm}}: {{$farm->weight}} kg</div>
        <div class="list_buttons">
            <a href="{{route('animals-show', $farm->id)}}">SHOW</a>
            <a href="{{route('animals-edit', $farm->id)}}">EDIT</a>
            <form class="delete" action="{{route('animals-delete', $farm->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Remove from the list</button>
            </form>
        </div>
    </li>
    @empty
    <li class="empty">Sheep gone wild</li>
    @endforelse
</ul>
@endsection
