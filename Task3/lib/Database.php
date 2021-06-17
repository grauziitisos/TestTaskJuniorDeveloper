<?php


class Database extends PDO
{

    /**
     * Database constructor.
     */
    public function __construct()
    {
        //parent::__construct("mysql:host=localhost;dbname=subscriptions", "subscriptions", "subscriptions");
        //parent::__construct("mysql:host=sql104.epizy.com;dbname=epiz_28906882_subscriptions", "epiz_28906882", "ugnsy5ad2pRUFRP");
        parent::__construct("mysql:host=fdb31.runhosting.com;dbname=3874475_subscriptions", "3874475_subscriptions", "subscriptions123");
    }
}