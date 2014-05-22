//google maps
function armardireccion(){
	var calle = document.getElementById('calle').value;
	var nro = document.getElementById('nro').value;
	
	var indice = document.getElementById('provincia').selectedIndex;
	var provincia = document.getElementById('provincia').options[indice].text ;
	
	var indice2 = document.getElementById('departamento').selectedIndex;
	var departamento = document.getElementById('departamento').options[indice2].text ;
	
	var direccion = calle + " " + nro + " " + provincia + " " + departamento;
	
	load(direccion);
}


function load(lugar) {
		if (GBrowserIsCompatible()) {
			var map = new GMap2(document.getElementById("map"));
			map.setCenter(new GLatLng(0,0), 0);
			map.addControl(new GSmallMapControl());
			map.addControl(new GScaleControl());
			map.addControl(new GMapTypeControl());
			GEvent.addListener(map, "click", function(overlay, point){ 
				if(overlay){ 
					if(overlay.title)
						map.openInfoWindowHtml(overlay.getPoint(), overlay.title);
				}
			});
			var geocoder = new GClientGeocoder();
			geocoder.getLatLng(lugar, function(point) {
				if (!point) {
					alert("Lugar no encontrado");
				} else {
					map.setCenter(point, 16);    // 12 indica el valor de zoom
					var center = new GMarker(map.getCenter());
					center.title = lugar;
					map.addOverlay(center);
					map.openInfoWindowHtml(center.getPoint(), center.title);
				}
			});
			var center = new GMarker(map.getCenter());
    		center.title = "Centro del mapa";
			map.addOverlay(center);
			map.openInfoWindowHtml(center.getPoint(), center.title);
			document.getElementById("demo").innerHTML=lugar;
		}
	}


//datepicker
 $(function() {
    $( "#datepicker" ).datepicker({
      altField: "#alternate",
      altFormat: "DD, d MM, yy",
			minDate: -0, 
			maxDate: "+1M +15D" ,
			dateFormat: 'dd-mm-yy'
    });
  });


//completar los departamentos de las provincias
$(document).ready(function() { 
$("#provincia").change(function() {
		$("#mapa").removeClass('disabled');
		$("#departamento").empty();
		$("#departamento").append("<option value=\"\"></option>");
    $.getJSON('http://localhost/gestion_tms/index.php/usuarios/getDepartametos/'+$("#provincia").val(),function(data){
        console.log(JSON.stringify(data));
				
        $.each(data, function(k,v){
            $("#departamento").append("<option value=\""+k+"\">"+v+"</option>");
        }).removeAttr("disabled");
    });
});
});

//validar registro usuario
$(document).ready(function() {
    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').on('keyup, change', function() {
		var $group = $(this).closest('.input-group'),
			$addon = $group.find('.input-group-addon'),
			$icon = $addon.find('i'),
			state = false;
        console.log($(this).val());
    	if (!$group.data('validate')) {
			state = $(this).val() ? true : false;
		}else if ($group.data('validate') == "email") {
			state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val())
		}else if($group.data('validate') == 'cuil') {
			/*state = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test($(this).val())*/
			state = /^[0-9]{2}[-][0-9]{8}[-][0-9]{1}$/.test($(this).val())
		}else if($group.data('validate') == 'telefono') {
			state = /^[0-9]{3}[-][0-9]{7}$/.test($(this).val())
		}else if ($group.data('validate') == "length") {
			state = $(this).val().length >= $group.data('length') ? true : false;
		}else if ($group.data('validate') == "number") {
			state = !isNaN(parseFloat($(this).val())) && isFinite($(this).val());
		}

		if (state) {
				$addon.removeClass('danger');
				$addon.addClass('success');
				$icon.attr('class', 'fa fa-check');
		}else{
				$addon.removeClass('success');
				$addon.addClass('danger');
				$icon.attr('class', 'fa fa-times');
		}
	});
});


//Aviso de confirmación para el boton eliminar
$(document).ready(function() {
	$('.delete').click(function(){ 
	   if(window.confirm("Esta seguro que quiere eliminar el elemento?")){
	   }else{
	   return false;
	   }
	});
});


//Aviso de confirmación para el boton eliminar
$(document).ready(function() {
	$('.nuevo_presupuesto').click(function(){ 
	   if(window.confirm("Si no ha guardado los cambios se perderán, desea continuar?")){
	   }else{
	   return false;
	   }
	});
});

//Subir o bajar elemento del input
$(document).ready(function() {
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
 
$( '.fa-refresh' ).addClass('fa-spin'); 
$( '.confirm' ).addClass('disabled'); 
$( '.refresh' ).removeClass('disabled'); 
});

//solo numero en el input
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

//Muestra y oculta deltalle
$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>');
            }
            else
            {
                currentButton.html('<button class="btn btn-default"><i class="glyphicon glyphicon-chevron-down text-muted"></i></button>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

});


//Muestra y oculta deltalle
$(document).ready(function() {
    var panels = $('.carrito-infos');
    var panelsButton = $('.dropdown-carrito');
    panels.show();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

});


//Noticias Secundarias
$(document).ready(function() {
    var panels = $('.notisec-infos');
    var panels2 = $('.notisec-infos2');
    var panelsButton = $('.dropdown-notisec');
    panels.hide();
    panels2.show();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<p class="btn btn-danger"><i class="glyphicon glyphicon-chevron-up"></i> Cerrar</p>');
            }
            else
            {
                currentButton.html('<p class="btn btn-primary"><i class="glyphicon glyphicon-chevron-down"></i> Ver noticia</p>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

});

