<?php

class Destination_model extends CI_Model {
    public function getAllDestination(){
        $sql = "select * from destination natural join country";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getDestinationImage($where)
    {
        $sql = "SELECT picture,background from destination where destination_id = ?";
        $query = $this->db->query($sql, array($where));
        return $query->row();
    }
    public function getAllGuide(){
        $sql = "select * from guide";
        $query = $this->db->query($sql);
        return $query->result();
        return $query->row();
    }

    public function getAllGateway(){
        $sql = "select * from payment_gateway";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getGateway($id){
        $sql = "select * from payment_gateway where gateway_id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row();
    }


    public function getGuideInDate($berangkat, $pulang){
        $sql = "select distinct guide_id, nama from guide_schedule natural join trip natural join guide natural join destination natural join duration where ( date + day < ? or date > ? ) and ( ( not date+day < ? ) or ( not date > ? ) )";
        $query = $this->db->query($sql, array($berangkat, $pulang, $berangkat, $pulang));
        return $query->result();
    }

    public function updateJadwalGuide($guideschedule_id, $guide_id){
        $sql = "update guide_schedule set guide_id = ? where guideschedule_id = ?";
        $this->db->query($sql, array($guide_id, $guideschedule_id));
    }

    public function getGuideSchedules($limit, $start, $filterDestination = '', $filterGuide = ''){
        $sql = "select guideSchedule_id,g.*,name,date, date+day as return from guide_schedule natural join trip natural join guide g natural join destination natural join duration where name ilike ? and nama ilike ? limit ? offset ?";
        $query = $this->db->query($sql, array('%'.$filterDestination.'%', '%'.$filterGuide.'%', $limit, $start));
        return $query->result();
    }

    public function getGuideSchedule($where){
        $sql = "select guideSchedule_id,g.*,name,date, date+day as return from guide_schedule natural join trip natural join guide g natural join destination natural join duration where guideSchedule_id = ?";
        $query = $this->db->query($sql, array($where));
        return $query->row();
    }

    public function getDestinations($limit, $start, $filterDestination = ''){
        $sql = "select * from destination natural join country where name ilike ? limit ? offset ?";
        $query = $this->db->query($sql, array('%'.$filterDestination.'%', $limit, $start));
        return $query->result();
    }

    public function getBookings($limit, $start, $filterDestination){
        $sql = "select first_name, last_name, name, amount_people, amount, payment_date, method, tujuan_pembayaran, status from payment natural join booking natural join customer natural join trip natural join destination natural join payment_gateway natural join payment_method where name ilike ? limit ? offset ?";
        $query = $this->db->query($sql, array('%'.$filterDestination.'%', $limit, $start));
        return $query->result();
    }

    public function getTrips($limit, $start, $filterDestination = '', $filterTglMin = null, $filterTglMax = null , $filterDay = null, $filterNight = null, $filterPriceMin = null, $filterPriceMax = null){
        $sql = "select * from trip natural join duration natural join destination where name ilike ? and departure_date > to_date(COALESCE(?, '0001-01-01'), 'YYYY-MM-DD') and departure_date < to_date(COALESCE(?, '9999-12-30'), 'YYYY-MM-DD') and coalesce(day = ?, true) and coalesce(night = ?, true) and price > coalesce( ?, 0) and price < coalesce( ?, 999999999999) limit ? offset ?";
        $query = $this->db->query($sql, array('%'.$filterDestination.'%', $filterTglMin, $filterTglMax, $filterDay, $filterNight, $filterPriceMin, $filterPriceMax, $limit, $start));
        return $query->result();
    }

    public function countAllDestination($filterDestination = ''){
        $sql = "select * from destination natural join country where name ilike ? ";
        $query = $this->db->query($sql, array('%'.$filterDestination.'%'));
        return $query->num_rows();
    }

    public function countAllTrip($filterDestination = '', $filterTglMin = null, $filterTglMax = null , $filterDay = null, $filterNight = null, $filterPriceMin = null, $filterPriceMax = null ){
        $sql = "select * from trip natural join duration natural join destination where name ilike ? and departure_date > to_date(COALESCE(?, '0001-01-01'), 'YYYY-MM-DD') and departure_date < to_date(COALESCE(?, '9999-12-30'), 'YYYY-MM-DD') and coalesce(day = ?, true) and coalesce(night = ?, true) and price > coalesce( ?, 0) and price < coalesce( ?, 999999999999)";
        $query = $this->db->query($sql, array('%'.$filterDestination.'%', $filterTglMin, $filterTglMax, $filterDay, $filterNight, $filterPriceMin, $filterPriceMax));
        return $query->num_rows();
    }

    public function countAllGuideSchedule($filterDestination = '', $filterGuide = ''){
        $sql = "select * from guide_schedule natural join trip natural join guide g natural join destination natural join duration where name ilike ? and nama ilike ?";
        $query = $this->db->query($sql, array('%'.$filterDestination.'%', '%'.$filterGuide.'%'));
        return $query->num_rows();
    }

    public function countAllBooking($filterDestination = ''){
        $sql = "select * from payment natural join booking natural join customer natural join trip natural join destination natural join payment_gateway natural join payment_method where name ilike ? ";
        $query = $this->db->query($sql, array('%'.$filterDestination.'%'));
        return $query->num_rows();
    }

    
    public function getDestinationTrip($id){
        $sql = "select * from trip natural join duration where destination_id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->result();
    }

    public function getTrip($id){
        $sql = "select * from trip natural join destination natural join duration where trip_id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row();
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

    public function inSchedule($departure, $day){
        $sql = "select date, date+day as return from guide_schedule natural join trip natural join duration where date > dateadd(day,?,?) and date+day < ?";
        $query = $this->db->query($sql, array($day, $departure, $departure));
        return $query->num_rows();
    }

    public function inBooking($trip_id, $customer_id, $amount_people, $amount_price){
        $sql1 = "select * from booking order by booking_id desc limit 1";
        $sql2 = "insert into booking(booking_id,trip_id,customer_id,amount_people,amount_price,status) values(?,?,?,?,?,'Menunggu Konfirmasi')";
        $query = $this->db->query($sql1);
        $booking_id = $query->row()->booking_id + 1;
        
        $this->db->query($sql2, array($booking_id,$trip_id,$customer_id,$amount_people,$amount_price));
        return $booking_id;
    }

    public function inPayment($gateway_id,$payment_date,$amount_price, $booking_id){
        $sql1 = "select * from payment order by payment_id desc limit 1";
        $sql2 = "insert into payment(booking_id, gateway_id, payment_date, amount, payment_id) values(?,?,?,?,?)";
        $query = $this->db->query($sql1);
        $payment_id = $query->row()->payment_id + 1;
        $this->db->query($sql2, array($booking_id,$gateway_id,$payment_date,$amount_price,$payment_id));
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