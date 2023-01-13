<?
require "option.php";//файл с параметрами подключения к БД

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Регистрация</title>
	<meta charset="utf-8" content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
<?

$now=(date("Y"))."-".date("m")."-".date("d"); 


$step=$_REQUEST["step"];
if ($step==2)
{

//считывание данных
$usersystem =  $_POST["usersystem"];
$phone =  $_POST["phone"];
$mail =  $_POST["mail"];
$login =  $_POST["login"];
$parol =  $_POST["parol"];
$permission =  "Клиент";
$repparol =  $_POST["repparol"];

$error=0;
//формируем сообщение об ошибке
if ( (trim($login)=="") or (trim($phone)=="") or (trim($usersystem)=="") or (trim($mail)=="") or (trim($parol)=="") or (trim($repparol)=="")) 
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

if (trim($repparol)=="")
$alert=$alert."Введите пароль повторно! <br>";


if ( (strlen ($login)>$shortstring) or (strlen ($usersystem)>$shortstring) or (strlen ($mail)>$shortstring) or (strlen ($parol)>$shortstring) or (strlen ($repparol)>$shortstring) or (strlen ($login)<$requiredstring) or (strlen ($parol)<$requiredstring) or (strlen ($repparol)<$requiredstring)  ) 
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

if ((strlen ($repparol)>$shortstring) or (strlen ($repparol)<$requiredstring))
$alert=$alert."Введите корректные данные ($requiredstring-$shortstring) в поле 'Повторите пароль'! <br>";


$SET_user=mysql_query("select * from usersystem where login='$login'");
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

$SET_user=mysql_query("select * from usersystem where mail='$mail'");
$COUNT_user=mysql_num_rows($SET_user);

if ($COUNT_user!=0)
{
	$error=1;
	$alert=$alert."Пользователь с таким адресом электронной почты уже существует! <br>";
} 

if ($parol!=$repparol) 
{
	$error=1;
	$alert=$alert."Повторите ввод пароля корректно <br>";
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
	

  {//формирование SQL-запроса на добавление данных
	 mysql_query("INSERT INTO usersystem (login, parol, phone, permission, usersystem, mail) VALUES ('$login', '$parol', '$phone', '$permission', '$usersystem', '$mail')");
	?>
	 <script language="javascript">
	 alert("Регистрация успешно пройдена!");	 
	 location.href='index.php#auth';
	 </script>
	 <?
  }
exit;
}




$date=(date("Y")-40)."-".date("m")."-".date("d"); 



 
?>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="#" class="logo">
					Регистрация
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					

					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

						
						
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
								<p>На главную</p>
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

										<div class="card-title">Регистрация нового пользователя</div>


                                         
									</div>
                                    
									<div class="card-body">
								
									
                                    <table  border="0">
                    <tr>
                      <td width="40%"><font   color="#000000" >   ФИО*: </font> </td>
                      <td><input class="form-control input-full"    name="usersystem" size="30"   type="text"    ></td>
                    </tr>  	   
                                                               
                    <tr>
                      <td><font color="#000000" >   Телефон*: </font> </td>
                      <td><input class="form-control input-full"    name="phone" size="30"  type="text"    ></td>
                    </tr>  	                                                                                     
                    <tr>
                      <td><font color="#000000" > Почта*: </font> </td>
                      <td><input class="form-control input-full"    name="mail" size="30"     type="text" ></td>
                    </tr> 
                    
                    <tr>
                      <td><font color="#000000" > Логин*: </font> </td>
                      <td><input class="form-control input-full"    name="login" size="30"     type="text" ></td>
                    </tr>  	                      			  
                    <tr>
                      <td><font color="#000000" >  Пароль*: </font> </td>
                      <td><input class="form-control input-full"    name="parol" size="30"   type="password" ></td>
                    </tr>      
                    <tr>
                      <td><font color="#000000" >  Повторите пароль*: </font> </td>
                      <td><input class="form-control input-full"    name="repparol" size="30"   type="password" ></td>
                    </tr>                    
                                   
                      
                  </table>
<br>
				<input class="btn btn-success"   type="button"   name="button"    onclick="this.form.action='reg.php?step=2&upd=<? echo"$upd";?>&id=<? echo"$Arr[0]";?>'; this.form.submit();"   value="Сохранить" width="500">
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