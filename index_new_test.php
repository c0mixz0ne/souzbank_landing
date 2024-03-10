<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Заявка на кредит 1</title>

  <!--css-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans+Caption" rel="stylesheet">

  <!--js-->
  
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  
   <script src="toastr.min.js"></script>
   <link rel="stylesheet" href="toastr.css">
  

    <script type="text/javascript" src="f.js" ></script>
  <script type="text/javascript" src="lib.js"></script>

</head>
<body>
  <div class="container">
   <div class="row">
    <div class="col-12 col-sm-2 col-md-2 col-lg-2">
     <img src="img/Лого.jpg" class="img-fluid" alt="">
   </div>
   <div class="col-10 d-none d-sm-block col-sm-10 col-md-10 col-lg-10 align-self-end">
     <img style="width: 50%;padding-bottom: 1em;" src="img/В шаге от мечты.png"  alt="">
   </div>
 </div>
</div>

<div class="container">
	<div class="row">
		<div style="margin-top: 2em;margin-bottom: 2em;" class="col text-center">
			<h1 class="bluetext">Просто заполните заявку на кредит</h1>
			<h3 class="bluetext">Решение за 3 часа!</h3>
		</div>
	</div>
</div>

<div class="backgroundballs">
	<div class="container">
		<div class="row">
     <form id="credit-form" action="zayavka.php" method="post" >
                <input type="hidden" name="age" value="11.11.1980">
            <?php if (isset($_GET['photo'])) { ?>
                        <input type="hidden" name="sum" value="<?php echo $sum; ?>">
                        <input type="hidden" name="car_mark" value="<?php echo $maker." ".$model.", ".$year."г."; ?>">
            <?php } ?>
            <input type="hidden" name="city" value="<?php echo $_GET['city'];?>" />
            <input type="hidden" name="region" value="<?php echo $_GET['region'];?>" />
             <input type="hidden" name="what" value="<?php 
     $url_adr_arr=explode("/",$photo1);
     echo "http://novosibirsk.drom.ru/".$maker."/".$model."/".$url_adr_arr[7].".html"; ?>" id="what" />
     <?php
    $date_style=date('Y-m-d');
    ?>
  <div class="car-pic">
  <?php if(isset($_GET['photo'])) 
    { 
    $photo1=$_GET['photo'];
    $photo1=str_replace('%3A%2F%2F','://',$photo1);
    $photo1=str_replace('%2F4%2F','/',$photo1);
    $photo1=str_replace('%2F','/',$photo1);
    $photo=$photo1;
    } else 
    {
    $photo='img/car.jpg';
    }
    ?>

    <img class="d-block d-sm-block d-md-none d-lg-none" style="width: 100%; height: 30%;margin-top: 1em;z-index: 5" src="img/mask.png" alt="">
    <img class="d-block d-sm-block d-md-none d-lg-none" style="position: absolute;width: 90%;margin-top: 1.5em;margin-left: 1.2em;margin-right: 1.2em;margin-bottom: 1.5em;border-radius: 5px;" src="<?php echo $photo; ?>" alt="">

      <div class="clr"></div>
            
                    </div>
 

  <?php if(isset($_GET['maker'])) { $maker=$_GET['maker'];$model=$_GET['model'];$year=$_GET['year'];$sum=$_GET['sum'];
            ?>

     <span class="d-block d-sm-block d-md-none d-lg-none whitetext" style="z-index: 10;margin-top: -4em;margin-left: 3em"><?php echo $maker." ".$model.", ".$year."г."; ?></span>
<?php } else
  {?>
 <span class="d-block d-sm-block d-md-none d-lg-none whitetext" style="z-index: 10;margin-top: -4em;margin-left: 3em">Mustang GT</span>

  <?php } 
  ?>

     <div class="col-12 d-block d-sm-block d-md-none d-lg-none">
       <input style="line-height: 2em;" type="text" class="form-control mt-3" name="fio" placeholder="Фамилия, имя и отчество*" aria-label="Username" aria-describedby="sizing-addon1">
        <input style="line-height: 2em;" type="text" class="form-control mt-1" name="phone" id="phone" placeholder="Мобильный телефон" aria-label="Username" aria-describedby="sizing-addon1">
         <?php if (isset($_GET['sum'])) {
      ?>
         <input style="line-height: 2em;"  name="sum" type="text" <?php echo('value="'.$_GET['sum'].'"');?> class="form-control mt-1" placeholder="Сумма кредита*" aria-label="Username" aria-describedby="sizing-addon1">
         <?php
          } else {
    ?>
    <input style="line-height: 2em;"  name="sum" type="text" class="form-control mt-1" placeholder="Сумма кредита*" aria-label="Username" aria-describedby="sizing-addon1">

      <?php
    }
    ?>

          <div class="col-12 text-center d-block d-sm-block d-md-none d-lg-none">
              <button
  type="button" class="submit fields4 btn redbutton btn-lg mt-5" <?php if (isset($_GET['photo'])) { ?> onClick="send_fields_credit()"<?php } else { ?> onClick="pure_send_fields_credit()"<?php } ?> name="send_button">
    Получить кредит
  </button>
          </div>
