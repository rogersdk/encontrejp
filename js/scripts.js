$('document').ready(function(){
	$("#navigator").scrollable();
	$(".fancybox").fancybox({
	openEffect	: 'none',
	closeEffect	: 'none'
	});

$(function(){
    $('.carousel').carousel({interval:500});

})
    
  	$('.form_contato').validate({
            rules : {
                nome: 'required',
                email: {
                    required: true,
                    email: true
                },
                mensagem: 'required'
            },
            messages : {
                nome: {
                    required: 'Campo Obrigatório',
                },
                email: {
                    required: 'Campo Obrigatório',
                    email: 'E-mail inválido'
                },
                mensagem: 'Campo Obrigatório'
            },
            errorClass: 'erro',
            errorElement: 'p',
            errorPlacement: function(error, element) {
                element.after(error);
            },
            debug:true,
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    target: '#response',
                    resetForm: true             
                });
            }
        });
});