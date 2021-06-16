<?php


class View
{
    /**
     * @var void
     */
    public $Subscriptions;

    /**
     * View constructor.
     */
    public function __construct()
    {
    }

    public function render($name)
    {
        include 'views/header.php';
        include 'views/' . $name . '_view.php';
        include 'views/footer.php';
    }
}