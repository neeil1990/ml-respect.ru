function getUrlVar(key) {
    let p = window.location.search;
    p = p.match(new RegExp(key + '=([^&=]+)'));
    return p ? p[1] : false;
}

function ucFirst(str) {
    if (!str) return str;
    return str[0].toUpperCase() + str.slice(1);
}
/* Олег : переписал запрос на поиск моделей бренда
function updateCatFilterModel(brand) {
    $.ajax({
        url: location.protocol + '//' + location.hostname + '/inc/getModels.php?brand=' + brand,
        dataType: 'json',
        success: function(json){
            if(json.status == 'Y'){
                let $catFilterModel = $("#catFilterModel");
                $catFilterModel.empty();
                $catFilterModel.append('<option selected="selected" value="">Модель</option>');
                json.data.forEach(function(item, i, arr) {
                    let model = getUrlVar('arrFilter_pf%5Bmodel%5D');
                    if(model==false){
                        let urlPath = window.location.pathname.split('/');
                        if(urlPath[1]=="car") {
                            if (urlPath[3] != "") {
                                model = urlPath[3];
                            }
                        }
                    }
                    if(model == item){
                        $catFilterModel.append('<option value=' + item + ' selected="selected">' + ucFirst(item) + '</option>');
                    }else{
                        $catFilterModel.append('<option value=' + item + '>' + ucFirst(item) + '</option>');
                    }
                });
                $catFilterModel.niceSelect('update');
            }else{
                console.log(json);
            }
        }
    });
}*/

function updateCatFilterModel(brand) {
    $.ajax({
        url: location.protocol + '//' + location.hostname + '/inc/filterModels.php?brand=' + brand,
        dataType: 'json',
        success: function(json){
            if(json.status == 'Y'){
                let $catFilterModel = $("#catFilterModel");
                $catFilterModel.empty();
                $catFilterModel.append('<option selected="selected" value="">Модель</option>');
                json.data.forEach(function(item, i, arr) {
                    let model = getUrlVar('arrFilter_pf%5Bmodel%5D');
                    if(model==false){
                        let urlPath = window.location.pathname.split('/');
                        if(urlPath[1]=="car") {
                            if (urlPath[3] != "") {
                                model = urlPath[3];
                            }
                        }
                    }
                    if(model == item.code){
                        $catFilterModel.append('<option value=' + item.code + ' selected="selected">' + ucFirst(item.name) + '</option>');
                    }else{
                        $catFilterModel.append('<option value=' + item.code + '>' + ucFirst(item.name) + '</option>');
                    }
                });
                $catFilterModel.niceSelect('update');
            }else{
                console.log(json);
            }
        }
    });
}

function insertParam(key, value) {
    key = encodeURI(key); value = encodeURI(value);

    var kvp = document.location.search.substr(1).split('&');
    if (kvp == '') {
        document.location.search = '?' + key + '=' + value;
    }
    else {

        var i = kvp.length; var x; while (i--) {
            x = kvp[i].split('=');

            if (x[0] == key) {
                x[1] = value;
                kvp[i] = x.join('=');
                break;
            }
        }

        if (i < 0) { kvp[kvp.length] = [key, value].join('='); }

        //this will reload the page, it likely better to store this until finished
        document.location.search = kvp.join('&');
    }
}

let accountId = 0;
let clientAuto = '';
let clientPrice = '';

