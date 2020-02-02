<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $resp = default_response();

        $keyword = get_raw_body("keyword");
        $status = get_raw_body("status");

        $where = "package_keterangan LIKE '%" . $keyword . "%' AND package_status='" . $status . "'";
        $package = $this->db->get_where("package", $where);

        $resp = [
            "success" => true,
            "message" => "Request Scuccesfully",
            "data" => $package->result_array(),
            "total" => $package->num_rows()
        ];

        j_encode($resp, "raw");
    }

    public function customer(){
        $resp = default_response();

        $keyword = get_raw_body("keyword");
        $status = get_raw_body("status");

        $where = "customer_nama LIKE '%" . $keyword . "%' AND customer_status='" . $status . "'";
        $customer = $this->db->get_where("customer", $where);

        $resp = [
            "success" => true,
            "message" => "Request Scuccesfully",
            "data" => $customer->result_array(),
            "total" => $customer->num_rows()
        ];

        j_encode($resp, "raw");
    }
}