<?php if (isset($_GET['photo'])) {
            $sum2=$_GET['sum'];
            ?>
  <?php }?>
   </form>

     </div>




			<div class="col-7 d-none d-sm-none d-md-block d-lg-block">

       <form id="credit-form" action="zayavka.php" method="post" >
                <input type="hidden" name="age" value="11.11.1980">
            <?php if (isset($_GET['photo'])) { ?>
                        <input type="hidden" name="sum" value="<?php echo $_GET['sum'];?>">
                        <input type="hidden" name="car_mark" value="<?php echo $maker." ".$model.", ".$year."г."; ?>">
            <?php } ?>
            <input type="hidden" name="city" value="<?php echo $_GET['city'];?>" />
            <input type="hidden" name="region" value="<?php echo $_GET['region'];?>" />
             <input type="hidden" name="what" value="<?php 
     $url_adr_arr=explode("/",$photo1);
     echo "http://novosibirsk.drom.ru/".$maker."/".$model."/".$url_adr_arr[7].".html"; ?>" id="what" />
     <?php
    $date_style=date('Y-m-d');
    ?>
       <div class="input-group input-group-lg">
        <input style="line-height: 2.3em;" type="text" name="fio" class="form-control mt-5" placeholder="Фамилия, имя и отчество*" aria-label="Username" aria-describedby="sizing-addon1">
      </div>
      <div class="row">
        <div class="col-6">
         <div class="input-group input-group-lg">
          <input style="line-height: 2.3em;" type="text" name="phone" id="phone" class="form-control mt-3" placeholder="Мобильный телефон*" aria-label="Username" aria-describedby="sizing-addon1">
        </div>
      </div>
      <div class="col-6">
       <div class="input-group input-group-lg">
       <?php if (isset($_GET['sum'])) {
      ?>
        <input style="line-height: 2.3em;" type="text" class="form-control mt-3" <?php echo('value="'.$_GET['sum'].'"');?> placeholder="Сумма кредита" aria-label="Username" aria-describedby="sizing-addon1">
<?php
      
    } else {
    ?>
    <input style="line-height: 2.3em;" type="text" class="form-control mt-3"  placeholder="Сумма кредита" aria-label="Username" aria-describedby="sizing-addon1">

    <?php
    }
    ?>

      </div>
    </div>
  </div>
  <div class="col-12 mt-2">
    <!--<input type="checkbox" aria-label="Checkbox for following text input">-->
    <img style="width: 2em;padding-right: 0.5em;" src="img/Галка.png" alt="">
    <span class="whitetext">Я принимаю условия передачи информации</span>
  </div>
  <div class="col-12">
    <button
  type="button" class="submit fields4 btn redbutton btn-lg mt-5" <?php if (isset($_GET['photo'])) { ?> onClick="send_fields_credit()"<?php } else { ?> onClick="pure_send_fields_credit()"<?php } ?> name="send_button">
    Получить кредит
  </button>
  </div>

   <?php if (isset($_GET['photo'])) {
            $sum2=$_GET['sum'];
            ?>
  <?php } ?>


  </form>
