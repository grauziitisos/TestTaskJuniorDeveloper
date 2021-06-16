<?php


class Database extends PDO
{

    /**
     * Database constructor.
     */
    public function __construct()
    {
        parent::__construct("mysql:host=localhost;dbname=subscriptions", "subscriptions", "subscriptions");
    }
}