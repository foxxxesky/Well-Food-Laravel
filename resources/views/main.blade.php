@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        @foreach ($datas as $index => $data)
        <div class="col p-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ $data['recipe']['image'] }}" class="card-img-top" alt="img" height="250px">
                <div class="card-body">
                    <h5 class="card-title">{{ $data['recipe']['label'] }}</h5>
                    <div class="pt-3 pb-4">
                        <p class="card-text">Calories: <span
                                class="text-success">{{ number_format((float)$data['recipe']['calories'], 2, '.', '') }}</span>
                        </p>
                        <p class="card-text">Ingredients: <span>{{ count($data['recipe']['ingredients']) }}</span></p>
                    </div>
                    <form action="" method="get">
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn btn-outline-success w-100">Detail</a>
                            </div>
                            <div class="col">
                                <a href="{{ $data['recipe']['url'] }}" target="blank"
                                    class="btn btn-outline-warning w-100">Recipes</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection