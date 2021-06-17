<?php


use JuniorDeveloper\Task3\subscription;

class Index_model extends Model
{

    /**
     * index_model constructor.
     */
    public function __construct()
    {
        require_once("lib/subscription.php");
    }

    public function getTotalPages($sort, $filter, $filter2, $pageno)
    {
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM subscriptions"
            . (isset($filter) ? " WHERE `email` LIKE '%" . $filter . "'" : "");
        if (isset($filter2)) {
            $total_pages_sql = $total_pages_sql . (isset($filter) ? " AND" : " WHERE") . " ";
            $total_pages_sql = $total_pages_sql . " `email` LIKE '%" . $filter2 . "%'";
        }
        $result = $this->db->query($total_pages_sql);
        $total_rows = $result->fetch();
        $total_pages = ceil(intval($total_rows[0]) / $no_of_records_per_page);
        return $total_pages;
    }

    public function getProviders($filter2)
    {
        $sql = "SELECT * FROM subscriptions ".(isset($filter2)? " WHERE `email` LIKE '%".$filter2."%'" : "");
        $data = $this->db->query($sql);
        $providers = array();
        while ($row = $data->fetch()) {
            $prov = explode("@", $row['email'])[1];
            if (!isset($providers[$prov])) {
                $providers[$prov] = $prov;
            }
        }
        return $providers;
    }

    public function getList($sort, $filter, $filter2, $pageno): array
    {
        $no_of_records_per_page = 10;
        $offset = ($pageno - 1) * $no_of_records_per_page;

        $sql = "SELECT * FROM subscriptions" .
            (isset($filter) ? " WHERE `email` LIKE '%" . $filter . "'" : "");
        if (isset($filter2)) {
            $sql .= isset($filter) ? " AND" : " WHERE" . " ";
            $sql .= " `email` LIKE '%" . $filter2 . "%'";
        }

        $sql .=  " ORDER BY " . ($sort ?? "date ASC")
            . " LIMIT " . $offset . ", " . $no_of_records_per_page;
        var_dump($sql);
        $data = $this->db->query($sql);
        $list = array();
        while ($row = $data->fetch()) {
            $subscription = new subscription();
            $subscription->setId(intval($row['id']));
            $subscription->setDate(DateTime::createFromFormat('Y-m-d H:i:s', $row['date']));
            $subscription->setEmail($row['email']);
            $list[] = $subscription;
        }
        return $list;
    }

    public function massDelete($ids)
    {
        $idstring = implode("','", $ids);
        $this->db->query("DELETE FROM subscriptions WHERE id IN ('" . $idstring . "')");
    }

}