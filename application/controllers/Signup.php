<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $rb = raw_body();

        $customer_no_ktp = $rb['no_ktp'];
        $customer_nama = $rb['nama'];
        $customer_email = $rb['email'];
        $customer_password = $rb['password'];
        $customer_no_telp = $rb['no_telp'];
        $customer_tgl_lahir = $rb['tgl_lahir'];
        $customer_kota_tinggal = $rb['kota_tinggal'];
        $customer_alamat = $rb['alamat'];

        $check_admin = $this->db->get_where("admin", "admin_email='" + $customer_email + "'")->num_rows();
        $check_kurir = $this->db->get_where("admin", "kurir_email='" + $customer_email + "'")->num_rows();
        $check_customer = $this->db->get_where("customer", "customer_email='" + $customer_email + "'")->num_rows();

        $resp = default_response();

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

        j_encode($resp, "raw");
    }
}
