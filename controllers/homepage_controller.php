<?php
declare(strict_types=1);



if(isset($_POST['contact']))
{
    $url = $_SERVER['REQUEST_URI'];
    $components = parse_url($url);
    parse_str($components['query'], $results);
    // VARIABLES 
    $name = htmlspecialchars($_POST['name']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $email = htmlspecialchars($_POST['email']);
    $codePostal = htmlspecialchars($_POST['codePostal']);
    $date = htmlspecialchars($_POST['date']);
    $hour = htmlspecialchars($_POST['hour']);
    $pseudoSkype = htmlspecialchars($_POST['pseudoSkype']);

    $msg =  'Ceci est un message d\'un client potentiel qui prends contact avec vous via le formulaire du site'."\n\n";
    $msg .= 'Nom: '.$name."\n\n";
    $msg .= 'Numéro: ' . $telephone."\n\n";
    $msg .= 'Email: '. $email."\n\n";
    $msg .= 'Code Postal: '.$codePostal."\n\n";
    $msg .= 'Date souhaitée du RDV: ' .$date."\n\n";
    $msg .= 'Heure souhaitée du RDV: ' .$hour."\n\n";
    $msg .= 'Le client aimerais vous rencontrer en: '.$pseudoSkype."\n\n";

    $jour = date('d');
    $mois = date ('m');
    $annee = date ('y');
    $heure = date('H');
    $minute = date('i');
    $msg .= 'Date d\'envoi: '. $jour . '/' . $mois . '/' . $annee . ' à ' . $heure. 'h' . $minute ;

    $recipient = $results['email'];
    $subject = "Prendre un rdv Dynasty-Patrimoine";  
    $mailheaders = "De: Prendre un rdv Dynasty-Patrimoine<> \n";
    $mailheaders .= $_POST['email'];
                   
    mail($recipient, utf8_decode($subject),utf8_decode($msg), utf8_decode($mailheaders));

    echo "<HTML><HEAD>";
    echo "<meta charset='UTF-8'>";
    echo "<TITLE>Formulaire envoyé!</TITLE></HEAD><BODY>";
    echo "<H1 align=center>Merci</H1>";
    echo "<P align=center>";
    echo "Votre message à bien été envoyé !</P>";
    echo "<P align=center>";
    echo "Notre conseiller vous recontacte très rapidement !</P>";
    echo "</BODY></HTML>";                            
}
require './views/index.phtml';
