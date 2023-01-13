	<?
require "option.php";
//считывание идентификатора
$Arr=$_POST['Arr'];
$id=$Arr[0];

//выполнение запроса на удаление данных
mysql_query("DELETE FROM airport  WHERE idairport=$id");

?>
 <script language="javascript">
 location.href='airport.php';
 </script>
