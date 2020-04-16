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

    /**
     * @return string
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->sur_name");
    }

    public function notify($message)
    {
        $mailer = new Mailer;
        return $mailer->sendMessage($this->email, $message);
    }
}