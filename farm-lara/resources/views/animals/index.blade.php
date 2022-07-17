@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">KukuFarm</div>

                <div class="card-body">
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
