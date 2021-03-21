<?php
ini_set('SMTP','smtp.free.fr');
ini_set("sendmail_from","algerieiot@free.fr");
mail("algerieiot@free.fr","Test","Petit test !") ;

$field_name = $_POST['cf_name'];
$field_email = $_POST['cf_email'];
$field_message = $_POST['cf_message'];

	
$mail_to="algerieiot@free.fr";

$subject = 'Message from a site visitor ' . $field_name;

$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_message;

$headers = "From: $cf_email\r\n";
$headers .= "Reply-To: $cf_email\r\n";
$headers .= 'MIME-version: 1.0'."\n"; 
$headers .= 'Content-type: text/html; charset= iso-8859-1';



$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>
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