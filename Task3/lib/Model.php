<?php


class Model
{
    protected Database $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {

    }

    public function connect()
    {
        $this->db = new Database();
    }
}