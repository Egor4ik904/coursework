<?	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . 'Проданные билеты.xls');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0'); 
    header('Cache-Control: must-revalidate');
    header('Pragma: public');   

require "option.php";//файл с параметрами подключения к БД
 	?>				   
					   


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Авиакомпания</title>
</head>
<body>

  <?
		$idtrip=$_GET["idtrip"];//считывание параметра фильтра
		 $s="SELECT idticket, fio, pasport, name, ticket, price, dateout, datein  FROM trip, ticket, user where trip.idtrip=ticket.idtrip and user.iduser=ticket.iduser and trip.idtrip=$idtrip and status='Куплен'";

	 ?>
     
  <table WIDTH=100% border=1 cellspacing=0 cellpadding=3>
									<tr>
                              
		<td ><h5>ФИО</h5></td>
		<td ><h5>Паспорт</h5></td>        
		<td ><h5>Рейс</h5></td>	
		<td ><h5>Билет</h5></td>	
		<td ><h5>Цена</h5></td>	                			
		<td ><h5>Отбытие</h5></td>	                			
		<td ><h5>Прибытие</h5></td>	   			
			</tr>     

<?


$r=mysql_query($s);

			for ($i=0;$i<mysql_num_rows($r);$i++)//вывод данных в цикле по количеству записей
			  {
				$f=mysql_fetch_array($r);//считывание текующей записи				
				echo "<tr>";	
				echo "
				<td> $f[fio]</td>
				<td> $f[pasport]</td>				
				<td> $f[name]</td>								
				<td> $f[ticket]</td>								
				<td> $f[price]</td>								
				<td> $f[dateout]</td>								
				<td> $f[datein]</td>	
				";								
				echo "</tr>";
			  }		 
		?>
      
  </table> 
		
		
						

</body>
</html>