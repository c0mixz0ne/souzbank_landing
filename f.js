$(document).ready(function(){
	if($('#showhide').length > 0){
		$('#showhide').click(function(){
			if($(this).hasClass('hidden')){
				$(this).next('.bottom-block').fadeIn(250).removeClass('hidden');
				$(this).toggleClass('hidden');
				$('.bmenu a:first-child').addClass('active');
				$('.bottom-block div:first-child').show().addClass('active');
				return false;
			}
			
			else{
				$(this).next('.bottom-block').fadeOut(250).addClass('hidden');
				$(this).toggleClass('hidden');
				$('.bmenu a').removeClass('active');
				$('.bottom-block .block').fadeOut(250).removeClass('active');
				return false;
			}
			

		});
	}
	
	if($('.bmenu').length > 0){
		$('.bottom-block .block').hide();
		//$('.bmenu a:first-child').addClass('active');
		//$('#about').show().addClass('active');
		$('.bmenu a').click(function(){
			obj = $(this).attr('href');
			if($(obj).hasClass('active')){ 
				return false;
			}
			else{
				if($('.bottom-block').hasClass('hidden')){
					$('.bottom-block').fadeIn(250).removeClass('hidden');
					$('#showhide').removeClass('hidden');
				}
				$('.bmenu a').removeClass('active');
				$(this).addClass('active');
				$('.bottom-block .block').fadeOut(250).removeClass('active');
				$(obj).delay(500).fadeIn(250).addClass('active');
				return false;
			}
		});
	}
	
	if($('#marka').length > 0){
		$('#price').html($('#marka').val() + ' руб.');
		$('#marka').change(function(){
			$('#price').html($(this).val() + ' руб.');
		});
	}
	
	// datepiker //
	$( "#datepicker" ).datepicker({            
            changeMonth: true,
            changeYear: true,
            yearRange: "1700:3000",
            maxDate: '31.12.1993',
            minDate: '01.01.1948'            
    });
    
    if ($('.requestsWrapper').length > 0) {
        function getNumberOfReviews() {
            var number = new Date();
                number = number.getTime();
                number = Math.round((number % 1000000000) / 1000);
                number = number.toString().substr(-3);
            return number;
        }

        function getRowOfReviews(autos, regions, number) {
            var autos_id    = Math.floor(Math.random() * (autos.length)); 
            var regions_id   = Math.floor(Math.random() * (regions.length));            
            var row = '<tr>';
                row +=   '<td>' + transliterate(regions[regions_id].substr(0,1))+ number + '</td>';
                row +=   '<td>' + autos[autos_id]['name'] + '</td>';
                row +=   '<td>' + formatStr(autos[autos_id]['price']) + ' руб.</td>';
                row +=   '<td>' + regions[regions_id] + '</td>';
                row += '</tr>';
            return row;
        }
        
        function getRowOfResolutions(autos, regions, number) {
            var autos_id    = Math.floor(Math.random() * (autos.length)); 
            var regions_id   = Math.floor(Math.random() * (regions.length));         
            var status  = ['accepted', 'refused']; 
            var status_text = [
                'Грубое общение с банком',
                'Приобретение автомобиля для продажи',
                'Отсутствует телефон в анкете',
                'Паспорт недействителен',
                'Отсутствует второй документ',
                'Отказ по базам БКИ (бюро кредитной истории)',
                'Отказ по базам СБ (службы безопасноти)',
                'Неподтверждение трудоустройства в организации',
                'Отказ супруга(и) на оформление кредита',
                'Отказ по программе скоринг',
                'Судимость',
                'Большое кол-во штрафов по ФССП',
                'Предоставление заведомо ложных сведений',
                'Недостаточных доход для обслуживания кредита',
                'Дети до 1-го года (декрет)',
                'Непрезентабельная внешность',
                'Негативные данные о работодателе Заёмщика',
                'Возраст заёщика от 21 до 65 лет',
                'Заёмщик не гражданин РФ'
            ];
            var status_id   = Math.floor(Math.random() * (100 + 1)); 
            if (status_id <= 50) {
                status_id = 0;
                var status_text = 'Подтверждено';
            } else {
                status_id = 1;
                var status_text_id    = Math.floor(Math.random() * (status_text.length)); 
                var status_text = status_text[status_text_id];
            }
            var row = '<tr>';
                row +=   '<td class="'+status[status_id]+'">' + transliterate(regions[regions_id].substr(0,1))+ number + '</td>';
                row +=   '<td class="'+status[status_id]+'">' + autos[autos_id]['name'] + '</td>';
                row +=   '<td class="' + status[status_id] + '">' + status_text + '</td>';
                row += '</tr>';
            return row;
        }

        var autos   = [
            {name:'ASTRA',price:'380000'},
            {name:'ASTRA',price:'700000'},
            {name:'PRIMERA',price:'270000'},
            {name:'OCTAVIA',price:'1075000'},
            {name:'CAMRY',price:'799000'},
            {name:'FUSION',price:'399000'},
            {name:'CAMRY',price:'649000'},
            {name:'TEANA',price:'1159900'},
            {name:'BMW 740LI',price:'889000'},
            {name:'COROLLA',price:'713000'},
            {name:'QASHQAI',price:'749000'},
            {name:'HOVER H5',price:'799000'},
            {name:'RAV 4',price:'485000'},
            {name:'BMW Z4',price:'1061000'},
            {name:'POLO',price:'749000'},
            {name:'LACETTI',price:'335000'},
            {name:'X-TRAIL',price:'550000'},
            {name:'PRIORA',price:'289000'},
            {name:'LOGAN',price:'389000'},
            {name:'VERSO',price:'699000'},
            {name:'MAZDA CX-7',price:'649000'},
            {name:'LANCER',price:'576000'},
            {name:'ORLANDO',price:'799000'},
            {name:'COROLLA',price:'470000'},
            {name:'PATRIOT',price:'464000'},
            {name:'TIGGO',price:'300000'},
            {name:'PEUGEOT 3008',price:'780000'},
            {name:'ASTRA',price:'389000'},
            {name:'PEUGEOT 207',price:'349000'},
            {name:'KIA CEED',price:'810000'},
            {name:'QASHQAI',price:'599000'},
            {name:'LOGAN',price:'448000'},
            {name:'BMW530',price:'639000'},
            {name:'ELANTRA',price:'479000'},
            {name:'ASTRA',price:'449000'},
            {name:'QASHQAI',price:'620000'},
            {name:'AVEO',price:'569000'},
            {name:'LARGUS',price:'620000'},
            {name:'RIO',price:'674000'},
            {name:'CAMRY',price:'710000'},
            {name:'GRANTA',price:'499000'},
            {name:'GETZ',price:'364000'},
            {name:'HYUNDI IX35',price:'1029000'},
            {name:'GR WALL SAFE',price:'460000'},
            {name:'CAMRY',price:'665000'},
            {name:'LEXUS RX300',price:'572000'},
            {name:'RANGE ROVER',price:'1029000'},
            {name:'ACCORD',price:'695000'},
            {name:'CAMRY',price:'699000'},
            {name:'AUDI A3',price:'823000'},
            {name:'MERC S350',price:'1099000'},
            {name:'MERC CLC230',price:'850000'},
            {name:'ASTRA',price:'480000'},
            {name:'CRUZE',price:'582000'},
            {name:'MERS GL500',price:'1930850'},
            {name:'AMAROK',price:'934000'},
            {name:'VOLVO S60',price:'1243000'},
            {name:'SANTA FE',price:'420000'},
            {name:'PORTER',price:'535000'},
            {name:'LACETTI',price:'369000'},
            {name:'CAMRY',price:'645000'},
            {name:'AUDI A4',price:'583000'},
            {name:'CX-7',price:'723000'},
            {name:'MAZDA 6',price:'385000'},
            {name:'ТУАРЕГ',price:'821000'},
            {name:'CARAVELLE',price:'144000'},
            {name:'ФОКУС',price:'523000'},
            {name:'JUKE',price:'920000'},
            {name:'КАРЕНС',price:'417000'},
            {name:'RIDGELINE',price:'962000'},
            {name:'БМВ 740LI',price:'779000'},
            {name:'TOUAREG',price:'905000'},
            {name:'LACETTI',price:'499000'},
            {name:'PAJERO',price:'724000'},
            {name:'ML500',price:'586000'},
            {name:'TOUAREG',price:'935000'},
            {name:'BMW 118I',price:'1109000'},
            {name:'X-TRAIL',price:'733000'},
            {name:'СОНАТА',price:'469000'},
            {name:'LOGAN',price:'379000'},
            {name:'GOLF',price:'773000'},
            {name:'АУДИ А4',price:'763000'},
            {name:'ФОКУС',price:'441000'},
            {name:'GREAT WALL',price:'644000'},
            {name:'RENAULT SR',price:'394000'},
            {name:'SPORTAGE',price:'653000'},
            {name:'МЕРСЕДЕС',price:'749000'},
            {name:'OCTAVIA',price:'749000'},
            {name:'GREAT WALL',price:'371000'},
            {name:'POLO',price:'657000'},
            {name:'Aveo',price:'340000'},
            {name:'ML430',price:'533000'},
            {name:'OCTAVIA',price:'631000'},
            {name:'VOLVO C30',price:'498000'},
            {name:'BMW 525',price:'1099000'},
            {name:'Impreza',price:'582000'},
            {name:'GREAT WALL',price:'808000'},
            {name:'BMW 120D',price:'870000'},
            {name:'X-TRAIL',price:'581506'},
            {name:'PANDA',price:'375000'},
            {name:'PARTNER',price:'731000'},
            {name:'LANCER',price:'480000'},
            {name:'ВОЛЬВО С30',price:'657000'},
            {name:'MONDEO',price:'597000'},
            {name:'C 180',price:'976000'},
            {name:'CX-7',price:'929000'},
            {name:'RANGE ROVER',price:'1257000'},
            {name:'MEGANE',price:'425000'},
            {name:'PASSAT',price:'659000'},
            {name:'CRUZE',price:'755000'},
            {name:'MAZDA 3',price:'460000'},
            {name:'JETTA',price:'491000'},
            {name:'TEANA',price:'860000'},
            {name:'LANCER',price:'400000'},
            {name:'ФОКУС',price:'573000'},
            {name:'ALMERA',price:'310000'},
            {name:'QASHQAI',price:'719000'},
            {name:'MAZDA 6',price:'750000'},
            {name:'ECLIPSE',price:'749000'},
            {name:'SORENTO',price:'1161000'},
            {name:'ФОКУС',price:'440000'},
            {name:'LAND CRUISER',price:'1054000'},
            {name:'BMW X5',price:'1135000'},
            {name:'ФОКУС',price:'510000'},
            {name:'Kyron',price:'536000'},
            {name:'XC 90',price:'720000'},
            {name:'ФОКУС',price:'480000'},
            {name:'ФОКУС',price:'525000'},
            {name:'ФОКУС',price:'644000'},
            {name:'RANGE ROVER',price:'899000'},
            {name:'ФОКУС',price:'325000'},
            {name:'C 300',price:'929000'},
            {name:'MPV',price:'340000'},
            {name:'LOGAN',price:'310000'},
            {name:'POLO',price:'675000'},
            {name:'ASTRA',price:'440000'},
            {name:'ELANTRA',price:'463000'},
            {name:'MONDEO',price:'724000'},
            {name:'ВОЛЬВО S80',price:'665000'},
            {name:'LANCER',price:'699000'},
            {name:'ПОЛО',price:'432000'},
            {name:'PASSAT CC',price:'1010000'},
            {name:'PASSAT CC',price:'642000'},
            {name:'CERATO',price:'662000'},
            {name:'XC70',price:'491000'},
            {name:'TUCSON',price:'698000'},
            {name:'TUCSON',price:'580000'},
            {name:'PRADO',price:'2049000'},
            {name:'SOLARIS',price:'582000'},
            {name:'LADA',price:'245000'},
            {name:'PASSAT',price:'778000'},
            {name:'ФОКУС',price:'482000'},
            {name:'OUTLANDER',price:'1180000'},
            {name:'САНТА ФЕ',price:'498000'},
            {name:'JETTA',price:'492000'},
            {name:'ЗАФИРА',price:'628000'},
            {name:'БМВ Х5',price:'927000'},
            {name:'CAPTIVA',price:'569000'},
            {name:'L200',price:'809000'},
            {name:'GETZ',price:'485000'},
            {name:'CORSA',price:'450000'}];
        var regions = [
            'Бердск',
			'Новосибирск',
            'Томск',
            'Алтай',
            'Новосибирская область',
            'Кемеровская область'
        ];

        var html    = '';
        var numberReviews  = getNumberOfReviews();
        for (var i = 0; i < 6; i++) {
            var row     = getRowOfReviews(autos, regions, numberReviews++);
                html    = row + html;
        }
        $('.review tbody').html(html);

        setInterval(function() {
            var row     = getRowOfReviews(autos, regions, ++numberReviews);
            $('.review tbody').prepend(row);
            $('.review tbody tr:first').slideDown(300);
            $('.review tbody tr:last').fadeOut(200).remove();
        }, 2500);
        
        var html    = '';
        var numberResolutions  = getNumberOfReviews();
        if(numberResolutions>200){
            numberResolutions  = parseInt(numberResolutions) - 123;
        }else{
            numberResolutions  = parseInt(numberResolutions) + 123;
        }
        for (var i = 0; i < 6; i++) {
            var row     = getRowOfResolutions(autos, regions, numberResolutions++);
                html    = row + html;
        }
        $('.resolution tbody').html(html);
        
        setInterval(function() {
            var row     = getRowOfResolutions(autos, regions, ++numberResolutions);
            $('.resolution tbody').prepend(row);
            $('.resolution tbody tr:first').slideDown(300);
            $('.resolution tbody tr:last').fadeOut(200).remove();
        }, 3500);
    }

    if($('.jcarousel').length > 0){
        $('.jcarousel').jcarousel();

        $('.jcarousel-control-prev')
                .on('jcarouselcontrol:active', function() {
                    $(this).removeClass('inactive');
                })
                .on('jcarouselcontrol:inactive', function() {
                    $(this).addClass('inactive');
                })
                .jcarouselControl({
                    target: '-=1'
                });

        $('.jcarousel-control-next')
                .on('jcarouselcontrol:active', function() {
                    $(this).removeClass('inactive');
                })
                .on('jcarouselcontrol:inactive', function() {
                    $(this).addClass('inactive');
                })
                .jcarouselControl({
                    target: '+=1'
                });
        $('.jcarousel img').click(function(){
            $('#carcolor').attr('src',$(this).data('big'));
        });
        
    }

});

