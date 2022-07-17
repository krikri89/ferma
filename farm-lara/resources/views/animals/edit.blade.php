@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update the weight</div>

                <div class="card-body">
                    <ul class="list-group">

                        <form action="{{route('animals-update', $farm)}}" method="post">
                            <input type="text" name="create_animal_input" value="{{$farm->farm}}" readonly />
                            <input type="number" name="create_weight" value="{{$farm->weight}}" /> kg
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-success m-2" type=" submit">Update</button>

                        </form>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
