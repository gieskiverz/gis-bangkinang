<html>
<head>
<title>Ajax</title>
<body>
<?php
function stringForJavascript($in_string) {
   $str = ereg_replace("[\r\n]", " \\n\\\n", $in_string);
   $str = ereg_replace('"', '\\"', $str);
   return $str;
}
switch($_GET['id']) {
	case 'newsCat1':
		$content = include"markers.php";
		break;
	case 'newsCat2':
		$content = 'This is content for page Sports.';
		break;
	case 'newsCat3':
		$content = 'Menampilkan SD/SLTP/SLTA.';
		break;
	case 'newsCat4':
		$content =include"../searchView.php";
		break;
	case 'newsCat5':
		$content = 'This is content for page Lifestyle.';
		break;
	case 'newsCat6':
		$content = 'This is content for page Lifestyle.';
		break;
	case 'newsCat7':
		$content = 'This is content for page Lifestyle.';
		break;
	case 'newsCat8':
		$content = 'This is content for page Lifestyle.';
		break;
	case 'newsCat9':
		$content = 'This is content for page Lifestyle.';
		break;
	case 'newsCat10':
		$content = include"help.php";
		break;
	case 'newsCat11':
		$content = '<div id=kotaksugest></div>';
		break;
	default:
		$content = 'There was an error.';

} 
print stringForJavascript($content);
usleep(600000);
?>

</body>

</html>
	