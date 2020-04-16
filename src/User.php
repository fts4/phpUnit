<?php


class User
{
    // class attributes are declared as public simply for the sake
    // of the examples used here. Ideally, these attributes/properties
    // should be private

    public $first_name;
    public $sur_name;

    /**
     * Email address
     * @var string
     */
    public $email;

    /**
     * Mailer object
     * $var Mailer
     */
    protected $mailer;


    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->sur_name");
    }

    public function notify($message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }
}