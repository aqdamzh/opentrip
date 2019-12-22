<?php

class Model_user extends CI_Model
{
    public function getNameProfile($where)
    {
        $sql = "select (first_name||' '||last_name) as full_name,first_name,last_name from customer where customer_id = ?";
        $query = $this->db->query($sql, array($where));
        return $query->row();
    }
    public function getNameCity()
    {
        $sql = "SELECT * FROM city";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function update_customer($where, $data){
        $this->db->where($where);
        $this->db->update('customer', $data);
        
    }
}

?>