$(document).ready(function(){

    let phones = [
        {'mask': '+7 ### ### ## ##'}
    ];

    $('input[type=tel]').inputmask({
        mask: phones,
        greedy: false,
        placeholder: ' ',
        showMaskOnHover: false,
        showMaskOnFocus: true,
        definitions: {
            '#':
                {
                    validator: '[0-9]',
                    cardinality: 1
                }
        }
    });

    $('select').niceSelect();

	$('.call_back .red_btn').on('click', function() {
		 $('.fJfZdb').click();
	});
    // Фильтр авто
   // Олег: выбираем марку в списке фильтра на текущей странице


    let urlPath = window.location.pathname.split('/');
    if(urlPath[1]=="car"){
        if(urlPath[2]!=""){
            let $catFilterBrand = $("#catFilterBrand");
            if($catFilterBrand.length>0) {
                let data = urlPath[2];
                $catFilterBrand.find("option:selected").removeAttr('selected');
                $catFilterBrand.find("option[value='" + data + "']").attr('selected', 'selected');
                $catFilterBrand.val(data);
                $catFilterBrand.niceSelect('update');
                updateCatFilterModel(data);
            }
        }
    }
    //------------------------------

    if(getUrlVar('arrFilter_pf%5Bbrand%5D')){
        let $catFilterBrand = $("#catFilterBrand");
        if($catFilterBrand.length>0){
            let data = getUrlVar('arrFilter_pf%5Bbrand%5D');
            $catFilterBrand.find("option:selected").removeAttr('selected');
            $catFilterBrand.find("option[value='"+ data +"']").attr('selected', 'selected');
            $catFilterBrand.val(data);
            $catFilterBrand.niceSelect('update');
            updateCatFilterModel(data);
        }
    }
    if(getUrlVar('arrFilter_pf%5Byear%5D%5BLEFT%5D')){
        let $catFilterYearLeft = $("#catFilterYearLeft");
        if($catFilterYearLeft.length>0){
            let data = getUrlVar('arrFilter_pf%5Byear%5D%5BLEFT%5D');
            $catFilterYearLeft.find("option:selected").removeAttr('selected');
            $catFilterYearLeft.find("option[value='"+ data +"']").attr('selected', 'selected');
            $catFilterYearLeft.val(data);
            $catFilterYearLeft.niceSelect('update');
        }
    }
    if(getUrlVar('arrFilter_pf%5Byear%5D%5BRIGHT%5D')){
        if($("#catFilterYearRight").length>0){
            let data = getUrlVar('arrFilter_pf%5Byear%5D%5BRIGHT%5D');
            $("#catFilterYearRight option:selected").removeAttr('selected');
            $("#catFilterYearRight option[value='"+ data +"']").attr('selected', 'selected');
            $('#catFilterYearRight').val(data);
            $('#catFilterYearRight').niceSelect('update');
        }
    }
    if(getUrlVar('arrFilter_pf%5Bprice%5D%5BLEFT%5D')){
        if($("#catFilterPriceLeft").length>0){
            let data = getUrlVar('arrFilter_pf%5Bprice%5D%5BLEFT%5D');
            $('#catFilterPriceLeft').val(data);
        }
    }
    if(getUrlVar('arrFilter_pf%5Bprice%5D%5BRIGHT%5D')){
        if($("#catFilterPriceRight").length>0){
            let data = getUrlVar('arrFilter_pf%5Bprice%5D%5BRIGHT%5D');
            $('#catFilterPriceRight').val(data);

        }
    }
    $('.only_d').bind("change keyup input click", function() {
        if (this.value.match(/[^\0-9]/g)) {
            this.value = this.value.replace(/[^\0-9]/g, '');
	    }
	});


    // Форма оценки авто
    if($("#carsEvalBrands").length>0){
        $.ajax({
            url: '/cars.eval.php?act=getBrands',
            dataType: 'json',
            success: function(response){
                if(response.status == 'Y'){
                    response.response.forEach(function(item, i, arr) {
                        $("#carsEvalBrands").append('<option value="' + item + '">' + item + '</option>');
                    });
                    $('#carsEvalBrands').niceSelect('update');
                }
            }
        });
        $("#carsEvalBrands").on('change', function(){
            $('.errorEvalFormSel').removeClass('errorEvalFormSel');
            let brandName = $("#carsEvalBrands").val();
            $.ajax({
                url: '/cars.eval.php?act=getModels&brandId=' + encodeURIComponent(brandName),
                dataType: 'json',
                success: function(response){
                    if(response.status == 'Y'){
                        $("#carsEvalModels").empty();
                        $("#carsEvalModels").append('<option selected="selected" value="">Модель</option>');
                        response.response.forEach(function(item, i, arr) {
                            $("#carsEvalModels").append('<option value=' + item + '>' + item + '</option>');
                        });
                        $('#carsEvalModels').niceSelect('update');
                    }else{
                        console.log(response);
                    }
                }
            });
        });
    }


    $('.photo_list_item').fancybox();

    $('.map').fancybox({
      touch : false
    });

    $('.main_slider_text').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        dots: true,
        asNavFor: '.main_slider',
        autoplay:true,
        autoplaySpeed:6000,
    });

    $('.main_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.main_slider_text',
        arrows: false,
        centerMode: false,
        autoplay:true,
        autoplaySpeed:6000,
    });


    $(".car_item_img_slider").brazzersCarousel();

    $('.tmb-wrap-table').mouseout(function(){
        $(this).children('div').removeClass('active');
        $(this).children('div:first-child').addClass('active');
        $('.image-wrap img').hide();
        $('.image-wrap img:first-child').show();
    })

    $('.image-wrap')

    $('.all_param_btn').click(function(){
      $(this).siblings('.select_year_from').addClass('show_hides');
      $(this).siblings('.select_year_to').addClass('show_hides');
      $(this).siblings('.price_from').addClass('show_hides');
      $(this).siblings('.price_to').addClass('show_hides');
      $(this).hide();
    });

    $('.mobile-btn').click(function(){
        $(this).toggleClass('mobile-btn_active');
        if($(this).hasClass('mobile-btn_active')) {
            $('body').addClass('opened');

            $('.top_menu').addClass('top_menu_active');
            $('.top_menu .a_level_1').each(function (index, el) {
                setTimeout(function () {
                    $(el).addClass('showed');
                }, index * 100);
            });
        }else{
            $('body').removeClass('opened');
            $('.submenu').hide();
            $('.submenu').removeClass('submenu_active');
            var time = 0;
            $($('.top_menu .a_level_1').get().reverse()).each(function (index, el) {
                time = index * 100;
                setTimeout(function () {
                    $(el).removeClass('showed');
                }, time);
            });
            setTimeout(function () {
                $('.top_menu').removeClass('top_menu_active');
                $('.top_menu').find('.showed').removeClass('showed');
                $('.top_menu').find('.submenu').hide();
            }, $('.top_menu .a_level_1').length * 100);
        }
    });

    // $('.fotorama').fotorama({
    //         allowfullscreen: true,
    //         maxwidth: '100%'
    //     });

    $('.thumbs').each(function () {
          $('a', this).each(function () {
            var $a = $(this);
            // set ids, will use them later
            $a.attr({id: $a.attr('href').replace(/[\/\.-]/g, '')});
          });

          var $thumbs = $(this),
              $fotorama = $thumbs.clone();

          $fotorama
              .on('fotorama:show', function (e, fotorama) {
                // pick the active thumb by id
                $('#' + fotorama.activeFrame.id)
                    .addClass('active')
                    .siblings()
                    .removeClass('active');
              })
              .addClass('fotorama')
              .removeClass('thumbs')
              .insertBefore(this)
              .fotorama({nav: true, maxwidth: '100%', allowfullscreen: true, maxHeight: 450, allowfullscreen: true, thumbwidth: 124,
            thumbheight: 90, thumbmargin: 8, nav: 'thumbs'});

          // get access to the API
          var fotorama = $fotorama.data('fotorama');

          $thumbs.on('click', 'a', function (e) {
            e.preventDefault();
            // show frame by id
            fotorama.show(this.id);
          });
        });

     var width = $(window).width();

     if ((width > '319') && (width < '993')) {
        $('.li_sub > a').click(function(){
            $(this).siblings('.submenu').toggleClass('submenu_active');
            $(this).parents('.li_sub').siblings('.li_sub').children('.submenu').removeClass('submenu_active');
            return false;
        });
     }

     if ((width > '319') && (width < '993')) {
        $('.card_car_left').prepend( $('.card_car_date') );
        $('.card_car_left').prepend( $('.card_car_title') );
        $('.card_car_left').prepend( $('.breadcrumbs') );
     }

     if ((width > '319') && (width < '450')) {
        $('.mobile-btn').click(function(){
            $('.wrapper').toggleClass('ios_fix');
            return false;
        });
        // $('.opened').css("overflow-y", "hidden!important");
     }

     if ((width > '319') && (width < '576')) {
        $('.best_offer .cars').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
          responsive: [
        {
          breakpoint: 476,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
      });
        // $('.car_item_img ').removeClass('brazzers-daddy');
     }

     if ((width > '319') && (width < '768')) {
       $('.car_item_img').removeClass('car_item_img_slider');
     }


     if ((width > '993') && (width < '1921')) {
         var navPos, winPos, navHeight;

        function refreshVar() {
          navPos = $('nav').offset().top;
          navHeight = $('nav').outerHeight(true);
        }

        refreshVar();
        $(window).resize(refreshVar);

    $('<div class="clone-nav"></div>').insertBefore('nav').css('height', navHeight).hide();

      $(window).scroll(function() {
      winPos = $(window).scrollTop();

      if (winPos >= navPos) {
        $('nav').addClass('fixed shadow');
        $('.clone-nav').show();
      }
      else {
        $('nav').removeClass('fixed shadow');
        $('.clone-nav').hide();
      }
    });
     }

      $('.more_photos').click(function(){
      var fotorama = $('.fotorama')
             .fotorama({allowfullscreen: true})
             .data('fotorama');
          fotorama.requestFullScreen();
      });


      $('.fotorama').on('fotorama:ready', function () {
            let vin = $('.card_car').data('vin');
            if(vin){
                $('<a href="#" class="deg360" data-vin="'+vin+'"></a>').insertBefore('.fotorama__fullscreen-icon');
            }
        });



        if ($("a.thumbs_item").length > 10) {
          $('.more_photos').addClass('more_photos_active');
          return false;
     }





      $(document).on('af_complete', function(event, response) {
        if(response.success) $.fancybox.close();
    })

    $('#catFilterBrand').on('change', function(){
        var brand = $('#catFilterBrand option:selected').val();
        updateCatFilterModel(brand);
    });

});

