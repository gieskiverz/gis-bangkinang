<html>
<head>

<title>Upload gambar</title>
</head>

<body>
<!-- <p>
<a href="index.php">depan</a> | <a href="galeri.php">galeri</a>
</p> -->
<form action="upload.php" enctype="multipart/form-data" method="post">
<table border="0">
<!-- <tr>
	<td>Judul</td>
    <td><input type="text" name="judul" />
    </td>
</tr> -->
<tr>
	<td>Gambar</td>
    <td><input type="file" name="gambar" size="40" /></td>
</tr>
<tr>
	<td><input type="submit" name="submit" value="Unggah" /></td>
    <td></td>
</tr>
<!-- <input type="hidden" name="MAX_FILE_SIZE" value="2000000" /> dalam byte {2000000b = 2Mb} -->
</form>
</body>
</html>
