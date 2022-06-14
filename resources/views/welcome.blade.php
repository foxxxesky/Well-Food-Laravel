<h1>Test Data</h1>

--{{ count($datas) }}--
<br>
@foreach ($datas as $index => $data)
<li>{{ $data['recipe']['label'] }}</li>
@endforeach