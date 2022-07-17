@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new animal</div>

                <div class="card-body">
                    <form action="{{route('animals-store')}}" method="post">
                        <select type="text" name="create_animal_input">

                            <option value="Avis">Avis</option>
                            <option value="Antis">Antis</option>
                            <option value="Antilope">Antilope</option>
                        </select>
                        kg <input type="number" name="create_weight">
                        @csrf
                        <button class="btn btn-outline-success m-2" type="submit">Create</button>

                    </form>

                    @endsection

                    @section('title')
                    KukuFarm
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
