@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>List</h3>
                </div>

                <div class="card-body">
                    <ul class="list-group">

                        @forelse($farms as $farm)
                        <li class="list-group-item">

                            <div class="animals_list">{{$farm->farm}}: {{$farm->weight}} kg</div>
                            <div class="list_buttons">
                                <a class="btn btn-outline-secondary m-2" href="{{route('animals-show', $farm->id)}}">SHOW</a>

                                <a class="btn btn-outline-primary m-2" href="{{route('animals-edit', $farm->id)}}">EDIT</a>

                                <form class="delete" action="{{route('animals-delete', $farm->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger m-2" type="submit">Remove</button>

                                </form>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">Sheep gone wild</li>

                        @endforelse
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
