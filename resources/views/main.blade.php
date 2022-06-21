@extends('layouts.main')

@section('content')

<div class="container pb-5">
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
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fw-semibold" id="exampleModalLabel">{{ $data['recipe']['label'] }}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- full recipe -->
                        <p>See Full Recipe on <span><a
                                    href="{{ $data['recipe']['url'] }}">{{ $data['recipe']['source'] }}</a></span></p>
                        <p class='fw-semibold'>Calories: <span
                                class='text-success'>{{ number_format((float)$data['recipe']['calories'], 2, '.', '') }}</span>
                        </p>
                        <p class='fw-semibold'>Total Weight: <span
                                class='text-success'>{{ number_format((float)$data['recipe']['totalWeight'], 2, '.', '') }}</span>
                        </p>

                        <!-- Ingredients -->
                        <table class="table">
                            <thead>
                                <tr class="table-info fs-4">
                                    <th scope="col">Ingredients</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['recipe']['ingredientLines'] as $ingredient)
                                <tr>
                                    <td>{{ $ingredient }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- HealthLabels -->
                        <table class="table">
                            <thead>
                                <tr class="table-info fs-4">
                                    <th scope="col">Health Labels</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['recipe']['healthLabels'] as $healthlabels)
                                <tr>
                                    <td>{{ $healthlabels }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Nutritions -->
                        <table class="table">
                            <thead>
                                <tr class="table-info fs-4">
                                    <th scope="col">Nutritions</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Energy -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['ENERC_KCAL']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['ENERC_KCAL']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['ENERC_KCAL']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Fat -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['FAT']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['FAT']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['FAT']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Protein -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['PROCNT']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['PROCNT']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['PROCNT']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Cholestrol -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['CHOLE']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['CHOLE']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['CHOLE']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Sodium -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['NA']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['NA']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['NA']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Calsium -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['CA']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['CA']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['CA']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Magnesium -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['MG']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['MG']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['MG']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Zinc -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['ZN']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['ZN']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['ZN']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Fit A -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['VITA_RAE']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['VITA_RAE']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['VITA_RAE']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Fit C -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['VITC']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['VITC']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['VITC']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Fit B1 -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['THIA']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['THIA']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['THIA']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Fit B2 -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['RIBF']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['RIBF']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['RIBF']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Fit B3 -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['NIA']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['NIA']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['NIA']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Fit B6 -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['VITB6A']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['VITB6A']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['VITB6A']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Fit B12 -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['VITB12']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['VITB12']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['VITB12']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Fit D -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['VITD']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['VITD']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['VITD']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Fit E -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['TOCPHA']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['TOCPHA']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['TOCPHA']['unit'] }}
                                    </td>
                                </tr>

                                <!-- Fit K -->
                                <tr>
                                    <td>
                                        {{ $data['recipe']['totalNutrients']['VITK1']['label'] }}</td>
                                    <td class='text-primary'>
                                        {{ number_format((float)$data['recipe']['totalNutrients']['VITK1']['quantity'], 2, '.', '').' '.$data['recipe']['totalNutrients']['VITK1']['unit'] }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection