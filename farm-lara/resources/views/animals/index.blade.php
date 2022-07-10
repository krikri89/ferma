@extends('main')

@section('content')
<ul>
    @forelse($farms as $farm)
    <li>
        <div>{{$farm->farm}}:{{$farm->weight}} KG</div>
        <a href="{{route('animals-edit', $farm)}}">|EDIT|</a>
        <form class="delete" action="{{route('animals-delete', $farm)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Remove from the list</button>
        </form>
    </li>
    @empty
    <li>Sheep gone wild</li>
    @endforelse
</ul>
<a href="{{route('animals-create')}}">Add more animals to the farm</a>
@endsection
