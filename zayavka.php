<?php include "connect.php"; ?>
<?php
$city=$_POST['city'];
$summa=mysql_real_escape_string(strip_tags($_POST["sum"]));
//$email=mysql_real_escape_string(strip_tags($_POST["email"]));
//$user_email=mysql_real_escape_string(strip_tags($_POST["email"]));
$marka=mysql_real_escape_string(strip_tags($_POST["car_mark"]));
$fio=mysql_real_escape_string(strip_tags($_POST["fio"]));
//$gorod=mysql_real_escape_string(strip_tags(mb_strtolower($_POST["gorod"],"UTF-8")));
$phone=$_POST["phone"];
$comment=mysql_real_escape_string(strip_tags($_POST['comment']));
$email="nomail@autorow.ru";

$what=$_POST['what'];
$comment=$what." - заявка с дрома";
$phone=str_replace(" ","",$phone);
$phone=str_replace("-","",$phone);
$phone=str_replace("(","",$phone);
$phone=str_replace(")","",$phone);
$phone=str_replace("+","",$phone);

$region=$_POST['region'];

$direct=$_POST['direct'];


//$firstpay=$_POST['firstpay'];
$statusn="Союз-банк с дрома, ссылка -".$what." Телефон -".$phone;
$fio2=explode(" ", $fio);
$fam_fio=$fio2[0];
$name_fio=$fio2[1];
$otchestvo_fio=$fio2[2];
$phone_crm=$phone[0]."(".$phone[1]."".$phone[2]."".$phone[3].") ".$phone[4]."".$phone[5]."".$phone[6]."-".$phone[7]."".$phone[8]."".$phone[9]."".$phone[10];
$date_now1=date("Y-m-d");

/*
$query2="SELECT * FROM zayavka WHERE phone='".$phone."' AND date='".$date_now1."' AND firm=2";

$res=mysql_query($query2, $link) or die("Что-то пошло не так...: ".mysql_error());
while($row = mysql_fetch_array($res)) {
$summa2=$row['summa'];
$marka2=$row['marka'];
$fio2=$row['fio'];
$gorod2=$row['gorod'];
$phone2=$row['phone'];
$date = $row['date'];
} 

 $date_array=explode("-", $date);
 $date_now=$date_array[2];
 $date_cooldown_arr=getdate();
 $date_cooldown=$date_cooldown_arr['mday'];
 switch ($date_cooldown)
 {
 case 1:$date_cooldown="01";break;
 case 2:$date_cooldown="02";break;
 case 3:$date_cooldown="03";break;
 case 4:$date_cooldown="04";break;
 case 5:$date_cooldown="05";break;
 case 6:$date_cooldown="06";break;
 case 7:$date_cooldown="07";break;
 case 8:$date_cooldown="08";break;
 case 9:$date_cooldown="09";break;
 }
//$phone2=0;//заглушкка для проверки на занесенный номер в БД

	if ($phone==$phone2) 
		{
		header("Location:zaderzhka.php");
		} 
	else 
		{
		if ($summa==NULL OR $phone==NULL OR $fio==NULL OR strlen($fio)<3 OR strlen($summa)<3 OR strlen($phone)<3) 
			{//echo $_POST["sum"], $_POST["email"],$_POST["car_mark"],$_POST["fio"],$_POST["gorod"],$_POST["phone"],$_POST['comment'];
			header("Location: index.php");
			} 
		else 
			{
			if (preg_match('/[^0-9a-zA-Z]/', $fio)) {} else
			{ header("Location: index.php"); 
			}
			

*/
?>
<?php include "header.php"; ?>
<?php


