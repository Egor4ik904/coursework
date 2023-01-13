	<?
require "option.php";
//считывание идентификатора
$Arr=$_POST['Arr'];
$id=$Arr[0];

//выполнение запроса на удаление данных
mysql_query("DELETE FROM airplane  WHERE idairplane=$id");

?>
 <script language="javascript">
 location.href='airplane.php';
 </script>
