<?php

namespace Utils;

// Une class EmailSender => ne permet d'envoyer des Emails à une seule personne 
class EmailSender {

	private $errors;
    private $isSend;

    private $mailDest;
    private $subject;
    private $contentMessage;


    public function __construct($mailDest) {
        $this->errors = []; 
        $this->isSend = true; 
        $this->mailDest = $mailDest;   
    }

    protected function addError($message){
        $this->errors = $message ;
        $this->isSend = false;
    }

    public function sendEmail() {
        $mail = new \PHPMailer;

        $mail->Host = 'smtp.domaine.fr';

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = "smtp.gmail.com";
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "moinonc@gmail.com";
        //Password to use for SMTP authentication
        $mail->Password = "Orleans45";

        //Set who the message is to be sent from
        $mail->setFrom('moinonc@gmail.com', 'Kikala');

        //Set an alternative reply-to address
        $mail->addReplyTo('moinonc@gmail.com', 'Kikala');

        //Set who the message is to be sent to
        $mail->addAddress($this->mailDest);

        //Set the subject line
        $mail->Subject = $this->subject;

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($this->contentMessage);

        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';

        //send the message, check for errors
        if (!$mail->send()) {
            $this->addError($mail->ErrorInfo);
        }    
    }     

     


    /**
     * Gets the value of errors.
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets the value of errors.
     *
     * @param mixed $errors the errors
     *
     * @return self
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;

        return $this;
    }

    /**
     * Gets the value of isSend.
     *
     * @return mixed
     */
    public function getIsSend()
    {
        return $this->isSend;
    }

    /**
     * Sets the value of isSend.
     *
     * @param mixed $isSend the is send
     *
     * @return self
     */
    public function setIsSend($isSend)
    {
        $this->isSend = $isSend;

        return $this;
    }

    /**
     * Gets the value of mailDest.
     *
     * @return mixed
     */
    public function getMailDest()
    {
        return $this->mailDest;
    }

    /**
     * Sets the value of mailDest.
     *
     * @param mixed $mailDest the mail dest
     *
     * @return self
     */
    public function setMailDest($mailDest)
    {
        $this->mailDest = $mailDest;

        return $this;
    }

    /**
     * Gets the value of subject.
     *
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Sets the value of subject.
     *
     * @param mixed $subject the subject
     *
     * @return self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Gets the value of subject.
     *
     * @return mixed
     */
    public function getContentMessage()
    {
        return $this->contentMessage;
    }

    /**
     * Sets the value of subject.
     *
     * @param mixed $subject the subject
     *
     * @return self
     */
    public function setContentMessage($contentMessage)
    {
        $this->contentMessage = $contentMessage;

        return $this;
    }
}