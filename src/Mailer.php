<?php

/**
 * Mailer
 *
 * Send messages
 */
class Mailer
{
    /**
     * Send a message
     *
     * @param string $emailAddress The email address
     * @param string $message The message
     *
     * @return boolean True if sent, false otherwise
     */
    public function sendMessage($emailAddress, $message)
    {
        // Use mail() or PHPMailer for example
        sleep(3);

        echo "send '$message' to '$emailAddress'";

        return true;
    }
}