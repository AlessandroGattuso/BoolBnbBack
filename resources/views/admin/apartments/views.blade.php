
@extends('layouts.layout')
{{-- @push('head') 

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@endpush --}}
@section('content')
<div class="container p-4 bg-light rounded-5 mt-3">
	<h2>Visualizzazioni nel tempo</h2>
	<canvas id="myChart"></canvas>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- <script src="path/to/chartjs/dist/chart.umd.js"></script> --}}
<script type="text/javascript">
	const views = @JSON($views);
	const apartments = @JSON($apartments);
	const slug = @JSON($slug);
	// console.log(views);

</script>

 
