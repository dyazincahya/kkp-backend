<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $resp = default_response();

        $rb = raw_body();
        $customer_no_ktp = isset($rb['no_ktp']) ? $rb['no_ktp'] : null;
        $customer_nama = isset($rb['nama']) ? $rb['nama'] : null;
        $customer_email = isset($rb['email']) ? $rb['email'] : null;
        $customer_password = isset($rb['password']) ? $rb['password'] : null;
        $customer_no_telp = isset($rb['no_telp']) ? $rb['no_telp'] : null;
        $customer_tgl_lahir = isset($rb['tgl_lahir']) ? $rb['tgl_lahir'] : null;
        $customer_kota_tinggal = isset($rb['kota_tinggal']) ? $rb['kota_tinggal'] : null;
        $customer_alamat = isset($rb['alamat']) ? $rb['alamat'] : null;

        $check_admin = $this->db->get_where("admin", "admin_email='" . $customer_email . "'")->num_rows();
        $check_kurir = $this->db->get_where("kurir", "kurir_email='" . $customer_email . "'")->num_rows();
        $check_customer = $this->db->get_where("customer", "customer_email='" . $customer_email . "'")->num_rows();


        if($check_admin > 0){
            $resp = default_response("Email ini sudah terdaftar sebagai admin!");
        }

        if($check_kurir > 0){
            $resp = default_response("Email ini sudah terdaftar sebagai kurir!");
        }

        if($check_customer > 0){
            $resp = default_response("Email ini sudah terdaftar sebagai customer!");
        }
        
        if($check_admin === 0 && $check_kurir === 0 && $check_customer === 0){
            if(!empty($customer_no_ktp) && !empty($customer_nama) && !empty($customer_email) && !empty($customer_password) && !empty($customer_no_telp) && !empty($customer_tgl_lahir) && !empty($customer_kota_tinggal) && !empty($customer_alamat)){
                $arr_data = [
                    "customer_no_ktp" => $customer_no_ktp,
                    "customer_nama" => $customer_nama,
                    "customer_email" => $customer_email,
                    "customer_password" => $customer_password,
                    "customer_no_telp" => $customer_no_telp,
                    "customer_tgl_lahir" => $customer_tgl_lahir,
                    "customer_kota_tinggal" => $customer_kota_tinggal,
                    "customer_alamat" => $customer_alamat
                ];

                $this->db->insert("customer", $arr_data);

                $resp = [
                    "success" => true,
                    "message" => "Registrasi Berhasil",
                    "data" => $arr_data,
                    "count" => 1
                ];
            }
        }

        j_encode($resp, "raw");
    }
}
