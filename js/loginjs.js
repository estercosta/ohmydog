function validacao(){
	if (document.form.email.value ==""||
	    document.form.email.value.indexOf('@')==-1 ||
	    document.form.email.value.indexOf('.')==-1){

	   alert("Por favor, digite um endereço de email válido.");
	   document.form.email.focus();
	   return false;
}
	var senha = document.getElementById('senhaCampo');
	if (senha.value.length < 6 || senha.value.length > 10) {
		alert('Por favor, nos informe uma senha valida');
		return false;
	}
}