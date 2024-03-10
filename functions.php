<?php

if ($_SESSION['login']!=NULL){
$status="yes";
} else {$status="no";}

function connectToDB() {
  global $link, $dbhost, $dbuser, $dbpass, $dbname;
  ($link = mysql_pconnect("$dbhost", "$dbuser", "$dbpass")) || die("Couldn't connect to MySQL");
  mysql_query("set NAMES 'UTF8'");
  mysql_select_db("$dbname", $link) || die("Couldn't open db: $dbname. Error if any was: ".mysql_error() );
} 

function mobile_detect()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    $ipod = strpos($user_agent,"iPod");
    $iphone = strpos($user_agent,"iPhone");
    $android = strpos($user_agent,"Android");
    $symb = strpos($user_agent,"Symbian");
    $winphone = strpos($user_agent,"WindowsPhone");
    $wp7 = strpos($user_agent,"WP7");
    $wp8 = strpos($user_agent,"WP8");
    $operam = strpos($user_agent,"Opera M");
    $palm = strpos($user_agent,"webOS");
    $berry = strpos($user_agent,"BlackBerry");
    $mobile = strpos($user_agent,"Mobile");
    $htc = strpos($user_agent,"HTC_");
    $fennec = strpos($user_agent,"Fennec/");

    if ($ipod || $iphone || $android || $symb || $winphone || $wp7 || $wp8 || $operam || $palm || $berry || $mobile || $htc || $fennec) 
    {
        return true; 
    } 
    else
    {
        return false; 
    }
}

function newUser($login, $password, $user_tip) {
  global $link;

  $query="INSERT INTO users (login, password, user_tip) VALUES('$login', '$password','$user_tip')";
  $result=mysql_query($query, $link) or die("Died inserting login info into db.  Error returned if any: ".mysql_error());
  
 

  return true;
} 



function displayErrors($messages) {
  print("<b>Возникли следующие ошибки:</b>\n<ul>\n");

  foreach($messages as $msg){
    print("<li>$msg</li>\n");
  }
  print("</ul>\n");
} 




function checkLoggedIn($status){
  switch($status){
    case "yes":
      if(!isset($_SESSION["loggedIn"])){
        header("Location: login.php");
        exit;
      }
      break;
    case "no":
      if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true ){
        header("Location: members.php");
      }
      break;
  }
  return true;
} 



function checkPass($login, $password) {
  global $link;

  $query="SELECT login, password, user_tip FROM users WHERE login='$login' and password='$password'";
  $result=mysql_query($query, $link)
    or die("checkPass fatal error: ".mysql_error());

  if(mysql_num_rows($result)==1) {
    $row=mysql_fetch_array($result);
    return $row;
  }
  return false;
} 


function cleanMemberSession($login, $password, $user_tip) {
  $_SESSION["login"]=$login;
  $_SESSION["password"]=$password;
  $_SESSION["user_tip"]=$user_tip;
  $_SESSION["loggedIn"]=true;
} 


function flushMemberSession() {
  unset($_SESSION["login"]);
  unset($_SESSION["password"]);
  unset($_SESSION["loggedIn"]);
  unset($_SESSION["user_tip"]);
  session_destroy();
  return true;
} 

function field_validator($field_descr, $field_data, $field_type, $min_length="", $max_length="", $field_required=1) {

  global $messages;

  if(!$field_data && !$field_required){ return; }

  $field_ok=false;

  $email_regexp="/([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|/";
  $email_regexp.="/(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";

  $data_types=array(
    "email"=>$email_regexp,
    "digit"=>"/[0-9]$/",
    "number"=>"/[0-9]+$/",
    "alpha"=>"/[a-zA-Z]+$/",
    "alpha_space"=>"/[a-zA-Z ]+$/",
    "alphanumeric"=>"/[a-zA-Z0-9]+$/",
    "alphanumeric_space"=>"/[a-zA-Z0-9 ]+$/",
    "string"=>""
  );

  if ($field_required && empty($field_data)) {
    $messages[] = "Поле $field_descr является обезательным";
    return;
  }

  if ($field_type == "string") {
    $field_ok = true;
  } else {
    $field_ok = preg_match($data_types[$field_type], $field_data);
  }

  if (!$field_ok) {
    $messages[] = "Пожалуйста введите нормальный $field_descr.";
    return;
  }

  if ($field_ok && ($min_length > 0)) {
    if (strlen($field_data) < $min_length) {
      $messages[] = "$field_descr должен быть не короче $min_length символов.";
      return;
    }
  }

  if ($field_ok && ($max_length > 0)) {
    if (strlen($field_data) > $max_length) {
      $messages[] = "$field_descr не должен быть длиннее $max_length символов.";
      return;
    }
  }
}

