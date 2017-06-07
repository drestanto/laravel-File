<html>
<head>
	<title>File Storage</title>
	
</head>
<body>
	<h1> File Uploader </h1>
	<form action="/store" enctype="multipart/form-data" method="post">
		{{ csrf_field() }}
		<input type="file" name="image"><br>
		Nama File : <input type="text" name="nama"><br>
		<input type="submit" value="Upload">
	</form>
</body>
</html>