$(function(){
 $('.csel').coreUISelect({
            jScrollPane : {
                verticalDragMinHeight: 20,
                verticalDragMaxHeight: 20,
                showArrows : true,
                appendToBody : true
            }
        });

     function addCoreUISelectListener(select, event){
            console.log(select, event);
        }

});


function show_privacy(){
    $('#privacy_popup').modal({
        maxHeight: '80%',
        position: ['10%',],
        onShow: function (dlg) {
            $(dlg.wrap).css('overflow', 'auto');
        }
    });
}

function formatStr(str) {
    str = str.replace(/(\.(.*))/g, '');
    var arr = str.split('');
    var str_temp = '';
    if (str.length > 3) {
        for (var i = arr.length - 1, j = 1; i >= 0; i--, j++) {
            str_temp = arr[i] + str_temp;
            if (j % 3 == 0) {
                str_temp = ' ' + str_temp;
            }
        }
        return str_temp;
    } else {
        return str;
    }
}

transliterate = (
    function() {

        var
            rus = "щ   ш  ч  ц  ю  я  ё  ж  ъ  ы  э  а б в г д е з и й к л м н о п р с т у ф х ь".split(/ +/g),
            eng = "shh sh ch cz yu ya yo zh `` y' e` a b v g d e z i j k l m n o p r s t u f x `".split(/ +/g)
        ;
        return function(text, engToRus) {
            var x;
            for(x = 0; x < rus.length; x++) {
                text = text.split(engToRus ? eng[x] : rus[x]).join(engToRus ? rus[x] : eng[x]);
                text = text.split(engToRus ? eng[x].toUpperCase() : rus[x].toUpperCase()).join(engToRus ? rus[x].toUpperCase() : eng[x].toUpperCase());
            }
            return text;
        }
    }
)();
