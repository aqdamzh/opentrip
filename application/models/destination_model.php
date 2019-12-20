<?php

class Destination_model extends CI_Model {
    public function getAllDestination(){
        $sql = "select * from destination natural join country";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getAllGuide(){
        $sql = "select * from guide";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getGuideSchedules($limit, $start){
        $sql = "select guideSchedule_id,g.*,name,date, date+day as return from guide_schedule natural join trip natural join guide g natural join destination natural join duration limit ? offset ?";
        $query = $this->db->query($sql, array($limit, $start));
        return $query->result();
    }

    public function getDestinations($limit, $start){
        $sql = "select * from destination natural join country limit ? offset ?";
        $query = $this->db->query($sql, array($limit, $start));
        return $query->result();
    }

    public function getBookings($limit, $start){
        $sql = "select first_name, last_name, name, amount_people, amount, payment_date, method, tujuan_pembayaran, status from payment natural join booking natural join customer natural join trip natural join destination natural join payment_gateway natural join payment_method limit ? offset ?";
        $query = $this->db->query($sql, array($limit, $start));
        return $query->result();
    }

    public function getTrips($limit, $start){
        $sql = "select * from trip natural join duration limit ? offset ?";
        $query = $this->db->query($sql, array($limit, $start));
        return $query->result();
    }

    public function countAllDestination(){
        return $this->db->get('destination')->num_rows();
    }

    public function countAllTrip(){
        return $this->db->get('trip')->num_rows();
    }

    public function countAllGuideSchedule(){
        return $this->db->get('guide_schedule')->num_rows();
    }

    public function countAllBooking(){
        return $this->db->get('booking')->num_rows();
    }

    
    public function getTrip($id, $date){
        $sql = "select * from trip natural join duration where destination_id = ? and departure = ?";
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

    public function input_trip($data){
        $this->db->insert('trip', $data);
    }

    public function inDestination($departure, $day){
        $sql = "select * from destination where name = ?";
        $query = $this->db->query($sql, array($where));
        return $query->num_rows();
    }

    public function inSchedule($where){
        $sql = "select date, date+day as return from guide_schedule natural join trip natural join duration where date <= ? + ? and date+day > ? + ?";
        $query = $this->db->query($sql, array($departure, $day, $departure, $day));
        return $query->num_rows();
    }

    public function input_destination($data){
        $this->db->insert('destination', $data);
    }

    public function deleteDestination($data){
        $sql = "delete from destination where destination_id = ? ";
        $this->db->query($sql, array($data));
    }

    public function deleteTrip($data){
        $sql = "delete from trip where trip_id = ? ";
        $this->db->query($sql, array($data));
    }

    public function deleteDestination_trip($data){
        $sql = "delete from trip where destination_id = ? ";
        $this->db->query($sql, array($data));
    }

    public function up_destination_bg($data, $where){
        $sql = "update destination set background = ? where destination_id = ?";
        $this->db->query($sql, array($data, $where));
    }
}