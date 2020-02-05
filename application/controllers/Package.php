<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $resp = default_response();

        $keyword = strtoupper(get_raw_body("keyword"));
        $status = strtoupper(get_raw_body("status"));

        $where = "UPPER(package_keterangan) LIKE '%" . $keyword . "%' AND package_status='" . $status . "'";
        $package = $this->db->get_where("package", $where);

        if($package->num_rows() > 0){
            $resp = [
                "success" => true,
                "message" => "Request Scuccesfully",
                "data" => $package->result_array(),
                "total" => $package->num_rows()
            ];
        }

        j_encode($resp, "raw");
    }

}