function sidebarLogin($status){

  switch($status){
    case "yes": {
        echo "Добро пожаловать <b>".$_SESSION["login"]."</b>!<br />";
		echo "Ваш пароль: <b>".$_SESSION["password"]."</b><br />";
		echo "Вы зарегистированны, как:".$_SESSION["user_tip"];
		echo "<br /><a href=\"logout.php"."\">Выход</a>";
        
      }
      break;
    case "no":
      {
        echo '
							<form action="login.php" method="POST">
								<table>
								<tr><td>Логин:</td><td><input type="text" name="login" maxlength="15" /></td></tr>
								<tr><td>Пароль:</td><td><input type="password" name="password" maxlength="15"></td></tr>
								</table>
								<div><a href="join.php">Регистрация</a></div>
								<input name="submit" type="submit" value="Войти"/>
								</form>';
      }
      break;
  }
  return true;
}

function soiskatel($id){
 global $link;
  
  //$query='SELECT id FROM users WHERE login="'.$id.'"';
  //echo $query;
  //$result=mysql_query($query) or die("Died inserting login info into db.  Error returned if any: ".mysql_error());
  //$zapros=mysql_fetch_array($result);
  //$id=$zapros[0];
  
  $query2="SELECT * FROM soiskatel WHERE soiskatel_id='".$id."'";
  $result2=mysql_query($query2) or die("ошибочка вышла: ".mysql_error());
  //if ($zapros==NULL)
  $zapros2=mysql_fetch_array($result2);
  if ($zapros2==0) {header("Location: soiskatel_edit.php");} else {
  $soiskatel_id=$zapros2[0];
  $foto=$zapros2[7];
  if ($soiskatel_id==0) {$name="Вам нужно заполнить поле ФИО в профиле";}
  else {
  $name=$zapros2[1];
  echo $name;
}
}
echo "Адрес: ".$soiskatel_id, $foto;
  return true;
}

function newSoiskatelProfile($soiskatel_id, $soiskatel_name, $soiskatel_data_publicacii, $soiskatel_birthday, $soiskatel_pol, $soiskatel_dolgnost, $soiskatel_zarplata, $soiskatel_foto, $soiskatel_rajon, $soiskatel_semejnoe_polozhenie, $soiskatel_obrazovanie, $soiskatel_phone, $soiskatel_email, $soiskatel_prava, $soiskatel_avtomobil, $soiskatel_rezume, $soiskatel_opit, $soiskatel_obr_polnoe, $soiskatel_komp, $soiskatel_motiv, $sfera) {
  global $link;

  $query="INSERT INTO soiskatel (soiskatel_id, soiskatel_name, soiskatel_data_publicacii, soiskatel_birthday, soiskatel_pol, soiskatel_dolgnost, soiskatel_zarplata, soiskatel_foto, soiskatel_rajon, soiskatel_semejnoe_polozhenie, soiskatel_obrazovanie, soiskatel_phone, soiskatel_email, soiskatel_prava, soiskatel_avtomobil, soiskatel_rezume, soiskatel_opit, soiskatel_obr_polnoe, soiskatel_komp, soiskatel_motiv) VALUES('".$soiskatel_id."', '".$soiskatel_name."', '".$soiskatel_data_publicacii."', '".$soiskatel_birthday."', '".$soiskatel_pol."', '".$soiskatel_dolgnost."', '".$soiskatel_zarplata."', '".$soiskatel_foto."', '".$soiskatel_rajon."', '".$soiskatel_semejnoe_polozhenie."', '".$soiskatel_obrazovanie."', '".$soiskatel_phone."', '".$soiskatel_email."', '".$soiskatel_prava."', '".$soiskatel_avtomobil."', '".$soiskatel_rezume."', '".$soiskatel_opit."', '".$soiskatel_obr_polnoe."', '".$soiskatel_komp."', '".$soiskatel_motiv."', '".$sfera."')";
  $result=mysql_query($query, $link) or die("Что-то пошло не так...: ".mysql_error());
  
 

  return true;
} 

function autocount($id){
 global $link;
  
 $res = mysql_query("SELECT COUNT(*) FROM automobil");
 $row = mysql_fetch_row($res);
 $total = $row[0]; // всего записей
 echo $total;

}

function zayavkacount($id){
 global $link;
  
 $res = mysql_query("SELECT COUNT(*) FROM zayavka");
 $row = mysql_fetch_row($res);
 $total = $row[0]; // всего записей
 $total=$total+821;
 echo $total;

}

