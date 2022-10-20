$(document).ready(function () {

	$("#zipCode").mask("99999999");

	$('form').submit(function (e) {
		if(!validateFields()){
			return false;
		}		
		
		if (!validateName($('#name').val())) {
			return false;
		}

		if(!validateEmail($('#email').val())){
			return false;	
		}

		if(!validatePassword($('#password').val())){
			return false;
		}
	})

	function validateFields(){
		$('form :input[type=text], :input[type=password]').each(function(){
			var label = $($(this).parent().html()).html()
			label = label.split(':').slice(0)[0]

			if($(this).val() == ''){
				alert('Por favor insira um valor em ' + label)
				return false;
			}
		})
		return true;
	}

	function validateName(name) {
		const checkName = name.split(' ');
		const regex = /[0-9]/;
		
		if(checkName.length <= 1){
			alert('Por favor insira o nome completo!');
			return false
		}

		if(regex.test(name)){
			alert('Por favor insira somente letras.');
			return false
		}
		return true;
	}

	function validateEmail(email) {
		var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if(!regex.test(email)){
			alert('Por favor insira um e-mail válido.')
			return false;
		}
		return true;
	}

	function validatePassword(password){
		regexLetter = /[a-zA-Z]/
		regexNumber = /[0-9]/

		if(password.length < 8){
			alert('A senha deve conter pelo menos 8 digítos.');
			return false;
		}

		if(!regexLetter.test(password)){
			alert('A senha deve conter pelo menos 1 letra');
			return false;
		}

		if(!regexLetter.test(password)){
			alert('A senha deve conter pelo menos 1 letra');
			return false;
		}

		return true;
	}
});