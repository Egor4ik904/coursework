<?
require "option.php";//файл с параметрами подключения к БД
if (isset ($_POST['arrtrip']))
{
 $Arr=$_POST['arrtrip'];
 $idtrip=$Arr[0];
 setcookie ( 'idtrip', $idtrip); 
}


$step=$_REQUEST["step"];
if ($step==2)
{
//признак редактирования
$upd=$_REQUEST["upd"];

//считывание данных
$idairplane =  $_POST["idairplane"];
$idairportout =  $_POST["idairportout"];
$idairportin =  $_POST["idairportin"];
$datein =  $_POST["datein"];
$dateout =  $_POST["dateout"];
$cost =  $_POST["cost"];

$error=0;



//формируем сообщение об ошибке
if (trim($idairplane)=="") 
$error=1;

if (trim($idairplane)=="")
$alert=$alert."Выберите самолет! <br>";

if (trim($cost)=="")
$alert=$alert."Введите стоимость! <br>";

if ($error==1)
{
$alert="Ошибка ввода данных!<br>".$alert;

?>
<meta charset="utf-8">
		<script language="javascript">
		var text = "<? echo $alert;?>";
		text=text.replace(new RegExp("<br>",'g'),"\n");
		alert(text);
		history.back();
		</script>
<?
exit();
}		

if ($upd==1)
  {  
	 mysql_query("UPDATE trip set  idairplane='$idairplane', dateout='$dateout',  idairportout='$idairportout', idairportin='$idairportin',  datein='$datein',  cost='$cost'  WHERE idtrip=$idtrip");

	 ?>
	 <script language="javascript">
	 location.href='tripmanager.php?>';
	 </script>
	 <?
  }  else
  {//формирование SQL-запроса на добавление данных

	mysql_query("INSERT INTO trip (idairplane, dateout,  idairportout, idairportin,  datein, cost) VALUES ('$idairplane', '$dateout', '$idairportout', '$idairportin', '$datein', '$cost')");
	$idtrip=mysql_insert_id();
	 
	$r=mysql_query("select count from airplane where idairplane=$idairplane");
	$f=mysql_fetch_array($r);//считывание текующей записи
	$countplace=$f["count"];
	
		for ($i=1;$i<=$countplace;$i++)//вывод данных в цикле по количеству записей
		  {
		  $place=$idtrip."---".$i;
		  $r=mysql_query("insert into place (idtrip, place, status) values ('$idtrip', '$place', 'В продаже')");

		  }
	 
	?>
	 <script language="javascript">
	 location.href='tripmanager.php';
	 </script>
	 <?
  }
exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><? echo $permission;?></title>
	<meta charset="utf-8" content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
<?
if ($permission!="Менеджер")
{
?>
<script language="javascript">
alert("Требуется авторизация!");
location.href='index.php';
</script>
<?
exit;
}



$upd=$_REQUEST["upd"];
if ($upd==1)
{
//выполнение запроса на выборку данных
$r=mysql_query("select * from trip where idtrip=$idtrip");

$f=mysql_fetch_array($r);//считывание текующей записи


}





 
?>



	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="#" class="logo">
					<? echo $permission;?>
				</a>
                
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					

					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

						
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <span ><? echo $usersystem;?></span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										
										<div class="u-text">
											<h4><? echo $usersystem;?></h4>
											<p class="text-muted"><? echo $permission;?></p>
											<p class="text-muted"><? echo $mail;?></p>
                                        </div>
									</div>
								</li>
									<div class="dropdown-divider"></div>
									
									<a class="dropdown-item" href="index.php?step=2"><i class="fa fa-power-off"></i> Выход</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">


					</div>					                   	
					<ul class="nav">
						<li class="nav-item">
							<a href="index.php">
								<i class="la la-home"></i>
								<p>Главная</p>
						
							</a>
						</li>						
	
						<li class="nav-item">
							<a href="airplane.php">
								<i class="la la-map"></i>
								<p>Самолеты</p>
							</a>
						</li>										
                        <li class="nav-item">
							<a href="airport.php">
								<i class="la la-yelp"></i>
								<p>Аэропорты</p>                          
							</a>
						</li>						
                        <li class="nav-item">
							<a href="tripmanager.php">
								<i class="la la-tasks"></i>
								<b><p>Рейсы</p></b>

							</a>
						</li>						                                                         
			</ul>
				</div>
			</div>
          <div class="main-panel">
          
				<div class="content">
                
					<div class="container-fluid">

                    
                   
				
                     <div class="card">
                     





<form name="form2"  method="post"  >

									<div class="card-header">
	 								<? 
									if ($upd==0){ 
									?>
										<div class="card-title">Добавление рейса</div>
                                    <?
									}
									else
									{
									?>
										<div class="card-title">Редактирование рейса № <? echo $idtrip;?> </div>
									<?
                                    }
									?>  
                                         
									</div>
                                    								

                                    
									<div class="card-body">



                                    <table  border="0">

<tr> 
 <td><font color="#000000" >   Самолет: </font></td>
        <td>
        <select class="form-control" name="idairplane"   >
  <?
$s="select * from airplane";
  
$d=mysql_query($s);
for ($i=0;$i<mysql_num_rows($d);$i++)
  {
    $m=mysql_fetch_array($d);
	echo "<option value=".$m["idairplane"];
	if ($m["idairplane"]==$f["idairplane"])
	 echo " selected=selected";
	echo ">".$m["airplane"];
	echo "</option>";	 		
  }
  
?>
					  
          </select>

          </td>
                                                                                                                                           
</tr>

<tr> 
 <td><font color="#000000" >   Пункт отправки: </font></td>
        <td>
        <select class="form-control" name="idairportout"   >
  <?
$s="select * from airport";
  
$d=mysql_query($s);
for ($i=0;$i<mysql_num_rows($d);$i++)
  {
    $m=mysql_fetch_array($d);
	echo "<option value=".$m["idairport"];
	if ($m["idairport"]==$f["idairport"])
	 echo " selected=selected";
	echo ">".$m["airport"];
	echo "</option>";	 		
  }
  
?>
					  
          </select>

          </td>
                                                                                                                                           
</tr>

<tr> 
 <td><font color="#000000" >   Пункт прибытия: </font></td>
        <td>
        <select class="form-control" name="idairportin"   >
  <?
$s="select * from airport";
  
$d=mysql_query($s);
for ($i=0;$i<mysql_num_rows($d);$i++)
  {
    $m=mysql_fetch_array($d);
	echo "<option value=".$m["idairport"];
	if ($m["idairport"]==$f["idairport"])
	 echo " selected=selected";
	echo ">".$m["airport"];
	echo "</option>";	 		
  }
  
?>
					  
          </select>

          </td>
                                                                                                                                           
</tr>
                                                                                 
                    <tr>
                      <td><font color="#000000" >   Дата отправки*: </font> </td>
                      <td><input class="form-control input-full"    name="dateout" size="30"  type="text"  value="<? if ($upd==1) echo $f['dateout']; else echo($now); ?>"  ></td>
                    </tr>                     
                    <tr>
                      <td><font color="#000000" >   Дата прибытия*: </font> </td>
                      <td><input class="form-control input-full"    name="datein" size="30"  type="text"  value="<? if ($upd==1) echo $f['datein']; else echo($now); ?>"  ></td>
                    </tr>                         
                    <tr>
                      <td><font color="#000000" >   Стоимость*: </font> </td>
                      <td><input class="form-control input-full"    name="cost" size="30"  type="number"  value="<? if ($upd==1) echo $f['cost']; else echo(""); ?>"  ></td>
                    </tr>                    
                                   
                      
                  </table>
                  
                  
<br>
				<input class="btn btn-success"   type="button"   name="button"    onclick="this.form.action='updtripmanager.php?step=2&upd=<? echo"$upd";?>'; this.form.submit();"   value="Сохранить" width="500">
				<input class="btn btn-danger"   type="button"  name="button"   onClick="this.form.action='tripmanager.php'; this.form.submit();"  value="Отмена">
                                    
                                    
                                    	
			</div>

      </form>



	            
           					</div>
                            

					</div>
				</div>     
                <div>

                                               
                </div>
				<footer class="footer">
					<div class="container-fluid"  >
						<nav class="pull-left">
							<ul class="nav">

							</ul>
						</nav>
						<div class="copyright ml-auto">
							 &copy; <? echo Date("Y");?>,  Все права защищены
						</div>				
					</div>
				</footer>
			</div>
		</div>
	</div>
</div>

</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script>
	$('#displayNotif').on('click', function(){
		var placementFrom = $('#notify_placement_from option:selected').val();
		var placementAlign = $('#notify_placement_align option:selected').val();
		var store = $('#notify_store option:selected').val();
		var style = $('#notify_style option:selected').val();
		var content = {};

		content.message = 'Turning standard Bootstrap alerts into "notify" like notifications';
		content.title = 'Bootstrap notify';
		if (style == "withicon") {
			content.icon = 'la la-bell';
		} else {
			content.icon = 'none';
		}
		content.url = 'index.html';
		content.target = '_blank';

		$.notify(content,{
			type: store,
			placement: {
				from: placementFrom,
				align: placementAlign
			},
			time: 1000,
		});
	});
</script>

</html>
