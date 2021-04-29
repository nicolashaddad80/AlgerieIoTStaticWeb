<?php
// inclure ici le fichier de la classe
require "sms/FreeMobile.php";

$field_name = $_POST['cf_name'];
$field_email = $_POST['cf_email'];
$field_message = $_POST['cf_message'];

	
$mail_to='algerieiot@gmail.com';

$subject = 'Message from a site visitor ' . $field_name;

$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_message;

$headers = 'From:'.$field_email;

//sending sms


 
$sms = new SMS\FreeMobile();
 
/**
 * configure l'ID utilisateur et la clé disponible dans
 * le compte Free Mobile après avoir activé l'option.
 */
$sms->setKey("5Nz6mYowPxu5ud")
    ->setUser("19166666");
 
try {
    // envoi d'un message
    $sms->send("Algérie IoT:\r\n".$body_message);
} catch (Exception $e) {
    // le monde n'est pas parfait, il y aura
    // peut-être des erreurs.
    echo "Erreur sur envoi de SMS: (".$e->getCode().") ".$e->getMessage();
}

// Sending mail
$reponse = mail($mail_to, $subject, $body_message, $headers);






if ($reponse) { ?>
    <script language="javascript" type="text/javascript">
        // Print a message
        alert('Nous vous remerçions pour votre message. nous vous contacterons dans les meilleurs délais.');
        // Redirect to some page of the site. You can also specify full URL, e.g. http://template-help.com
        window.location = './contact.html';
    </script>
<?php
}



else { ?>
    <script language="javascript" type="text/javascript">
        // Print a message
        alert('Erreur! . SVP,envoyez un email à: algerieiot@gmail.com');
        // Redirect to some page of the site. You can also specify full URL, e.g. http://template-help.com
        window.location = './contact.html';
    </script>
<?php
}?>