<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $resp = default_response();

        $customer_non_active = $this->db->get_where("customer", "customer_status='0'")->num_rows();
        $customer_active = $this->db->get_where("customer", "customer_status='1'")->num_rows();
        $customer_pending = $this->db->get_where("customer", "customer_status='2'")->num_rows();

        $package_request_pickup = $this->db->get_where("package", "package_status='REQUEST PICKUP'")->num_rows();
        $package_karantina = $this->db->get_where("package", "package_status='KARANTINA'")->num_rows();
        $package_pengiriman = $this->db->get_where("package", "package_status='PENGIRIMAN'")->num_rows();
        $package_selesai = $this->db->get_where("package", "package_status='SELESAI'")->num_rows();

        $resp = [
            "success" => true,
            "message" => "Request Scuccesfully",
            "data" => [
                "customer" => [
                    "non_active" => $customer_non_active,
                    "active" => $customer_active,
                    "pending" => $customer_pending
                ],
                "package" => [
                    "request_pickup" => $package_request_pickup,
                    "karantina" => $package_karantina,
                    "pengiriman" => $package_pengiriman,
                    "selesai" => $package_selesai
                ]
            ],
            "count" => 1
        ];

        j_encode($resp, "raw");
    }
}
