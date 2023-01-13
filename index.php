<?
require "option.php";//файл с параметрами подключения к БД

//подсчет количества рейсов
$s="select COUNT(*) as counttrip from trip";
$r=mysql_query($s);
$f=mysql_fetch_array($r);
//считывание количества рейсов
$counttrip=$f["counttrip"];

//подсчет количества участников
$s="select COUNT(*) as countmember from usersystem where permission like 'Клиент'";
$r=mysql_query($s);
$f=mysql_fetch_array($r);
//считывание количества клиентов
$countmember=$f["countmember"];

//подсчет количества самолетов
$s="select COUNT(*) as countairplane from airplane";
$r=mysql_query($s);
$f=mysql_fetch_array($r);
//считывание суммы хронометража
$countairplane=$f["countairplane"];


$step=$_REQUEST["step"];

if ($step==1)
{
$login=$_POST["login"];
$parol=$_POST["parol"];

//авторизация пользователя (проверка наличие пользователя с введенными данными авторизации в базе данных)
//выполнение запроса на выборку данных
$SET_USER=mysql_query("select * from usersystem where login='$login' and parol='$parol'");
$COUNT_USER=mysql_num_rows($SET_USER);





if ($COUNT_USER>0)
{//пользователь есть

		$f=mysql_fetch_array($SET_USER);//считывание текующей записи
		//заполнение cookie
		$idusersystem=$f["idusersystem"];
		setcookie ( 'idusersystem', $idusersystem); 
		$permission=$f["permission"];	
		setcookie ( 'permission', $permission); 
		$usersystem=$f["usersystem"];
		setcookie ( 'usersystem', $usersystem); 
		$mail=$f["mail"];
		setcookie ( 'mail', $mail); 		


//переход в зависимости от прав доступа
if ($permission=="Администратор")
 {
?>
<script language="javascript">
location.href='usersystem.php?step=0';
</script>
<?	 
 }

if ($permission=="Клиент")
 {
?>
<script language="javascript">
location.href='tripclient.php?step=0';
</script>
<?	 
 }
 
if ($permission=="Менеджер")
 {
?>
<script language="javascript">
location.href='airplane.php?step=0';
</script>
<?	 
 } 
}

}


