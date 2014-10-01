<?php
//require_once $_SERVER['DOCUMENT_ROOT'].'/KS/negocio/mod_librosbdi.php';
//
//$libros = new mod_librosbdi();
//
//$registros = $libros->consultarLibrosBDI(1923);
//
//for ($index = 0; $index < count($registros); $index++) {
//    
//    $id = $registros[$index][0];
//    $id_libro = $registros[$index][1]; //marginal
//    $titulo   = $registros[$index][2];
//    $id_caso  = $registros[$index][3];
//    
//    echo 'ID:'.$id." MAR:".$id_libro." TI:".$titulo." CA:".$id_caso."<br />";
//    
//}


//$xml_titulo = simplexml_load_file("http://82.223.210.105:8080/bdi2ks/getTitulo.php?id=915240",NULL,TRUE);
//echo "AA".utf8_decode($xml_titulo->valor)."";


?>
<HTML>
<script language=javascript>
var ventana1 = null;
function ventanaSecundaria (URL){
ventana1=window.open(URL,"ventana1","width=670,hei ght=550,scrollbars=NO,TOP=50,left=180 ,RESIZABLE=YES,");
ventana1.focus();
}
function ventanaClose() {
if(ventana1 != null) if(!ventana1.closed) ventana1.close();
}
</script>

<body vlink="112233" alink="885522" bgcolor="eeeeee" onUnLoad="ventanaClose();">
<a href="javascript:ventanaSecundaria('http://espanol.geocities.com/compurojas/mar1.jpg')"> Clic aqu&iacute;</a>

</body>
</HTML>