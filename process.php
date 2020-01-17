<link href="maths.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style><p align="center" class="text5">&nbsp;</p>
<p align="center" class="text5">
  <?php

//reemplace yo@email.com por la dirección a donde quieres que se mande los datos.
$recipiente = "axanglo@gmail.com, contacto@maths.cl";

//reemplace asunto por el asunte que quieres en el email
$asunto = "Contacto desde Maths.cl";

$error = 0;

//los campos mandados por el formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$celular = $_POST['celular'];
$telefono = $_POST['telefono'];
$comuna = $_POST['comuna'];
$email = $_POST['email'];
$colegio = $_POST['colegio'];
$cmbComo = $_POST['cmbComo'];
$cmbProducto = $_POST['cmbProducto'];
$consulta = $_POST['consulta'];

//verificación si los campos requeridos estan llenos
if($nombre == "" || $apellido == "" || $email == "" || $consulta == ""){
   $error=1;
}
//verificación si el email es correcto
elseif(!eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$",$email)){
   $error=2;
}

//mensajes de error
if($error==1){
   echo "El siguiente error ha ocurrido!<br />";
   echo "No ha rellenado todos los campos obligatorios.<br /> Por favor vuelva <A HREF=\"javascript:history.back()\">atras</A>.<br />";
}

elseif($error==2){
   echo "El siguiente error ha ocurrido!<br />";
   echo "El correo electronico es invalido!<br /> Por favor vuelva <A HREF=\"javascript:history.back()\">atras</A>.<br />";
}

//envio del email con los datos
else{
   $message ="Nombres: ".$nombre."<br />";
   $message ="Apellidos: ".$apellido."<br />";
   $message ="Celular: ".$celular."<br />";
   $message ="Telefono: ".$telefono."<br />";
   $message ="Comuna: ".$comuna."<br />";
   $message ="Email: ".$email."<br />";
   $message ="Colegio: ".$colegio."<br />";
   $message ="Como nos conoció: ".$cmbComo."<br />";
   $message ="Producto: ".$cmbProducto."<br />";
   $message ="Consulta: ".$consulta."<br />";
   
   $message = stripslashes($message);
   
   $headers = "MIME-Version: 1.0\r\n";
   $headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
   $headers .= "From: $email\r\n";
   $headers .= "Repaly-to: $email\r\n";
   $headers .= "Cc: $email\r\n";
   
   mail($recipiente,$asunto,$message,$headers);
   
   //aqui puedes modificar los mensajes
   echo "El mensaje ha sido enviado!<br />";
   echo "Gracias por su mensaje.<br />Le enviaremos una respuesta lo antes posible.<br />";
   echo "Volver al <A HREF=\"right.htm\">sitio web</A>.<br />";

}
?>
</p>