/*
$query22="SELECT * FROM zayavki_schetchik WHERE id=2";
$res22=mysql_query($query22, $link) or die("Что-то пошло не так...: ".mysql_error());
while($row22 = mysql_fetch_array($res22)) {
$num=$row22['num'];
}

if ($city!="Томск" && $city!="Кемерово" && $city!="кемеровская область") {
switch ($num) {
case 1:{$num_now=2;$statusn="Это  заявка ".$statusn;}break;
case 2:{$num_now=3;$statusn="Это  заявка ".$statusn;}break;
case 3:{$num_now=1;}break;
}
}

//$statusn="пропущена - ".$statusn;
if ($city=="Томск" || $city=="Кемерово" || $city=="кемеровская область") {$gorod=$city;$statusn=" ".$statusn; $filial=2;}
$query="INSERT INTO zayavka (summa, marka, fio, gorod, phone, history, date, email, firm) 
VALUES('".$summa."', '".$marka."', '".$fio."', '".$gorod."', '".$phone."','".$statusn."', NOW(),'".$email."','2')";
$result=mysql_query($query, $link) or die("Что-то пошло не так5..: ".mysql_error());

if ($city!="Томск" && $city!="Кемерово" && $city!="кемеровская область") {
$query="UPDATE zayavki_schetchik SET num=".$num_now." WHERE id=2";
	$result=mysql_query($query, $link) or die("Что-то пошло не так4..: ".mysql_error());
}

//if ($city=="Томск") {
//$comment="Томск ".$comment;
//$curl = curl_init();
//curl_setopt($curl, CURLOPT_URL, 'http://novosibirsk.crm-credit.ru/client/create_far');
//curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
//curl_setopt($curl, CURLOPT_POST, true);
//curl_setopt($curl, CURLOPT_POSTFIELDS, "source=1&enabled=1&car_mark=".$_POST['car_mark']."&quick=1&type=1&comment=".$comment."&region=42&first_name=".$name_fio."&last_name=".$fam_fio."&phone=".$phone_crm."&email=".$email."&summ=".$_POST['sum']);
//curl_setopt($curl, CURLOPT_HEADER, true);
//curl_exec($curl);
//curl_close($curl);
//}
//else {
//заливка на фин

if ($num<3) {
	
$firm=2;

} else {
//что бы пошло распределение нужно поставить source=1
$firm=2;

}

*/
$istochnik=12;

if($city=="Приморский край" or $city=="Владивосток" or $city=="Хабаровский край" or $city=="Хабаровск")
{
	$filial=644;
	$istochnik=11;
	
}
	else
{
	$filial=0;	
}

$what=$_POST['car_mark']."-".$what."-LOKO";
$post_data = array(
"avto"=>$what,
"fio"=>$fio,
"summa"=>$_POST['sum'],
"phone"=>$phone,
"mail"=>"nomail",
"manager"=>"0",
"city"=>$city,
"firm"=>2,
"filial"=>$filial,
"istochnik"=>$istochnik,
"submit"=>"submit"
);
 
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://crm.vipautosale.ru/manager/curl_zayavka_new.php');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_exec($curl);
curl_close($curl);



//в новую crm
$comment=" ".$comment;
$what=$marka.' '.$model."-".$comment;
$post_data = array(
"avto"=> $what."-loko",
"fio"=>$name_fio." ".$fam_fio,
"summa"=>$summa,
"phone"=>$phone,
"mail"=>$email,
"manager"=>0,
"city"=>$city,
"firm"=>2,
"filial"=>$filial,
"istochnik"=>"Drom.ru СоюзБанк",
"submit"=>"submit",
"region"=>$region
);

//print_r($post_data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://avtoaukcion.online/blank_avtokredit_save');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($curl, CURLOPT_HEADER, true);
curl_exec($curl);
 curl_close($curl); 

//}
//} else {$city_marker=1;}

$message='Источник :zayavka-na-avtokredit-v-bank.ru/loko '.$_POST['source'].'<br />';
$message .='ФИО :'.$fio.'<br />';
$message .='Телефон: '.$phone.'<br />';
$message .='Марка: '.$marka.'<br />';
$message .= 'Сумма: ' . $summa . '<br />';
$message .= 'Первоначальный взнос: ' . $firstpay . '<br />';
$message .= 'Пояснение: ' . $statusn . '<br />';


$message2='Здравствуйте! Вы получили это письмо, так как оставили заявку на на сайте zayavka-na-avtokredit-v-bank.ru. В ближайшее время наши менеджеры свяжутся с Вами! <br />';



if ($user_email!=Null) {mail($user_email, "Ваша заявка принята на рассмотрение!", $message2, $headers);}
?>
			<article class="post article" style="margin:0 auto;">
                                <h2 class="postheader">Ваша Заявка на кредит успешно отправлена!</h2>
                                <div class="postcontent postcontent-0 clearfix">
								<p>
								Уважаемый(ая) <?php echo $num, $name_fio; ?>! Наши менеджеры свяжутся с Вами в ближайшее время!
								<br/></p>
								<p>
								<b>Сейчас Вы будете перенаправлены на главную страницу!</b>
								
								<?php // echo $query2; 
								//echo "source=191&enabled=1&car_mark=".$_POST['car_mark']."&quick=1&type=8&comment=".$comment."&region=".$region."&first_name=".$name_fio."&last_name=".$fam_fio."&phone=".$phone_crm."&email=".$email."&summ=".$_POST['summ'];
								?>
						
						<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter27204806 = new Ya.Metrika({id:27204806,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/27204806" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
						
						</article>
						<script language="JavaScript" type="text/javascript">
function GoNah(){ 
 location="http://creditodobrim.ru/souzbank"; 
} 
setTimeout( 'GoNah()', 10000 ); 
</script>
					
<?php 
//}}
  include "footer.php"; ?>
