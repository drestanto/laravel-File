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
	<table>
		<tr>
			<th> ID </th>
			{{-- <th> Name </th> --}}
			<th> Image </th>
		</tr>
		@foreach ($files as $file)
		<tr>
			<th> {{ $file->id }} </th>
			{{-- <th> {{ $file->name }} </th> --}}
			<th> <img src='{{ $file->path }}'> </th>
		</tr>
		@endforeach
	</table>
</body>
</html>