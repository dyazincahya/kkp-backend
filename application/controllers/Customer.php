<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	function index()
	{
        $resp = default_response();

        $keyword = strtoupper(get_raw_body("keyword"));
        $status = get_raw_body("status"); // 0=non active 1=active 2=pending

        $where = "UPPER(customer_nama) LIKE '%" . $keyword . "%' AND customer_status='" . $status . "'";
        $customer = $this->db->get_where("customer", $where);

        if($customer->num_rows() > 0){
            $resp = [
                "success" => true,
                "message" => "Request Scuccesfully",
                "data" => $customer->result_array(),
                "total" => $customer->num_rows()
            ];    
        }
        
        j_encode($resp, "raw");
    }

    function mail_test(){
        $sender = zmailer([
            "to"        => "dyazincahya@gmail.com",
            "subject"   => "mail test",
            "message"   => "<h1>HALLO BRO</h1>"
        ]);

        if($sender){
            echo "email terkirim";
            exit();
        }
        echo "email tidak terkirim";
    }

}
