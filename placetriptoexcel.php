<?	
require "option.php";//файл с параметрами подключения к БД

	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . 'Перечень билетов на рейс №'.$idtrip.'.xls');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0'); 
    header('Cache-Control: must-revalidate');
    header('Pragma: public');


 	?>				   
					   


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
$filter=$_GET["filter"];//считывание параметра фильтра
$value1 = $_POST['FilterValue1'];//значение первого поля
$sort=$_GET["sort"];//считывание параметра фильтра		
//выполнение запроса на выборку данных
$s="SELECT place.*, usersystem FROM  place LEFT JOIN usersystem on place.idusersystem= usersystem.idusersystem where idtrip=$idtrip";

if (($value1!="") and ($filter==1))/*есть ли фильтрация данных*/
{
$s=$s." and UPPER(status)" ;
if ($value1!="Все")
$s=$s." LIKE UPPER('%$value1"."%')  ";
else
$s=$s."=UPPER(status) ";

}

		 


if ($sort==1)/*есть ли сортировка данных*/
{
$fieldsort = $_POST['sortname'];//первое поле
$s=$s." order by $fieldsort";
}

$r=mysql_query($s);						 
?>
	
	
<table  width="100%" border=1>
											<thead>
												<tr>

                                                    <th scope="col">Билет</th>                                                 										
                                                    <th scope="col">Клиент</th>
                                                    <th scope="col">Статус</th>
                                                    </tr>
											</thead>
											<tbody>
<?
		 


			for ($i=0;$i<mysql_num_rows($r);$i++)//вывод данных в цикле по количеству записей
			  {
				$f=mysql_fetch_array($r);//считывание текующей записи				
				echo "<tr>";
?>

                                                <?
		
				echo "
				<td> $f[place]</td>																	
				<td> $f[usersystem]</td>	
				<td> $f[status]</td>																				
				";								
				echo "</tr>";
			  }		 
		?>
											</tbody>
										</table>												
	
	
	
	
	
	
	
	
</head>
<body>

		
		
						

</body>
</html>