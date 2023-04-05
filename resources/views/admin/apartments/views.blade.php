
@extends('layouts.layout')
{{-- @push('head') 

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@endpush --}}
@section('content')
<div class="container">
	<canvas id="myChart"></canvas>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- <script src="path/to/chartjs/dist/chart.umd.js"></script> --}}
<script type="text/javascript">
	const views = @JSON($views);
	// console.log(views);

</script>

 
