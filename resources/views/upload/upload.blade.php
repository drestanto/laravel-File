<html>
<head>
	<title>File Storage</title>
</head>
<body>
	<h1> File Uploader </h1>
	<form action="/store" enctype="multipart/form-data" method="post">
		{{ csrf_field() }}
		<input type="file" name="file"><br>
		Nama File : <input type="text" name="nama">
		@if ($errors->has('nama'))
		    <span class="help-block">
		        <strong>This field is required</strong>
		    </span>
		@endif
		<br>
		<input type="submit" value="Upload">
	</form>
</body>
</html>