</div>
<div class="col-5 d-none d-sm-none d-md-block d-lg-block align-self-center">


              <div class="car-pic">
  <?php if(isset($_GET['photo'])) 
    { 
    $photo1=$_GET['photo'];
    $photo1=str_replace('%3A%2F%2F','://',$photo1);
    $photo1=str_replace('%2F4%2F','/',$photo1);
    $photo1=str_replace('%2F','/',$photo1);
    $photo=$photo1;
    } else 
    {
    $photo='img/car.jpg';
    }
    ?>
 <img style="position: absolute;margin-top: -8em;width: 100%;padding-left: 1.2em;padding-right: 1.2em;padding-top: 0.3em;padding-bottom: 0.3em" src="<?php echo $photo; ?>" alt="" class="">
 <img style="margin-top: -8em;z-index: 10;position: absolute;" src="img/mask.png" class="img-fluid" alt="">


     <div class="clr"></div>
            
                    </div>
    <?php if(isset($_GET['maker'])) { $maker=$_GET['maker'];$model=$_GET['model'];$year=$_GET['year'];$sum=$_GET['sum'];
            ?>

 <span class="whitetext d-none d-sm-flex" style="position: absolute;margin-top:8.7em; left: 40%; z-index: 20;font-size: 1em;font-weight: 600;"><?php echo $maker." ".$model.", ".$year."г."; ?></span>
 <?php } else
  {?>

  <span class="whitetext d-none d-sm-flex" style="position: absolute;margin-top:8.7em; left: 40%; z-index: 20;font-size: 1em;font-weight: 600;">Mustang GT</span>

  <?php } 
  ?>

</div>
</div>
</div>
</div>

<!--<div class="container">
	<div class="row">
		<div class="col-6 text-center">
			<h3 class="bluetext mt-4">Заявки на рассмотрении</h3>

			<table class="table table-sm text-left">
        <thead>
          <tr  class="whitetext darggreybcg">
            <th>#заявки</th>
            <th>автомобиль</th>
            <th>цена</th>
            <th>регион</th>
          </tr>
        </thead>
        <tbody>
          <tr class="tabledark whitetext">
            <th scope="row">A1992</th>
            <td>Touareg</td>
            <td>1 000 000р</td>
            <td>Новосибирск</td>

          </tr>
          <tr class="tablelight whitetext">
            <th scope="row">A1992</th>
            <td>Touareg</td>
            <td>1 000 000р</td>
            <td>Новосибирск</td>
          </tr>
          <tr class="tabledark whitetext">
            <th scope="row">A1992</th>
            <td >Touareg</td>
            <td>1 000 000р</td>
            <td>Новосибирск</td>
          </tr>
          <tr class="tablelight whitetext">
            <th scope="row">A1992</th>
            <td>Touareg</td>
            <td>1 000 000р</td>
            <td>Новосибирск</td>
          </tr>
          <tr class="tabledark whitetext">
            <th scope="row">A1992</th>
            <td >Touareg</td>
            <td>1 000 000р</td>
            <td>Новосибирск</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-6 text-center">
     <h3 class="bluetext mt-4">Решение по кредиту</h3>

     <table class="table table-sm text-left">
      <thead>
        <tr  class="whitetext darggreybcg">
          <th>#заявки</th>
          <th>автомобиль</th>
          <th>цена</th>
          <th>регион</th>
        </tr>
      </thead>
      <tbody>
        <tr class="tablered whitetext">
          <th scope="row">A1992</th>
          <td>Touareg</td>
          <td>1 000 000р</td>
          <td>Новосибирск</td>

        </tr>
        <tr class="tablegreen whitetext">
          <th scope="row">A1992</th>
          <td>Touareg</td>
          <td>1 000 000р</td>
          <td>Новосибирск</td>
        </tr>
        <tr class="tablered whitetext">
          <th scope="row">A1992</th>
          <td >Touareg</td>
          <td>1 000 000р</td>
          <td>Новосибирск</td>
        </tr>
        <tr class="tablered whitetext">
          <th scope="row">A1992</th>
          <td>Touareg</td>
          <td>1 000 000р</td>
          <td>Новосибирск</td>
        </tr>
        <tr class="tablegreen whitetext">
          <th scope="row">A1992</th>
          <td >Touareg</td>
          <td>1 000 000р</td>
          <td>Новосибирск</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>-->

<div class="d-none row justify-content-center">
  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
   <p class="smalltext text-center mt-4">Оставляя заявку на данной странице, я осознанно даю свое согласие на использование, хранение и обработку моих персональных данных Компанией - организатор акции, а также партнерами Компании с целью получения мною информации о продуктах и услугах Компании и ее партнеров. Под персональными данными подразумевается любая информация, относящаяся к субъекту персональных данных, т.е. ко мне, относимая Федеральным законом от 27 июля 2006 года № 152-ФЗ «О персональных данных» к категории персональных данных. Для отзыва согласия на обработку моих персональных данных мною будет отправлено письмо в свободной форме на почтовый адрес Компании. Хранение, обработка и использование моих данных будет производиться в соответствии с политикой конфиденциальности Компании.</p>
 </div>
</div>
</div>



<script type="text/javascript">

