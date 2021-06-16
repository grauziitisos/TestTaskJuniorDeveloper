<?php


class Subscribe_model extends Model
{

    /**
     * Subscribe_model constructor.
     */
    public function __construct()
    {
    }

    public function addSubscriber(\JuniorDeveloper\Task3\subscription $subscription){
        $data = [
            'email' => $subscription->getEmail()
        ];
        $sql = "INSERT INTO subscriptions (id, date, email) VALUES (NULL, current_timestamp(), :email)";
        $stmt= $this->db->prepare($sql);
        $stmt->execute($data);
        //$data = $this->db->query("INSERT INTO subscriptions "."(`id`, `date`, `email`) VALUES (NULL, current_timestamp(), '".$subscription->getEmail()."')");
    }
}