<html>
<head><title>Daftar File</title></head>
<body>
<?php
require_once(”database.php”);
connect_db();

$query=mysql_query(”SELECT * FROM image);
$row=mysql_fetch_row($query);
if(!$row)
echo ”tabel upload kosong”;
else
{
echo ”<h2>Daftar File</h2>”;
echo ”<table border=1>”;
echo ”<tr>”;
echo ”<td>Nama File</td>”;
echo ”<td>Type</td>”;
echo ”<td>Size</td>”;
echo ”<td>Download</td>”;
echo ”</tr>”;

do{ 
list($fileid,$filename,$type,$size,$path)=$row;
echo ”<tr>”;
echo ”<td>$filename</td>”;
echo ”<td>$type</td>”;
echo ”<td>$size</td>”;
echo ”<td><a href=download.php?fileid=$fileid>Download</a></td>”;
echo ”</tr>”;
}while($row=mysql_fetch_row($query));
}

?>
</body>
</html>