var changeCity = function(select){
    location.href = $(select).val() + location.pathname;
}

jQuery("a.scrollto").click(function () {
    elementClick = jQuery(this).attr("href")
    destination = jQuery(elementClick).offset().top;
    jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 700);
    return false;
});

var carsEval = function(step){
    if(step == 1){
        let postData = {}
            errFlag  = false;
        $('.errorEvalForm').removeClass('errorEvalForm');
        $('.errorEvalFormSel').removeClass('errorEvalFormSel');
        postData.abrand = $('#carsEvalBrands').val();
        if(postData.abrand == ''){
            $('#carsEvalBrands option:selected').data('display', 'Выберите марку автомобиля для расчета');
            $('#carsEvalBrands').niceSelect('update');
            $('.nice-select').filter('.select_auto').find('.current').addClass('errorEvalFormSel');
            return false;
        }
        postData.amodel = $('#carsEvalModels').val();
        if(postData.amodel == ''){
            $('#carsEvalModels option:selected').data('display', 'Выберите модель для расчета');
            $('#carsEvalModels').niceSelect('update');
            $('.nice-select').filter('.select_model').find('.current').addClass('errorEvalFormSel');
            return false;
        }
        postData.ayear  = $('#carsEvalYear').val();
        if(postData.ayear == ''){
            $('#carsEvalYear option:selected').data('display', 'Выберите год для расчета');
            $('#carsEvalYear').niceSelect('update');
            $('.nice-select').filter('.select_year_start').find('.current').addClass('errorEvalFormSel');
            return false;
        }
        postData.phone = $('#carsEvalPhone').val().replace(/\s+/g, '');
        if(postData.phone == '' || postData.phone.length < 12){
            $('#carsEvalPhone').addClass('errorEvalForm');
            errFlag = true;
        }
        postData.name = $('#carsEvalName').val()

        if(!errFlag){
		$("#formStep1 button.red_btn").attr("disabled", true); // Олег: делаем кнопку не кликабельной
            
            $('.errorEvalForm').removeClass('errorEvalForm');
            $.ajax({
                url: '/cars.eval.php?act=sendStep1',
                type: 'post',
                data: postData,
                dataType: 'json',
                success: function(response){
                    if(response.status == 'Y'){
                        /*$('#stepWays').find('.step1').removeClass('active_step');
                        $('#stepWays').find('.step2').addClass('active_step');
                        $('#formStep1').slideUp();
                        $('#formStep2').slideDown();
                        accountId = response.account;*/
                        clientAuto = postData.abrand + ' ' + postData.amodel + ' ' + postData.ayear;
                        $('#clientAuto').html(clientAuto);
                        $('#formStep1').slideUp();
                        $('#formStep3').slideDown();
                        yandexGoal('COUNT'); // Олег: достигаем цели тестдрайв
                    }
                    $("#formStep1 button.red_btn").attr("disabled", false); // Олег: делаем кнопку кликабельной
                }
            });
        }
    }
    if(step == 2){
        let postData = {};
        postData.run  = $('#carsEvalRun').val();
        postData.dyed = $('#carsEvalDyed').val();
        if($('#pts_double').prop('checked')){
            postData.pts = 'Дубликат';
        }else{
            postData.pts = 'Оригинал';
        }
        postData.owners = $('#carsEvalOwners').val();
        postData.accountId = accountId;
        $.ajax({
            url: '/cars.eval.php?act=sendStep2',
            type: 'post',
            data: postData,
            dataType: 'json',
            success: function(response){
                console.log(response);
                if(response.status == 'Y'){
                    //$('#stepWays').find('.step2').removeClass('active_step');
                    //$('#stepWays').find('.step3').addClass('active_step');
                    $('#formStep2').slideUp();
                    $('#formStep3').slideDown();
                    $('#clientAuto').html(clientAuto);
                    clientPrice = response.price;
                    $('#clientPrice').html(clientPrice);
                }
            }
        });
    }
    return false;
}

