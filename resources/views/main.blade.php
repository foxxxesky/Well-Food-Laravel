@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        @php
        $i = 0
        @endphp
        @foreach ($datas as $index => $data)
        @php
        $count = ++$i
        @endphp
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
                        <input type="hidden" value="{{ $data['recipe']['uri'] }}" name='uri'>
                        <div class="row">
                            <div class="col">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-success w-100" data-bs-toggle="modal"
                                    data-bs-target="{{ '#detail'.$count }}">
                                    Detail
                                </button>
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

        <!-- Modal -->
        <div class="modal fade" id="{{ 'detail'.$count }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $data['recipe']['label'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection