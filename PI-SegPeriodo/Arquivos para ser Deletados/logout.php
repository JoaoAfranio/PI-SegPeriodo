<?php
setcookie("logado", "");
?>
<HTML>
<HEAD>
<TITLE>Sistema de usuários</TITLE>
<meta http-equiv="refresh" content="3;url=index.html">
<script language="JavaScript">
  function deleteCookie(nome){
    var exdate = new Date();
    exdate.setTime(exdate.getTime() + (-1 * 24 * 3600 
       * 1000));
    document.cookie = nome + "=" + escape("")+ ((-1 
       == null) ? "" : "; expires=" + exdate);
  } 
</script>

</HEAD>
<BODY>
<FONT FACE="Verdana" SIZE="2">Você foi deslogado!</FONT>
<script language="JavaScript">
  deleteCookie("logado");
</script>

</BODY>
</HTML>