$('#sortBy').on('change', function(){
    let sort = $(this).val();
    if(sort == 'DATE_DESC'){
        insertParam('sortBy', 'DATE_DESC');
    }
    if(sort == 'PRICE_DESC'){
        insertParam('sortBy', 'PRICE_DESC');
    }
    if(sort == 'PRICE_ASC'){
        insertParam('sortBy', 'PRICE_ASC');
    }
});

$(window).load(function() {
    //$('#global').fadeIn();

});

$('a[href="#2calls"]').click(function(){
            if(location.hostname == 'spb.ml-respect.ru'){
                window.Calltouch.Callback.onClickCallButton();
                return false;
            }
        });

function show_popup(title, filial) {
    fbq('track', 'Lead');
    // Олег: закоментил условие которое вызывает форму  Calltouch
    // if(location.hostname == 'spb.ml-respect.ru'){
    //     window.Calltouch.Callback.onClickCallButton();
    //     return false;
    // }
    if(title.length > 0){
        $('#credit_auto').html(title.toUpperCase());
    }
    if(filial > 0){
        $('#credit_filial').val(filial);
    }
    $('#popup').addClass('popup_active');
    $('#popup').find('.popup').addClass('popup_active');
}

function hide_popup() {
    $('#popup').removeClass('popup_active');
    $('#popup').find('.popup').removeClass('popup_active');
    $('#popup').find('form').addClass('popup__form__fields_active');
    $('#popup').find('form').removeClass('popup__form__thx_active');
}

