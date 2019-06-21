<?php
if(!empty($_POST['message'])){
    $mail = 'congres@issoudun.fr'; // Déclaration de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }
    /**
     * Déclaration des messages au format texte et au format HTML.
     */
    $message_txt = $_POST['firstname']." ".$_POST['name']." demande de réserver la salle ".$_POST['room']." le ".$_POST['date']." à ".$_POST['hours'].$passage_ligne.$passage_ligne.'Télephone : '.$_POST['phonenumber'].$passage_ligne.'E-mail : '.$_POST['email'].$passage_ligne.$passage_ligne.'Nombre de participants : '.$_POST['number'].$passage_ligne.'Restauration : '.$_POST['resto'].$passage_ligne.'Remarques : '.$passage_ligne.$_POST['message'];
    $message_html = "<html><head></head><body>".$_POST['firstname']." ".$_POST['name']." demande de réserver la salle ".$_POST['room']." le ".$_POST['date']." à ".$_POST['hours'].'<br/>'.'<br/>'.'Télephone : '.$_POST['phonenumber'].'<br/>'.'E-mail : '.$_POST['email'].'<br/>'.'<br/>'.'Nombre de participants : '.$_POST['number'].'<br/>'.'Restauration : '.$_POST['resto'].'<br/>'.'Remarques : '.'<br/>'.$_POST['message']."</body></html>";

    /**
     * Création de la boundary
     */
    $boundary = "-----=".md5(rand());

    /**
     * Définition du sujet.
     */
    $sujet = 'Demande de réservation';
    /**
     * Création du header de l'e-mail.
     */
    $header = "From: ".$_POST['email'];
    $header.= "Reply-to: \"".$_POST['firstname']." ".$_POST['lastname']."\" <".$_POST['email'].">".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

    /**
     * Création du message.
     */
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    /**
     * Ajout du message au format texte.
     */
    $message.= "Content-Type: text/plain; charset=\"us-ascii\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    /**
     * Ajout du message au format HTML
     */
    $message.= "Content-Type: text/html; charset=\"us-ascii\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;

    /**
     * Envoi de l'e-mail.
     */
    mail($mail,$sujet,$message,$header);
    header('Location: http://congreselysees.com/pages/sent.html');
    exit;
}
