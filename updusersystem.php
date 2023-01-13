<?
require "option.php";//файл с параметрами подключения к БД
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Режим администратора</title>
	<meta charset="utf-8" content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
<?
if ($permission!="Администратор")
{
?>
<script language="javascript">
alert("Требуется авторизация!");
</script>
<?
exit;
}

$now=(date("Y"))."-".date("m")."-".date("d"); 

$step=$_REQUEST["step"];
if ($step==2)
{
//признак редактирования
$upd=$_REQUEST["upd"];
//считывание данных
$usersystem =  $_POST["usersystem"];
$phone =  $_POST["phone"];
$mail =  $_POST["mail"];
$login =  $_POST["login"];
$parol =  $_POST["parol"];
$permission =  $_POST["permission"];

if ($upd==1)
     $id=$_REQUEST["id"];


$error=0;

//формируем сообщение об ошибке
if ( (trim($login)=="") or (trim($phone)=="") or (trim($usersystem)=="") or (trim($mail)=="") or (trim($parol)=="") ) 
$error=1;

if (trim($usersystem)=="")
$alert=$alert."Введите ФИО! <br>";
	
if (trim($mail)=="")
$alert=$alert."Введите адрес почты! <br>";

if (trim($phone)=="")
$alert=$alert."Введите телефон! <br>";

if (trim($login)=="")
$alert=$alert."Введите поле логин! <br>";

if (trim($parol)=="")
$alert=$alert."Введите пароль! <br>";


if ((strlen ($login)>$shortstring) or (strlen ($usersystem)>$shortstring) or (strlen ($mail)>$shortstring) or (strlen ($parol)>$shortstring) or (strlen ($login)<$requiredstring) or (strlen ($parol)<$requiredstring) ) 
$error=1;




if (strlen ($usersystem)>$shortstring)
$alert=$alert."Введите корректные данные (<$shortstring) в поле 'ФИО'! <br>";

if (strlen ($mail)>$shortstring)
$alert=$alert."Введите корректные данные (<$shortstring) в поле 'Почта'! <br>";

if (strlen ($phone)>$shortstring)
$alert=$alert."Введите корректные данные (<$shortstring) в поле 'Телефон'! <br>";

if ((strlen ($login)>$shortstring) or (strlen ($login)<$requiredstring))
$alert=$alert."Введите корректные данные ($requiredstring-$shortstring) в поле 'Логин'! <br>";

if ((strlen ($parol)>$shortstring) or (strlen ($parol)<$requiredstring))
$alert=$alert."Введите корректные данные ($requiredstring-$shortstring) в поле 'Пароль'! <br>";



$s="select * from usersystem where login='$login'";
if ($upd==1)
	$s=$s." and idusersystem!=$id";

$SET_user=mysql_query($s);
$COUNT_user=mysql_num_rows($SET_user);

if ($COUNT_user!=0)
{
	$error=1;
	$alert=$alert."Пользователь с таким логином уже существует! <br>";
} 



if ( ( strpos($mail, "@")==0)  or ( strpos($mail, ".")==0) )
{
	$error=1;
	$alert=$alert."Введите корректный адрес электронной почты! <br>";
}

$s="select * from usersystem where mail='$mail'";
if ($upd==1)
	$s=$s." and idusersystem!=$id";

$SET_user=mysql_query($s);
$COUNT_user=mysql_num_rows($SET_user);

if ($COUNT_user!=0)
{
	$error=1;
	$alert=$alert."Пользователь с таким адресом электронной почты уже существует! <br>";
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
	 mysql_query("UPDATE usersystem set login='$login', parol='$parol', permission='$permission', phone='$phone', usersystem='$usersystem', mail='$mail' WHERE idusersystem=$id");
	 ?>
	 <script language="javascript">
	 location.href='usersystem.php?filter=0';
	 </script>
	 <?
  }  else
  {//формирование SQL-запроса на добавление данных
	 mysql_query("INSERT INTO usersystem (login, parol, phone, permission, usersystem, mail) VALUES ('$login', '$parol', '$phone', '$permission', '$usersystem', '$mail')");
	?>
	 <script language="javascript">
	 location.href='usersystem.php?filter=0';
	 </script>
	 <?
  }
exit;
}

$date=(date("Y")-40)."-".date("m")."-".date("d"); 

$upd=$_REQUEST["upd"];
if ($upd==1)
{
$Arr=$_REQUEST["Arr"];
//phpinfo(32);
$r=mysql_query("select * from usersystem where idusersystem="."$Arr[0]");

$f=mysql_fetch_array($r);//считывание текующей записи
}
 
?>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="#" class="logo">
					Администратор
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
							<a href="usersystem.php">
								<i class="la la-user"></i>
								<b><p>Пользователи</p></b>
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
										<div class="card-title">Добавление пользователя</div>
                                    <?
									}
									else
									{
									?>
										<div class="card-title">Редактирование пользователя (<? echo $f["usersystem"];?>)</div>
									<?
                                    }
									?>  
                                         
									</div>
                                    
									<div class="card-body">
								
									
                                    <table  border="0">
                    <tr>
                      <td width="40%"><font   color="#000000" >   ФИО*: </font> </td>
                      <td><input class="form-control input-full"    name="usersystem" size="30"   type="text"  value="<? if ($upd==1) echo $f['usersystem']; else echo(""); ?>"  ></td>
                    </tr>  	                                                                   
                    <tr>
                      <td><font color="#000000" >   Телефон*: </font> </td>
                      <td><input class="form-control input-full"    name="phone" size="30"  type="text"  value="<? if ($upd==1) echo $f['phone']; else echo(""); ?>"  ></td>
                    </tr>  	                                                                                     
                    <tr>
                      <td><font color="#000000" > Почта*: </font> </td>
                      <td><input class="form-control input-full"    name="mail" size="30"  value="<? if ($upd==1) echo $f['mail']; else echo(""); ?>"   type="text" ></td>
                    </tr> 
<tr>
                      <td><font color="#000000" >   Права*: </font></td>
                      <td>
                 <select class="form-control"  name="permission"  style="height:22; width:auto"    >
					<option   value="Администратор"  <?	if (($upd==1)&& ($f['permission']=="Администратор")) echo "selected"; ?> > Администратор </option>	   

                    <option  value="Менеджер" <?	if (($upd==1)&& ($f['permission']=="Менеджер")) echo "selected"; ?> >Менеджер </option>
                   
                    <option  value="Клиент" <?	if (($upd==1)&& ($f['permission']=="Клиент")) echo "selected"; ?> >Клиент </option>                                        	         																				
				</select>                    
				      </td> 
                      </tr>                     
                    <tr>
                      <td><font color="#000000" > Логин*: </font> </td>
                      <td><input class="form-control input-full"    name="login" size="30"  value="<? if ($upd==1) echo $f['login']; else echo(""); ?>"   type="text" ></td>
                    </tr>  	                      			  
                    <tr>
                      <td><font color="#000000" >  Пароль*: </font> </td>
                      <td><input class="form-control input-full"    name="parol" size="30" value="<? if ($upd==1) echo $f['parol']; else echo(""); ?>"   type="text" ></td>
                    </tr>      
                  
                                   
                      
                  </table>
<br>
				<input class="btn btn-success"   type="button"   name="button"    onclick="this.form.action='updusersystem.php?step=2&upd=<? echo"$upd";?>&id=<? echo"$Arr[0]";?>'; this.form.submit();"   value="Сохранить" width="500">
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
							<p>"Заказ авиабилетов" &copy; <? echo Date("Y");?>, Все права защищены</p>
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