function show_popupTest(title, filial) {
    fbq('track', 'Lead');
    // Олег: закоментил условие которое вызывает форму  Calltouch
    // if(location.hostname == 'spb.ml-respect.ru'){
    //     window.Calltouch.Callback.onClickCallButton();
    //     return false;
    // }
    if(title.length > 0){
        $('#tesdrive_auto').html(title.toUpperCase());
    }
    if(filial > 0){
        $('#tesdrive_filial').val(filial);
    }
    $('#popup-test_drive').addClass('popup_active');
    $('#popup-test_drive').find('.popup').addClass('popup_active');
}

function hide_popupTest() {
    $('#popup-test_drive').removeClass('popup_active');
    $('#popup-test_drive').find('.popup').removeClass('popup_active');
    $('#popup-test_drive').find('form').addClass('popup__form__fields_active');
    $('#popup-test_drive').find('form').removeClass('popup__form__thx_active');
}

var toggleMobileNav = function(){
    $('body').toggleClass('opened');
    return false;
}

var sendTestDrive = function(){
    let data = {};
    data.auto = $('#tesdrive_auto').html();
    data.name = $('#testdrive_form_name').val();
    data.phone = $('#testdrive_form_phone').val().replace(/\s/g, '');;
    data.comment = $('#testdrive_form_comment').val();
    data.filial = $('#tesdrive_filial').val();
    if(data.phone.length == 12){
	$("#tesdrive_form button.red_btn").attr("disabled", true); // Олег: делаем кнопку не кликабельной
        $.ajax({
            url: '/send.testdrive.php',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(response){
                console.log(response);
                if(response.status == 'Y'){
                    fbq('track', 'SubmitApplication');
                    $('#testdrive_title').html('Ваша заявка на расчет принята');
                    $('#testdrive_titleauto').html('В ближайшее время мы свяжемся с Вами, чтобы уточнить детали. Будьте на связи!');
                    $('#tesdrive_auto').slideUp();
                    $('#tesdrive_form').slideUp();
                    $('#tesdrive_privacy').slideUp();
                    yandexGoal('TESTDRIVE'); // Олег: достигаем цели тестдрайв
                }
		$("#tesdrive_form button.red_btn").attr("disabled", false); // Олег: делаем кнопку кликабельной
            }
        });
    }
    return false;
}

