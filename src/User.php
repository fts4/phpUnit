<?php


class User
{
    public $first_name;
    public $sur_name;

    /**
     * @return string
     */
    public function getFullName()
    {
        return trim("$this->first_name $this->sur_name");
    }
}