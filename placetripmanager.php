<?
require "option.php";//файл с параметрами подключения к БД
if (isset ($_POST['arrtrip']))
{
 $Arr=$_POST['arrtrip'];
 $idtrip=$Arr[0];
 setcookie ( 'idtrip', $idtrip); 
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
										<div class="card-title">Билеты рейса № <? echo $idtrip;?> </div> 	
                                        <div align="right">	
Сортировка:
				<select name="sortname"  style="height:22; width:auto" onChange="this.form.action='placetripmanager.php?sort=1&filter=<? echo $filter;?>'; this.form.submit();" >
				  <option value="place"  <? if ($fieldsort=="place") {?> selected="selected" <? }?>>Билет </option>
                  <option value="usersystem"  <? if ($fieldsort=="usersystem") {?> selected="selected" <? }?> >Клиент </option>
                  <option value="status"  <? if ($fieldsort=="status") {?> selected="selected" <? }?> >Статус </option>

                </select>            	
&nbsp;&nbsp;Статус: 
                
				<input   name="FilterValue1"  onFocus="if (this.value=='Все') this.value=''"  value="<? if ($filter==1)/*есть ли фильтрация данных*/ echo "$value1"; else echo(""); ?>"  type="text">


				<br>
				<input  type="button"  name="button1"  onclick="this.form.action='placetripmanager.php?filter=1&sort=<? echo $sort;?>'; this.form.submit();"   value="Фильтр">
				<input  type="button"  name="button2"  onclick="this.form.action='placetripmanager.php?filter=0&sort=<? echo $sort;?>'; this.form.submit();"   value="Очистить">
                
           <br>
             </div>  
 <div align="left">
<input   type="button"  class="btn btn-success"  name="button"  <? if (mysql_num_rows($r)==0) {?>    disabled="disabled"<? }?>  onclick="this.form.action='placetriptoexcel.php?upd=1&step=1'; this.form.submit();" value="Экспорт билетов">   
 <input   type="button"  class="btn btn-danger"  name="button"    onclick="this.form.action='tripmanager.php?upd=1&step=1'; this.form.submit();" value="Назад">   
   </div>            
           
									</div>
                                    
									<div class="card-body">
										<table class="table table-head-bg-success" >
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
