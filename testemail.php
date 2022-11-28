<?php
$to="marie.ucles@gmail.com";
$subject= " Utilisation de mail avec PHP depuis Windows";
$message="test";

$headers="Content-Type: text/plain; chasert=utf-8\r\n";
$headers="From : marie.ucles@gmail.com\r\n";
if(mail($to,$subject,$message,$headers))
{
    echo: 'Envoyé!';
}

else 
{
    echo 'Erreur envoi';
}

?>