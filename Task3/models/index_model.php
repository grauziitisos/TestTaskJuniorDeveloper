<?php


use JuniorDeveloper\Task3\subscription;

class Index_model extends Model
{

    /**
     * index_model constructor.
     */
    public function __construct()
    {
    }

    public function getList($sort, $filter): array
    {
        require("lib/subscription.php");
        $data = $this->db->query("SELECT * FROM subscriptions".
            (isset($filter) ? "WHERE `email` LIKE '%".$filter : ""). " ORDER BY ".(isset($sort)? $sort : "date")." ASC");
        $list = array();
        while ($row = $data->fetch()) {
            $subscription = new subscription();
            $subscription->setId(intval($row['id']));
            $subscription->setDate(DateTime::createFromFormat('Y-m-d H:i:s',$row['date']));
            $subscription->setEmail($row['email']);
            $list[] = $subscription;
        }
        return $list;
    }

    public function massDelete($ids)
    {
        $idstring = implode("','", $ids);
        $this->db->query("DELETE FROM products WHERE id IN ('" . $idstring . "')");
    }

}