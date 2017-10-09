function validaCampo()
{
if(document.login.user.value=="")
{
alert("Insira seu nome de usuário.");
return false;
}
else
if(document.login.pass.value=="")
{
alert("Insira sua senha.");
return false;
}
else
return true;
}

function deleteCookie(nome){
    var exdate = new Date();
    exdate.setTime(exdate.getTime() + (-1 * 24 * 3600 
       * 1000));
    document.cookie = nome + "=" + escape("")+ ((-1 
       == null) ? "" : "; expires=" + exdate);
  } 

function login(){
	
  alert("Olá, Bem Vindo!");

}