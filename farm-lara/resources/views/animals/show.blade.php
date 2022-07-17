@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Farm animal</div>

                <div class="card-body">
                    <ul class="list-group">

                        <li class="list-group-item">

                            <div class="animals_list">{{$farm->farm}}: {{$farm->weight}} kg</div>

                </div>
                <div class="controls">
                    <a class="btn btn-outline-primary m-2" href="{{route('animals-edit', $farm)}}">EDIT</a>

                    <form class="delete" action="{{route('animals-delete', $farm)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger m-2" type="submit">Remove</button>

                    </form>
                </div>
                </li>
                </ul>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