function check_fields_credit(toShow) {
    
    var flag = true;
    
            fio = $("#credit-form input[name=fio]");
        age = $("#credit-form input[name=age]");
    phone = $("#credit-form input[name=phone]");
    s7 = $("#credit-form select[name=address]");
  marka=$("#credit-form select[name=car_mark]");
  sum=$("#credit-form select[name=sum]");
        send_button = $('#credit-form button[name=send_button]');

        var all_elements = 4; var proc = 0;
        
            if(!form_change_input(fio, true, false, toShow)){ flag = false; } else { proc++; };
        if(!form_change_input(age, true, false, toShow)){ flag = false;} else { proc++; };
    if(!form_change_input(phone, true, false, toShow)){flag = false;} else { proc++; };
    if(!form_change_el(s7,toShow)){ flag = false; } else { proc++; };    

        $(send_button).find('.submit-bar').css({'width': 20 + (20*proc)+'%'});
              
    if(proc == all_elements) {           
            send_button.addClass('p100');
            return true;
    }
        
        send_button.removeClass('p100');
    return false;
}

function send_fields_credit() {

    send_button = $('#credit-form button[name=send_button]');
    $('#info-block').html('');
   // if (check_fields_credit(1)) 
   // {
        $("#credit-form input[name=credit_term]").val($("#amount2").val());
        $("#credit-form input[name=month_inc]").val($("#amount3").val());
        $("#credit-form input[name=car_img]").val($('#carcolor').attr('src'));

        // if ($('.sms input[type=checkbox]').attr('checked') == 'checked') {
            send_button.removeAttr("onclick");
            $('#credit-form').submit();
        // } else {
            // $('#info-block').html('Пожалуйста, дайте свое согласие на СМС-информирование и повторно нажмите "отправить заявку"');
        // }    
   // }
}

function pure_send_fields_credit() {

  // console.log(1);
    send_button = $('#credit-form button[name=send_button]');
    $('#info-block').html('');
   
        $("#credit-form input[name=credit_term]").val($("#amount2").val());
        $("#credit-form input[name=month_inc]").val($("#amount3").val());
        $("#credit-form input[name=car_img]").val($('#carcolor').attr('src'));

        // if ($('.sms input[type=checkbox]').attr('checked') == 'checked') {
            send_button.removeAttr("onclick");
            $('#credit-form').submit();
        // } else {
            // $('#info-block').html('Пожалуйста, дайте свое согласие на СМС-информирование и повторно нажмите "отправить заявку"');
        // }    
   
}


  function random_message() {
    
    var names = [
      "Анна",
      "Виктор",
      "Екатерина",
      "Михаил",
      "Григорий",
      "Вероника",
      "Александр",
      "Мария",
      "Евгений",
      "Кирилл",
      "Роман",
      "Вячеслав",
      "Никита",
      "Константин",
      "Людмила"
    ];
    
    var towns = [
      "Новосибирск",
      "Владивосток",
      "Кемерово"
    ];

  var randomName = names[Math.floor(Math.random()*names.length)];
  var randomtown = towns[Math.floor(Math.random()*towns.length)];
  
    var sum= 350000 + (20 * Math.floor(Math.random()*(970000-350000)/20) );
  
  
  var text=randomName+' ('+randomtown+')'+', сумма кредита: '+sum.toLocaleString() +' руб.';
  // console.log(text);
    
  toastr.success('Одобрена заявка!', text);
  
  }

$(document).ready(function(){
  
  toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false, 
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "30000",
        "hideDuration": "100000",
        "timeOut": "12000",
        "extendedTimeOut": "100000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

    
  setInterval(random_message, 10000); // Time in milliseconds
  

$("#credit-form input[name=fio]").keypress(function() { check_character_field(); } );
$("#credit-form input[name=phone]").mask("+9 (999) 999-9999");
//$('#credit-form input[name=age]').mask("99.99.9999");

$("#credit-form").mousemove(function(){ check_fields_credit(); });
$('#credit-form select[name=address]').change(function(){ check_fields_credit(); });

$("#credit-form select[name=brand_id]").change(function(){ refresh_model_list(); });
$("#credit-form select[name=model_id]").change(function(){ refresh_car_info(); });

ready_first_pay_slider('1000000');
ready_credit_term_slider();
ready_monthly_income_slider();


});

</script> 



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
<?/*?>
<script type="text/javascript" src="//api.venyoo.ru/wnew.js?wc=venyoo/default/science&widget_id=5291731624394752"></script>
<?*/?>

   <!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter37305965 = new Ya.Metrika({
                    id:37305965,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/37305965" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->     
</body>
</html>