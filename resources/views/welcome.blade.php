<h1>Test Data</h1>

--{{ count($datas) }}--
<br>
@foreach ($datas as $index => $data)
<li>{{ $data['recipe']['label'] }}</li>
<a href="{{ $data['recipe']['image'] }}" target="blank">link</a>
@endforeach