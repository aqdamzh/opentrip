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
    public function addCustomer($email,$password,$first_name,$last_name)
    {
        $sql1 = "select * from customer order by customer_id desc limit 1";
        $sql2 = "INSERT INTO email values(?,?,?,?,?,?)";
        $sql3 = "INSERT INTO customer values(?,?,?,?,?,?)";
        $query = $this->db->query($sql1);
        $email_id = $query->row()->customer_id + 1;
        $customer_id = $query->row()->customer_id + 1;
        $this->db->query($sql2, array($email_id,$email,$password,$customer_id,2,NULL));
        $this->db->query($sql3, array($customer_id,$first_name,$last_name,NULL,NULL,NULL));
    }
}

?>