if ($step==2)
{
//выход из системы

//очищение значений в cookie
		$idusersystem='';
		setcookie ( 'idusersystem', $idusersystem); 
		$permission='';	
		setcookie ( 'permission', $permission); 
		$usersystem='';
		setcookie ( 'usersystem', $usersystem); 
		$mail='';
		setcookie ( 'mail', $mail); 
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<title>Оформление заявок на авиабилеты</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'>

		<link rel="stylesheet" type="text/css" href="css/slicknav.css">
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css">
		

		<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
		<script type="text/javascript" src="js/camera.min.js"></script>
		<script type="text/javascript" src="js/myscript.js"></script>
		<script src="js/sorting.js" type="text/javascript"></script>
		<script src="js/jquery.isotope.js" type="text/javascript"></script>
		<!--script type="text/javascript" src="js/jquery.nav.js"></script-->
		

		<script>
			jQuery(function(){
					jQuery('#camera_wrap_1').camera({
					transPeriod: 500,
					time: 3000,
					height: '490px',
					thumbnails: false,
					pagination: true,
					playPause: false,
					loader: false,
					navigation: false,
					hover: false
				});
			});
		</script>
		
	</head>
	<body onLoad="showTab()">
    
<?  
if ( ($step==1) && ($COUNT_USER==0))
{
//ошибка авторизации
?>
<script language="javascript">
alert("Не верный ввод!");
</script>
<?
} 

if ($step==3)
{
	
	$to = 'demo@spondonit.com';
    $firstname = $_POST["fname"];
    $email= $_POST["email"];
    $text= $_POST["message"];
    $phone= $_POST["phone"];
    


    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    $message ='<table style="width:100%">
        <tr>
            <td>'.$firstname.'  '.$laststname.'</td>
        </tr>
        <tr><td>Email: '.$email.'</td></tr>
        <tr><td>phone: '.$phone.'</td></tr>
        <tr><td>Text: '.$text.'</td></tr>
        
    </table>';

    if (@mail($to, $email, $message, $headers))
    {
?>
<script language="javascript">
alert("Сообщение отправлено!");
location.href='index.php?step=0';
</script>
<?
    }else{
?>
<script language="javascript">
alert("Ошибка отправки сообщения!");
location.href='index.php?step=0';
</script>
<?		
    }

}
?>
    <!--home start-->
    
    <div id="home">
    	<div class="headerLine">
	<div id="menuF" class="default">
		<div class="container">
			<div class="row">
				<div class="logo col-md-4">
					<div>
						<a href="#">
							<img src="images/logo.png">
						</a>
					</div>
				</div>
				<div class="col-md-8">
					<div class="navmenu"style="text-align: center;">
						<ul id="menu">
							<li class="active" ><a href="#home">О компании</a></li>
							<li><a href="#member">Рейсы</a></li>                         
							<li ><a href="#contact" class="last">Контакты</a></li>
                            <?
                            if ($permission=="Клиент")
							{
							?>
							<li class="last"><a href="tripclient.php">Личный кабинет</a></li>                              
                            <?
							}
                            if ($permission=="Менеджер")
							{
							?>
							<li class="last"><a href="airplane.php">Личный кабинет</a></li>                              
                            <?
							}						
                            if ($permission=="Администратор")
							{
							?>
							<li class="last"><a href="usersystem.php">Личный кабинет</a></li>                              
                            <?
							}														
                            if ($permission=="")
							{
							?>       
							<li class="last"><a href="#auth">Личный кабинет</a></li>     
                            <?
							}
							?>                                 
                                                   				
                            
                            
						</ul>
    
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="container">
			<div class="row wrap">
				<div class="col-md-12 gallery"> 
						<div class="camera_wrap camera_white_skin" id="camera_wrap_1">
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>На рынке с 2006 года!</h2>
								</div>
							</div>
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>Правильное направление!</h2>
								</div>
							</div>
							<div data-thumb="" data-src="images/slides/blank.gif">
								<div class="img-responsive camera_caption fadeFromBottom">
									<h2>Лучший выбор!</h2>
								</div>
							</div>
						</div>
						<!-- #camera_wrap_1 --></div>
			</div>
		</div>
	</div>


 		<div class="container">
			<div class="row">
				<div class="col-md-4 project">
					<h3 id="counter">0</h3>
					<h4>Количество рейсов</h4>
					<p>Наши предложения</p>
				</div>
				<div class="col-md-4 project">
					<h3 id="counter1">0</h3>
					<h4>Количество клиентов</h4>
					<p>Наши постоянные клиенты</p>
				</div>
				<div class="col-md-4 project">
					<h3 id="counter2" style="margin-left: 20px;">0</h3>
					<h4 style="margin-left: 20px;">Количество самолетов</h4>
					<p>Наши самолеты</p>
				</div>
			</div>
		</div>
    </div>
    
  
    
    
      <!--member start-->    
    <div id="member">    
 		<div class="line3">
			<div class="container">
				<div id="project1" ></div>
				<div class="row Ama">
					<div class="col-md-12">
					<span name="projects" id="projectss"></span>
					<h3>Рейсы компании</h3>
					<p>Перечень наших услуг</p>
					</div>
				</div>
			</div>
		</div>  
        
<div class="container">
   
 <div  class="tab">
  <button class="tablinks" onclick="openTab(event, 'all')">Показать</button>
  <button class="tablinks" onclick="openTab(event, '')">Свернуть</button>  
</div>

<div id="all" class="tabcontent" align="center">
      <table  border="1" class="table table-head-bg-success" >
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
//формирование запроса на выборку данных
$s="SELECT trip.*, airplane, airportin.airport as airportin, airportout.airport as airportout from trip, airplane, airport as airportin, airport as airportout where trip.idairplane=airplane.idairplane and trip.idairportin=airportin.idairport and trip.idairportout=airportout.idairport";
$r=mysql_query($s);
			for ($i=0;$i<mysql_num_rows($r);$i++)//вывод данных в цикле по количеству записей
			  {
				$f=mysql_fetch_array($r);//считывание текующей записи				
				echo "<tr>";
	
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
            </div>    

            
		</div>      
                                   
    </div>
    
    
  
    
    
    <!--contact start-->
    
    <div id="contact">
    	<div class="line5">					
			<div class="container">
				<div class="row Ama">
					<div class="col-md-12">
					<h3>Остались вопросы? Мы можем помочь!</h3>
					<p>Свяжитесь с нами</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-xs-12 forma">
                							
                                            <form  id="myForm" action="index.php?step=3" method="post" class="contact-form text-right">
								<input name="fname" placeholder="Введите имя" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="col-md-6 col-xs-12 name" required="" type="text">
								<input name="email" placeholder="Введите адрес" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="col-md-6 col-xs-12 Email" required="" type="email">
								<textarea class="col-md-12 col-xs-12 Message" name="message" placeholder="Сообщение" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
						<div  align="left">
							
								<button class="btn btn-success" >Отправить сообщение <span class="lnr lnr-arrow-right"></span></button>
                                <button class="btn btn-danger" onclick="this.form.action='index.php#home'; this.form.submit();">Очистить <span class="lnr lnr-arrow-right"></span></button>

						</div>

							</form>
               
				</div>
				<div class="col-md-3 col-xs-12 cont">
					<ul>
						<li><i class="fa fa-home"></i>17420, ГОРОД МОСКВА, ПЕРЕУЛОК ПЕРВОМАЙСКИЙ, 23</li>
						<li><i class="fa fa-phone"></i>+7(8452) 96-05-40, +7 (8542) 96-20-26</li>
						<li><i class="fa fa-envelope"></i>airport@mail.ru</li>
						<li><a target="_new" href="https://www.vk.com/airport/"><i class="fa fa-vk"></i>ВКонтакте</li></a>
						<li><a target="_new" href="https://www.instagram.com/airport/"><i class="fa fa-instagram"></i>Instagram</li></a>
					</ul>
				</div>
			</div>
		</div>
        
        

        
        
		

        
       <div id="auth">   
        <div class="line7">
			<div class="container">
				<div class="row footer">
					<div class="col-md-12">

						<h3>Личный кабинет</h3>
						<div class="fr">
						<div style="display: inline-block;">
					<form method="post">
						<input type="text"  style="font-size:18px" class="col-md-6 col-xs-12 name" name='login' placeholder='Логин *'/> <br>
						<input  type="password" style="font-size:18px"  class="col-md-6 col-xs-12 name " name='parol' placeholder='Пароль *'/>

<br>
<div align="center">
                            <input   class="send"  style="font-size:18px" type="button" value="Войти" onclick="this.form.action='index.php?step=1'; this.form.submit();" >       
                             <input   class="send"  style="font-size:18px" type="button" value="Регистрация" onclick="this.form.action='reg.php?step=1'; this.form.submit();" >                         
</div>
							
						
					</form>
                    </div>
                        </div>
                        
                        
                        
                        
                        
                        
					</div>

				</div>
			</div>
		</div>
        </div>
        
		<div class="lineBlack">
			<div class="container">
				<div class="row downLine">
					
					<div class="col-md-6 text-left copy">
						<p>"Заказ авиабилетов" &copy; <? echo Date("Y");?>, Все права защищены</p>
					</div>
					<div class="col-md-6 text-right dm">
						<ul id="downMenu">
							<li class="active" ><a href="#home">О компании</a></li>
							<li><a href="#member">Рейсы</a></li>    
							<li ><a href="#contact">Контакты</a></li>
                            <?
                            if ($permission=="Клиент")
							{
							?>
							<li class="last"><a href="tripclient.php">Личный кабинет</a></li>                              
                            <?
							}
                            if ($permission=="Менеджер")
							{
							?>
							<li class="last"><a href="airplane.php">Личный кабинет</a></li>                              
                            <?
							}						
                            if ($permission=="Администратор")
							{
							?>
							<li class="last"><a href="usersystem.php">Личный кабинет</a></li>                              
                            <?
							}														
                            if ($permission=="")
							{
							?>       
							<li class="last"><a href="#auth">Личный кабинет</a></li>     
                            <?
							}
							?>                         
                                                      				                                                 
                            
                            


						</ul>
					</div>
				</div>
			</div>
		</div>
    </div>		
		
		
	<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.js"></script>
	<script>
			$(document).ready(function(){
			$(".bhide").click(function(){
				$(".hideObj").slideDown();
				$(this).hide(); //.attr()
				return false;
			});
			$(".bhide2").click(function(){
				$(".container.hideObj2").slideDown();
				$(this).hide(); // .attr()
				return false;
			});
				
			$('.heart').mouseover(function(){
					$(this).find('i').removeClass('fa-heart-o').addClass('fa-heart');
				}).mouseout(function(){
					$(this).find('i').removeClass('fa-heart').addClass('fa-heart-o');
				});
				
				function sdf_FTS(_number,_decimal,_separator)
				{
				var decimal=(typeof(_decimal)!='undefined')?_decimal:2;
				var separator=(typeof(_separator)!='undefined')?_separator:'';
				var r=parseFloat(_number)
				var exp10=Math.pow(10,decimal);
				r=Math.round(r*exp10)/exp10;
				rr=Number(r).toFixed(decimal).toString().split('.');
				b=rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1"+separator);
				r=(rr[1]?b+'.'+rr[1]:b);

				return r;
}
				
			setTimeout(function(){
					$('#counter').text('0');
					$('#counter1').text('0');
					$('#counter2').text('0');
					setInterval(function(){
						
						var curval=parseInt($('#counter').text());
						var curval1=parseInt($('#counter1').text());
						var curval2=parseInt($('#counter2').text());
						if(curval<<? echo $counttrip?>){
							$('#counter').text(curval+1);
						}
						if(curval1<<? echo $countmember?>){
							$('#counter1').text(curval1+1);
						}
						if(curval2<<? echo $countairplane?>){
							$('#counter2').text(curval2+1);
						}
					}, 2);
					
				}, 500);
			});
	</script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#menu').slicknav();
		
	});
	</script>
	
	<script type="text/javascript">
    $(document).ready(function(){
       
        var $menu = $("#menuF");
            
        $(window).scroll(function(){
            if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("default")
                           .addClass("fixed transbg")
                           .fadeIn('fast');
                });
            } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("fixed transbg")
                           .addClass("default")
                           .fadeIn('fast');
                });
            }
        });
	});
    //jQuery
	</script>
	<script>
		/*menu*/
		function calculateScroll() {
			var contentTop      =   [];
			var contentBottom   =   [];
			var winTop      =   $(window).scrollTop();
			var rangeTop    =   200;
			var rangeBottom =   500;
			$('.navmenu').find('a').each(function(){
				contentTop.push( $( $(this).attr('href') ).offset().top );
				contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
			})
			$.each( contentTop, function(i){
				if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
					$('.navmenu li')
					.removeClass('active')
					.eq(i).addClass('active');				
				}
			})
		};
		
		$(document).ready(function(){
			calculateScroll();
			$(window).scroll(function(event) {
				calculateScroll();
			});
			$('.navmenu ul li a').click(function() {  
				$('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 800);
				return false;
			});
		});		
	</script>	
	<script type="text/javascript" charset="utf-8">

		jQuery(document).ready(function(){
			jQuery(".pretty a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true, social_tools: ''});
			
		});
	</script>





<script>
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

function showTab() {

  var tablinks;
  tablinks = document.getElementsByClassName("tablinks");
  tablinks[0].click();

}    
</script>
	</body>
	
</html>