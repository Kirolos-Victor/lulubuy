<html>
<head>

</head>
<body>
<form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>Please upload the file from here.</h1>
    <input type="file" name="my_file">
    <button type="submit">Upload</button>
</form>

</body>
</html>
