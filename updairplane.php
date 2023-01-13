<?
require "option.php";//файл с параметрами подключения к БД
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



$step=$_REQUEST["step"];
if ($step==2)
{
//признак редактирования
$upd=$_REQUEST["upd"];

//считывание данных
$airplane =  $_POST["airplane"];
$count =  $_POST["count"];
$format =  $_POST["format"];


if ($upd==1)
     $id=$_REQUEST["id"];

$error=0;

//формируем сообщение об ошибке
if ( (trim($airplane)=="")  or (trim($format)=="")or (trim($count)=="") )
$error=1;

if (trim($airplane)=="")
$alert=$alert."Введите 'Название'! <br>";

if (trim($format)=="")
$alert=$alert."Введите 'Формат рядов'! <br>";

if (trim($count)=="")
$alert=$alert."Введите 'Количество мест'! <br>";

if ( (strlen ($airplane)>$longstring) or(strlen ($count)>$longstring) or (strlen ($format)>$shortstring) ) 
$error=1;

if (strlen ($airplane)>$longstring)
$alert=$alert."Введите корректные данные (<$longstring) в поле 'Название'! <br>";

if (strlen ($format)>$shortstring)
$alert=$alert."Введите корректные данные (<$shortstring) в поле 'Формат рядов'! <br>";

if (strlen ($count)>$longstring)
$alert=$alert."Введите корректные данные (<$longstring) в поле 'Количество мест'! <br>";

$s="select * from airplane where airplane='".trim($airplane)."'";
if ($upd==1)
	$s=$s." and idairplane!=$id";

$SET_airplane=mysql_query($s);
$COUNT_airplane=mysql_num_rows($SET_airplane);

if ($COUNT_airplane!=0)
{
	$error=1;
	$alert=$alert."Услуга с таким названием уже существует! <br>";
} 

if ($error==1)
{
$alert="Ошибка ввода данных!<br>".$alert;

?>
		<script language="javascript">

var text = "<? echo $alert;?>";
text=text.replace(new RegExp("<br>",'g'),"\n");
alert(text);
history.back();
		</script>
<?
exit();
}	

//выполнение запроса на редактирование или добавление данных	
if ($upd==1)
  {  
	 mysql_query("UPDATE airplane set count='$count', airplane='$airplane', format='$format' WHERE idairplane=$id");
	 ?>
	 <script language="javascript">
	 location.href='airplane.php?filter=0';
	 </script>
	 <?
  }  else
  {//формирование SQL-запроса на добавление данных
	 mysql_query("INSERT INTO airplane (count, airplane, format) VALUES ( '$count', '$airplane', '$format')");
	?>
	 <script language="javascript">
	 location.href='airplane.php?filter=0';
	 </script>
	 <?
  }
exit;
}


$upd=$_REQUEST["upd"];
if ($upd==1)
{
$Arr=$_REQUEST["Arr"];

$r=mysql_query("select * from airplane where idairplane="."$Arr[0]");
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
								<b><p>Самолеты</p></b>
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
								<p>Рейсы</p>

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
										<div class="card-title">Добавление самолета</div>
                                    <?
									}
									else
									{
									?>
										<div class="card-title">Редактирование самолета (<? echo $f["airplane"];?>)</div>
									<?
                                    }
									?>  
                                         
									</div>
                                    
									<div class="card-body">
								
									
                                    <table  border="0">
                    <tr>
                      <td width="25%"><font   color="#000000" >   Название*: </font> </td>
                      <td><input class="form-control input-full"    name="airplane" size="55"   type="text"  value="<? if ($upd==1) echo htmlentities($f['airplane']); else echo(""); ?>"  ></td>
                    </tr>  	   
                                                               
                    <tr>
                      <td><font color="#000000" >   Количество мест*: </font> </td>
                      <td><input class="form-control input-full"    name="count" size="30"  type="number"  value="<? if ($upd==1) echo $f['count']; else echo(""); ?>"  ></td>
                    </tr>  	                                                                                     
                    <tr>
                      <td><font color="#000000" > Формат рядов*: </font> </td>
                      <td><input class="form-control input-full"    name="format" size="30"  value="<? if ($upd==1) echo $f['format']; else echo(""); ?>"   type="text" ></td>
                    </tr> 

              
                                   
                      
                  </table>
<br>
				<input class="btn btn-success"   type="button"   name="button"    onclick="this.form.action='updairplane.php?step=2&upd=<? echo"$upd";?>&id=<? echo"$Arr[0]";?>'; this.form.submit();"   value="Сохранить" width="500">
				<input class="btn btn-danger"   type="button"  name="button"   onClick="javascript:history.back();"  value="Отмена">
                                    
                                    
                                    	
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
							&copy; <? echo Date("Y");?>, Все права защищены
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
		var state = $('#notify_state option:selected').val();
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
			type: state,
			placement: {
				from: placementFrom,
				align: placementAlign
			},
			time: 1000,
		});
	});
</script>
</html>