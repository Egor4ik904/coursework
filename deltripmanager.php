	<?
require "option.php";
//считывание идентификатора
$Arr=$_POST['arrtrip'];
$id=$Arr[0];
//выполнение запроса на удаление данных
mysql_query("DELETE FROM trip  WHERE idtrip=$id");

?>
 <script language="javascript">
 location.href='tripmanager.php';
 </script>
