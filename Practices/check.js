function check(){
			if (document.register.username.value==""){
				alert("Please enter the username!");
				document.register.username.focus();
				return false;
			}
			if (document.register.password.value==""){
				alert("Please enter the password");
				document.register.password.focus();
				return false;
			}
			if(document.register.password.value != document.register.confirmpassword.value){
				alert("Passwords are not match!");
				document.register.confirmpassword.focus();
				return false;
			}
			if(document.register.mail.value==""){
				alert("Please enter the email address!");
				document.register.mail.focus();
				return false;
			}
			else
			{


                         reg=/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi;
                         if(!reg.test(document.register.mail.value))
                      {
                         alert("wrong email format!  it must be xxxx@xxxx.xxx");
                         return false;
                       }
                }
	}
	