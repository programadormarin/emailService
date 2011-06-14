$(document).ready(function() {
  $('#mensagem').hide();
  $('#porta').setMask('99999');
  $('#cadastroForm').validate({
	  rules: {
		     nome: "required",
		     email: {
		       required: true,
		       email: true
		     },
  			 host: {
  				required: true,
  				minlength: 4 
  			 },
  			 porta: {
  				required: true,
  				minlength: 3 
  			 },
  			 apelido: {
  				required: true,
  				minlength: 4
  			 },
  			 senha: {
  				required: true,
  				minlength: 4
  			 }
		   },
	  messages: {
			nome: " Digite o seu nome.",
			email: {
				required: " Digite o seu e-mail.",
				email: " Digite um e-mail válido."
			},
		   host: {
			   required: " Digite seu host do seu servidor.",
			   minlength: " O host deve ter no mínimo 4 caracteres."
		   },
		   porta: {
			   required: " Digite a porta do seu servidor SMTP.",
			   minlength: " A porta deve ter mínimo 3 números."
			   },
		   apelido: {
			   required: " Digite o seu apelido.",
			   minlength: " O apelido deve ter no mínimo 4 caracteres"
		   },
		   senha: {
			   required: " Digite a senha de acesso ao seu e-mail.",
			   minlength: " A senha deve ter no mínimo 4 caracteres."
		   }
	  }
  });
});