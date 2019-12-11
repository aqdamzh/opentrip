<?php

class Destination_model extends CI_Model {
    public function getAllDestination(){
        $sql = "select * from destination natural join country";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getPrice($id, $date){
        $sql = "select * from price natural join duration where destination_id = ? and departure = ?";
        $query = $this->db->query($sql, array($id, $date));
        return $query->result();
    }
    public function getDestination($id){
        $sql = "select * from destination natural join country where destination_id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row();
    }

    public function getDurationID($day,$night){
        $sql = "select duration_id from duration where day = ? and night = ?";
        $query = $this->db->query($sql, array($day, $night));
        return $query->row();
    }

    public function input_price($data){
        $this->db->insert('price', $data);
    }
}