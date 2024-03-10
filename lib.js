/* Функции проверки значений обязательных для заполнения форм */

function check_character_field() {
    if ( ((event.keyCode < 1040) || (event.keyCode > 1103)) &&
         ((event.keyCode < 65) || (event.keyCode > 90)) &&
         ((event.keyCode < 97) || (event.keyCode > 122)) &&         
          (event.keyCode != 32) && 
          (event.keyCode != 45) ) { event.returnValue = false; };
}

function form_change_el(el, toShow) 
{
	if($(el).val() == '' || $(el).val() == -1 || $(el).val() == 0)
	{ if (toShow) { $(el).parent().find('.b-core-ui-select').addClass('error'); }; return false; }
	else 
	{ $(el).parent().find('.b-core-ui-select').removeClass('error');  return true;} 
}

function form_change_input(el, empty, eq, toShow) 
{      
    
    // Проверка телефона
    if  (!$(el).attr("name").indexOf('phone')) {                       
      if ( ( $(el).val().indexOf('+7') !== -1 ) || ( $(el).val().indexOf('+8') !== -1 ) ) { }
                else { if (toShow) { $(el).addClass('error'); }; return false; }
                
    }
    
    // Проверка даты рождения
    if  ($(el).attr("name").indexOf('age') >= 0) {  
        var value = $(el).val();
        console.log($(el).attr("name"));
        var re = /^\d{1,2}.\d{1,2}.\d{4}$/;
        if( re.test(value)){
                var adata = value.split('.');
                var dd = parseInt(adata[0],10);
                var mm = parseInt(adata[1],10);
                var yyyy = parseInt(adata[2],10);
                var xdata = new Date(yyyy,mm-1,dd);
                if ( ( xdata.getFullYear() == yyyy ) && ( xdata.getMonth () == mm - 1 ) && ( xdata.getDate() == dd ) ){
                        var maxdate = new Date();
                        var maxdate_value = new Date(maxdate.getFullYear(), maxdate.getMonth(), maxdate.getDate()).valueOf();
                        var mindate = new Date('1950-01-01');
                        var mindate_value = new Date(mindate.getFullYear(), mindate.getMonth(), mindate.getDate()).valueOf();
                        var date_value = new Date(xdata.getFullYear(), xdata.getMonth(), xdata.getDate()).valueOf();
                        if(date_value < maxdate_value && date_value > mindate_value){

                        }else{
                            if (toShow) { $(el).addClass('error');}; return false;
                        }
                }else{
                    if (toShow) { $(el).addClass('error');}; return false;
                }
        } else{
            if (toShow) { $(el).addClass('error');}; return false;
        }     
    }
    
    if(empty && $(el).val().length <= 0){
        if (toShow) { 
            $(el).addClass('error'); 
        }; return false; 
    }
	if(eq && $(el).val().length !== eq){  if (toShow) { $(el).addClass('error'); }; return false; }
	$(el).removeClass('error'); return true;
}

// Конец функций проверки значений обязательных для заполнения элементов

function cred_calc() {

 /*var credit_stav = 14;  

                        car_price = $('#price').html();
                        car_price = parseInt(car_price.replace(new RegExp(' ','g'),'')) ;
                            
			first_pay = parseInt($('#amount1').val()); 
			credit_term = parseInt($('#amount2').val());                                                

                        var month_pay = credit_stav/1200 * (car_price - first_pay) * -1 * Math.pow((1 + credit_stav/1200), credit_term) / (1 - Math.pow((1 + credit_stav/1200), credit_term));
                        month_pay = Math.round(month_pay);

                        if (car_price == first_pay) month_pay = 0;

			$("#amount3").val(month_pay + ' руб. в месяц'); */
}


function ready_first_pay_slider(slider_max, value) {

slider_max = slider_max.replace(new RegExp(' ','g'),'');

 $("#ui1").slider("destroy");

 if(value===undefined){
     value = slider_max*0.1;
 }
    $("#ui1").slider({
        range: "min",
        value: value,
        min: 1,
        max: slider_max,
        slide: function( event, ui ) { 
            $("#amount1" ).val( ui.value  + ' руб.'); 
            $("#credit-form input[name=first_pay]").val(ui.value  + ' руб.');
        }       
    });

     $("#amount1").val( $( "#ui1" ).slider( "value" ) + ' руб.' );

     $( "#amount1" ).keyup(function(){
		v = parseInt($(this).val());
		
		if(v > $( "#ui1" ).slider("option","max")){
			v = $( "#ui1" ).slider("option","max" );
			$( "#amount1" ).val( v + ' руб.' );
		}
		
		$( "#ui1" ).slider( "value", v );
	});

}

