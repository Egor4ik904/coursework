<?	
require "option.php";//файл с параметрами подключения к БД

	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . 'Расписание рейсов.xls');
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

if ($filter==0)/*есть ли фильтрация данных*/
{
date_default_timezone_set("Europe/Minsk");
$date1=(date("Y")-1)."-".date("m")."-".date("d");    
$date2=(date("Y")+1)."-".date("m")."-".date("d");    
}
else	
{
$date1=$_POST['date1'];    
$date2=$_POST['date2'];    
}
//выполнение запроса на выборку данных
$s="SELECT trip.*, airplane, airportin.airport as airportin, airportout.airport as airportout from trip, airplane, airport as airportin, airport as airportout where trip.idairplane=airplane.idairplane and trip.idairportin=airportin.idairport and trip.idairportout=airportout.idairport ";

$s=$s. " and dateout>='$date1' and dateout<='$date2'";

if (($value1!="") and ($filter==1))/*есть ли фильтрация данных*/
{
$s=$s." and UPPER(airportout.airport)" ;
if ($value1!="Все")
$s=$s." LIKE UPPER('%$value1"."%')  ";
else
$s=$s."=UPPER(airportout.airport) ";

}

if (($value2!="") and ($filter==1))/*есть ли фильтрация данных*/
{
$s=$s." and UPPER(airportin.airport)" ;
if ($value2!="Все")
$s=$s." LIKE UPPER('%$value2"."%')  ";
else
$s=$s."=UPPER(airportin.airport) ";

}		 


if ($sort==1)/*есть ли сортировка данных*/
{
$fieldsort = $_POST['sortname'];//первое поле
$s=$s." order by $fieldsort";
}
else
$s=$s." order by idtrip";

$r=mysql_query($s);					 
?>
	
	
<table  width="100%" border=1>
											<thead>
												<tr>
                                                    <th scope="col">Номер</th>    
                                                    <th scope="col">Самолет</th> 
                                                    <th scope="col">Дата отправки/прибытия</th> 
                                                    <th scope="col">Пункт отправки/прибытия</th>                                             
                                                    <th scope="col">Стоимость</th>
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
				<td> $f[idtrip]</td>					
				<td> $f[airplane]</td>		
				<td> $f[dateout]<br>$f[datein]</td>	
				<td> $f[airportout]<br>$f[airportin]</td>					
				<td> $f[cost]</td>																				
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