function autocategory($id){
 global $link;
 $rs="SELECT * FROM mark WHERE m_pid='0' ORDER BY m_name ASC LIMIT 46";
 $res = mysql_query($rs);
 echo "<table style='border:2px solid #fff;'><tr><td style='border:2px solid #fff;width:175px;'>";
 while($row = mysql_fetch_array($res)) {
 $num_a=0;
 $cat_id = $row['m_id']; // всего записей
 $cat_name=$row['m_name'];
	$rs_a="SELECT * FROM automobil WHERE category='".$cat_name."'";
	$res_a = mysql_query($rs_a);
		while($row_a = mysql_fetch_array($res_a)) {
		$num_a=$num_a+1;
		}
 //if ($num_a==0) {} else {
 if ($num_cat==12) {echo "</td><td style='border:2px solid #fff;width:175px;'>";} if ($num_cat==24) {echo "</td><td style='border:2px solid #fff;width:175px;'>";} if ($num_cat==36) {echo "</td><td style='border:2px solid #fff;width:175px;'>";}
 echo "<div class='cat_name'><a href='avto_list.php?id=".$cat_id."' title='продажа автомобилей марки ".$cat_name." в Новосибирске' alt='продажа автомобилей марки ".$cat_name." в Новосибирске' >".$cat_name."</a> (".$num_a.")</div>";$num_cat=$num_cat+1;
}
//}
echo "</td></tr></table>";
}

function autocategory_gruz($id){
 global $link;
 $rs="SELECT * FROM autocategory WHERE tip='".$id."'";
 $res = mysql_query($rs);
 echo "<table style='border:2px solid #fff;'><tr><td style='border:2px solid #fff;width:175px;'>";
 while($row = mysql_fetch_array($res)) {
 $num_a=0;
 $cat_id = $row['id']; // всего записей
 $cat_name=$row['category_name'];
	$rs_a="SELECT * FROM automobil WHERE category='".$cat_id."'";
	$res_a = mysql_query($rs_a);
		while($row_a = mysql_fetch_array($res_a)) {
		$num_a=$num_a+1;
		}
 
 if ($num_cat==6) {echo "</td><td style='border:2px solid #fff;width:175px;'>";} if ($num_cat==12) {echo "</td><td style='border:2px solid #fff;width:175px;'>";} if ($num_cat==18) {echo "</td><td style='border:2px solid #fff;width:175px;'>";}
 echo "<div class='cat_name'>".$cat_name." (".$num_a.")</div>";$num_cat=$num_cat+1;
}
echo "</td></tr></table>";
}

function smtpmail($mail_to, $subject, $message, $headers='') {
	global $config;
	$SEND =	"Date: ".date("D, d M Y H:i:s") . " UT\r\n";
	$SEND .=	'Subject: =?'.$config['smtp_charset'].'?B?'.base64_encode($subject)."=?=\r\n";
	if ($headers) $SEND .= $headers."\r\n\r\n";
	else
	{
			$SEND .= "Reply-To: ".$config['smtp_username']."\r\n";
			$SEND .= "MIME-Version: 1.0\r\n";
			$SEND .= "Content-Type: text/plain; charset=\"".$config['smtp_charset']."\"\r\n";
			$SEND .= "Content-Transfer-Encoding: 8bit\r\n";
			$SEND .= "From: \"".$config['smtp_from']."\" <".$config['smtp_username'].">\r\n";
			$SEND .= "To: $mail_to <$mail_to>\r\n";
			$SEND .= "X-Priority: 3\r\n\r\n";
	}
	$SEND .=  $message."\r\n";
	 if( !$socket = fsockopen($config['smtp_host'], $config['smtp_port'], $errno, $errstr, 30) ) {
		if ($config['smtp_debug']) echo $errno."&lt;br&gt;".$errstr;
		return false;
	 }

	if (!server_parse($socket, "220", __LINE__)) return false;

	fputs($socket, "HELO " . $config['smtp_host'] . "\r\n");
	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить HELO!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "AUTH LOGIN\r\n");
	if (!server_parse($socket, "334", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу найти ответ на запрос авторизаци.</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, base64_encode($config['smtp_username']) . "\r\n");
	if (!server_parse($socket, "334", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Логин авторизации не был принят сервером!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, base64_encode($config['smtp_password']) . "\r\n");
	if (!server_parse($socket, "235", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Пароль не был принят сервером как верный! Ошибка авторизации!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "MAIL FROM: <".$config['smtp_username'].">\r\n");
	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить комманду MAIL FROM: </p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "RCPT TO: <" . $mail_to . ">\r\n");

	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить комманду RCPT TO: </p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "DATA\r\n");

	if (!server_parse($socket, "354", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не могу отправить комманду DATA</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, $SEND."\r\n.\r\n");

	if (!server_parse($socket, "250", __LINE__)) {
		if ($config['smtp_debug']) echo '<p>Не смог отправить тело письма. Письмо не было отправленно!</p>';
		fclose($socket);
		return false;
	}
	fputs($socket, "QUIT\r\n");
	fclose($socket);
	return TRUE;
}

function server_parse($socket, $response, $line = __LINE__) {
	global $config;
	while (@substr($server_response, 3, 1) != ' ') {
		if (!($server_response = fgets($socket, 256))) {
			if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
 			return false;
 		}
	}
	if (!(substr($server_response, 0, 3) == $response)) {
		if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
		return false;
	}
	return true;
}

?>