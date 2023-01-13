<?

$permission=$_COOKIE["permission"];  
$usersystem=$_COOKIE["usersystem"];  
$idusersystem=$_COOKIE["idusersystem"];  
$mail=$_COOKIE["mail"];  

$yearstring = 4;
$requiredstring = 6;
$shortstring = 100;
$longstring = 200;

$idtrip=$_COOKIE["idtrip"];  

$now=date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i");

$dblocation = "localhost";
$dbname = "airticket";
$dbuser = "root";
$dbpasswd = "";
$dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);

if (!$dbcnx) 
{
  echo( "<P> Ошибка подключения к серверу/P>" );
  exit();
}
if (!@mysql_select_db($dbname, $dbcnx)) 
{
  echo( "<P> Ошибка выбора БД/P>" );
  exit();
}
	mysql_set_charset("utf-8", $dbcnx);

?>
