var modalFormLogin = '#sunny-form-body-login';
var modalFormRegister = '#sunny-form-body-register';
var modalFormForgot = '#sunny-form-body-forgot-password';
var loginTab = '#tabs-list-login';
var registerTab = '#tabs-list-register';

(function( $ ) {
	
	var methods = {
		init: function () {
				
		},
		
		showmodal: function (id, tab)
		{
			console.log(id);
			console.log(tab);
			
			$(modalFormLogin).hide();
			$(modalFormRegister).hide();
			if (tab == 'tabs-list-login') {
				$(modalFormLogin).show();
			} else if (tab == 'tabs-list-register') {
				$(modalFormRegister).show();
			}
			$(this).active('panelswitcher', tab);
			$('#' + id).show();
			$('.via_ajax').active('observe');
		},
		
		hidemodal: function (id)
		{
			$('#' + id).hide();
			$(modalFormLogin).hide();
			$(modalFormRegister).hide();
		},
		
		panelswitcher: function(id)
		{
			console.log(id);
			
			if (!$(loginTab).hasClass('login')) {
				$(loginTab).removeClass('login-active').toggleClass('login');
			}
			
			if (!$(registerTab).hasClass('register')) {
				$(registerTab).removeClass('register-active').toggleClass('register');
			}
			
//			$(registerTab).toggleClass('register');
			$(modalFormLogin).hide();
			$(modalFormRegister).hide();
			$(modalFormForgot).hide();
			
			if (id == 'tabs-list-login') {
				$(loginTab).removeClass('login').toggleClass('login-active');
				$(modalFormLogin).show();
			} else if (id == 'tabs-list-register') {
				$(registerTab).removeClass('register').toggleClass('register-active');
				$(modalFormRegister).show();
			} else if (id == 'sunny-form-body-forgot-password') {
				$(modalFormForgot).show();
			}
			
		},
		
		observe: function()
		{
			//log('observe');
			//uploader();
			//tooggleActions();
			//hoverMaker();
			
			
			return this.each(function(){
				var action = null;
				var attr   = null;
				
				if ($(this).is('a')) {
					action = 'click';
					attr   = 'href';
				} else if ($(this).is('form')) {
					action = 'submit';
					attr   = 'action';
					
				}
				
				if (action === null) {
					$.error( "Can't observe selected tags" );
				}
				
				$(this).unbind(action);
				
				var handler = function(event){
					event.preventDefault();
					event.stopPropagation();
					//log(action);
					var data   = {};
					if (action == 'submit') {
						if (typeof tinyMCE == 'object') {
							tinyMCE.triggerSave();
						}
						data = $(this).serialize();
						$(this).find('input, select, textarea, button').attr("disabled", "disabled");
						var url = $(this).find('input').val();
					} else {
						var url = $(this).attr('href');
					}
					$(this).active('request', url, data);
					return false;
				};
				
				$(this).bind(action, handler);
			});
			
			
			
			
		},
		
		
		request: function (url, data, _htmlCallback)
		{
			console.log('request');
			console.log(url);
			$('#sunny-form-error').html('');
			$('#sunny-form-error-register').html('');
			
			$.ajax({
				url: url,
				data: data,
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					
				},
				success: function(data, textStatus, jqXHR) {
					//console.log(jqXHR.responseText);
					var response = jqXHR.responseText;
					response = jQuery.parseJSON(response);
					
					var errors = response['errors'];
					
					if(errors.length > 0) {
						for (var i = 0; i < errors.length; i++) {
							if (url == '/frontendLogin') {
								$('#sunny-form-error').append(errors[i] + '<br />');
							} else if (url == '/frontendRegister') {
								$('#sunny-form-error-register').append(errors[i] + '<br />');
							}
						}
					} else {
						if (response['success']) {
							
								if (url == '/frontendLogin') {
									$('#sunny-form-success').append(response['success'] + '<br />');
								} else if (url == '/frontendRegister') {
									$('#sunny-form-success-register').append(response['success'] + '<br />');
								}
							
						}
						
						setTimeout(function() {window.location.href='';}, 2000);
					}
									
				},
				complete: function(jqXHR, textStatus) {}
			});
			$(this).find('input, select, textarea, button').removeAttr("disabled");
		},
		
		getfile: function (url)
		{
			console.log('getfile');
			console.log(url);
			$('#sunny-form-error').html('');
			$('#sunny-form-error-register').html('');
			
			$.ajax({
				url: url,
				data: [],
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					
				},
				success: function(data, textStatus, jqXHR) {
					//console.log(jqXHR.responseText);
					var response = jqXHR.responseText;
					if (response == 'error') {
						$(this).active('showmodal', 'modal-container', 'tabs-list-login');
					} else {
						window.location = '/' + response;
					}
									
				},
				complete: function(jqXHR, textStatus) {}
			});
			return false;
			
		},
		
		signtoaction: function (url)
		{
			console.log('signToAction');
			console.log(url);
			$('#sunny-form-error').html('');
			$('#sunny-form-error-register').html('');
			
			$.ajax({
				url: url,
				data: [],
				type: 'POST',
				error: function(jqXHR, textStatus, errorThrown) {
					
				},
				success: function(data, textStatus, jqXHR) {
					//console.log(jqXHR.responseText);
					var response = jqXHR.responseText;
					if (response == 'error') {
						$(this).active('showmodal', 'modal-container', 'tabs-list-login');
					} else {
						$(this).active('message', '"Спасибо, Ваша регистрация для участия в мероприятии "' + response + '" принята. В течении одного рабочего дня с Вами  свяжется менеджер и расскажет Вам все необходимые подробности"');
					}
									
				},
				complete: function(jqXHR, textStatus) {}
			});
			return false;
			
		},
		
		message: function (text)
		{
			alert(text);
		}
		
		
	};
	
	$.fn.active = function( method ) {
  
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.tooltip' );
		}    

	};
})( jQuery );



$(document).ready(function(){
	//observeFormOnSubmit();
	//observeAnchorOnClick();
	$.fn.active('observe');
	
	//uploader();
	//rightFormSelector();
});