var sendCredit = function()
{
    let data = {};
    data.auto = $('#credit_auto').html();
    data.name = $('#credit_form_name').val();
    data.phone = $('#credit_form_phone').val().replace(/\s/g, '');;
    data.comment = $('#credit_form_comment').val();
    data.filial = $('#credit_filial').val();
    if(data.phone.length == 12){
        $("#credit_form button.red_btn").attr("disabled", true); // Олег: делаем кнопку не кликабельной
        $.ajax({
            url: '/send.credit.php',
            type: 'post',
            data: data,
            dataType: 'json',
            success: function(response){
                console.log(response);
                if(response.status == 'Y'){
                    $('#credit_title').html('Ваша заявка на тест-драйв принята');
                    $('#credit_titleauto').html('В ближайшее время мы свяжемся с Вами, чтобы уточнить детали Вашей записи. Будьте на связи!');
                    $('#credit_auto').slideUp();
                    $('#credit_form').slideUp();
                    $('#credit_privacy').slideUp();
                    yandexGoal('CREDIT'); // Олег: достигаем цели тестдрайв
                }
                $("#credit_form button.red_btn").attr("disabled", false); // Олег: делаем кнопку кликабельной
            }
        });
    }
    return false;
}

// Убираем скролл на кнопке 360
$(function() {
        $(document).on('click touchstart', '.deg360', function(e){
            e.preventDefault();
        });

        $( '.tooltip' ).tooltip({
            track: true,
            show: 'fast',
            hide: 'fast',
        });

        $('.sold').find('.car_item_img').append($('<div/>').addClass('sold').text('Продан').css({
            "position": 'absolute',
            "top": '0',
            "left": '0',
            "width": '100%',
            "height": '100%',
            "text-align": 'center',
            "font-size": '2rem',
            "text-transform": 'uppercase',
            "font-weight": 'bold',
            "letter-spacing": '0.4rem',
            "background": 'rgb(0 0 0 / 50%)',
            "padding-top": '30%'
        }));
});

// Олег: перехватываем отправку фромы фильтра, переопредделяем ссылку

$("form[name=arrFilter_form]").on("submit",function(e){
    e.preventDefault();
    var arForm = $( this ).serializeArray();
    if(arForm[0].value!="")
    {
        this.action+=arForm[0].value+"/";
        if(arForm[1].value!="")
        {
            this.action+=arForm[1].value+"/";
        }
    }
    var paramStart = "?"
    for(var i=2;i<arForm.length; i++)
    {
        if(arForm[i].value!="")
        {
            if(paramStart=="?" && arForm[i].name=="set_filter"){continue;}

            this.action+=paramStart+arForm[i].name+"="+arForm[i].value;
            paramStart = "&";
        }
    }
    window.location.href = encodeURI(this.action);

})
// Олег: функция берет данные из сессии по имени
function getCookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
