	<?
require "option.php";
//считывание идентификатора
$Arr=$_POST['Arr'];
$id=$Arr[0];
//выполнение запроса на удаление данных
mysql_query("DELETE FROM usersystem  WHERE idusersystem=$id");
?>
 <script language="javascript">
 location.href='usersystem.php';
 </script>