function ready_credit_term_slider() {

var value_slider = parseInt($("#amount2").val());

   $( "#ui2" ).slider({
      range: "min",
      value: value_slider,
      min: 24,
      max: 60,
      slide: function( event, ui ) {
        $( "#amount2" ).val( ui.value  + ' мес');
      }
    });
    $( "#amount2" ).val( $( "#ui2" ).slider( "value" ) + ' мес' );

	$( "#amount2" ).keyup(function(){
		v = parseInt($(this).val());
		
		if(v > $( "#ui2" ).slider("option","max")){
			v = $( "#ui2" ).slider("option","max" );
			$( "#amount2" ).val( v + ' мес' );
		}
		
		$( "#ui2" ).slider( "value", v );
	});
	
	if (($('#price').html())&&($('#price').html().indexOf('Цена руб.'))) {
	$('.ui-slider').mouseup(function() { cred_calc(); });
        $('.ui-slider').mouseover(function() { cred_calc(); });
        $('.ui-slider').mouseleave(function() { cred_calc(); });
        $('.ui-slider').click(function() { cred_calc(); });
	$('#amount1, #amount2').keyup(function(){ cred_calc(); });
        $('#amount1, #amount2').change(function(){ cred_calc(); });
        

 };
}

function ready_monthly_income_slider() {

var value_slider = parseInt($("#amount3").val());

   $( "#ui3" ).slider({
      range: "min",
      value: value_slider,
      min: 10000,
      max: 200000,
      step: 5000,
      slide: function( event, ui ) {
        $( "#amount3" ).val( ui.value  + ' руб.');
      }
    });
    $( "#amount3" ).val( $( "#ui3" ).slider( "value" ) + ' руб.' );

	$( "#amount3" ).keyup(function(){
		v = parseInt($(this).val());
		
		if(v > $( "#ui3" ).slider("option","max")){
			v = $( "#ui3" ).slider("option","max" );
			$( "#amount3" ).val( v + ' руб.' );
		}
		
		$( "#ui3" ).slider( "value", v );
	});
	       

 }



// Функция обновления списка моделей
function refresh_model_list(model_id,compl_id){

//Наименование выбранной марки
//$('.block1').html($("#credit-form select[name=brand_id]").parent().find('.b-core-ui-select__value').html());

var murl = '/ajax?action=getmodels';

$.get(murl+'&brand='+$('#credit-form select[name=brand_id]').val(), function(data) {

$('#credit-form select[name=model_id]').empty();
$('#credit-form select[name=model_id]').append(data);

//if (model_id) $('#credit-form select[name=model_id] option[value='+ model_id +']').attr("selected", "selected");

$("#credit-form select[name=model_id]").coreUISelect('update');

refresh_car_info();
                        		
});

}

function refresh_car_info() {
        //var carbrand = $("#credit-form select[name=brand_id]").parent().find('.b-core-ui-select__value').html();
        //var cartitle = $("#credit-form select[name=model_id]").parent().find('.b-core-ui-select__value').html();

        if ($('#credit-form select[name=model_id]').val()) {

                        /*cartitle = cartitle.replace(new RegExp(carbrand,'g'),'');
                        $(".car").find('h1').html(carbrand+' '+cartitle); 
                        $(".car").find('h1').removeClass('nonactive'); 
                        $(".car-mark").removeClass('nonactive'); */
                        
                        var murl = '/ajax?action=getimg'; 
                        $.get(murl+'&model='+$('#credit-form select[name=model_id]').val(), function(data) {                 
                            if (data) $('#carcolor').attr('src', data);                                  
                        });

                        var murl = '/ajax?action=getprice'; 
                        $.get(murl+'&model='+$('#credit-form select[name=model_id]').val(), function(data) {                 
                            if (data) 
                                {  $('#price').html(data + ' руб.');
                                   $("#credit-form input[name=price]").val(data); 
                                   ready_first_pay_slider(data);
                                   ready_credit_term_slider();
                                   cred_calc();
                                };
                                
                        });

                        }
                        else {
                      
                        $("#credit-form input[name=price]").empty();
                        $('#price').html('Цена руб.');
                        $('#carcolor').attr('src', 'car.png');
                        $("#ui1").slider("destroy");
                        $("#ui2").slider("destroy");
                        ready_first_pay_slider('1000000');
                        ready_credit_term_slider();
                        };

        
}
