<html>
<head>
	<title>All Images</title>
</head>
<style>
	table, th, td {
	    border: 1px solid black;
	}
</style>
<body>
	<h3> All Your Saved Images </h3>
	@if ($files->isEmpty())
		No result for {{ $keyword }}
	@else
		<table>
			@php $i = 1; @endphp
			<tr>
				<th> No </th>
				<th> Name </th>
				<th> Image </th>
			</tr>
				@foreach ($files as $file)
					<tr>
						<th> {{ $i }} </th>
						<th> {{ $file->name }} </th>
						<th> <img src='{{ $file->path }}'> </th>
					</tr>
					@php $i = $i+1; @endphp
				@endforeach
		</table>
	@endif
</body>
</html>