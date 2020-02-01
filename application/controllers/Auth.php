<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $resp = default_respose("User access not found!");

        $rb = raw_body();
        $email = val_checker($rb['email']);
        $password = val_checker(md5($rb['password']));

        $admin_where = "admin_email='" . $email . "' AND admin_password='" . $password . "'";
        $admin = $this->db->get_where("admin", $admin_where);


        if($admin->num_rows() < 1){
            $customer_where = "customer_email='" . $email . "' AND customer_password='" . $password . "'";
            $customer = $this->db->get_where("customer", $customer_where);

            if($customer->num_rows() > 0){
                $dataset = $customer->row_array();
                $resp = [
                    "success" => true,
                    "message" => "Request Successfully",
                    "data" => [
                        "user_id" => $dataset['customer_id'],
                        "user_role" => "customer",
                        "user_no_ktp" => $dataset['customer_no_ktp'],
                        "user_nama" => $dataset['customer_nama'],
                        "user_email" => $dataset['customer_email'],
                        "user_password" => $dataset['customer_password'],
                        "user_no_telp" => $dataset['customer_no_telp'],
                        "user_tgl_lahir" => $dataset['customer_tgl_lahir'],
                        "user_kota_tinggal" => $dataset['customer_kota_tinggal'],
                        "user_alamat" => $dataset['customer_alamat']
                    ],
                    "count" => $customer->num_rows()
                ];
            } else {
                $kurir_where = "kurir_email='" . $email . "' AND kurir_password='" . $password . "'";
                $kurir = $this->db->get_where("kurir", $kurir_where);

                if($kurir->num_rows() > 0){
                    $dataset = $kurir->row_array();
                    $resp = [
                        "success" => true,
                        "message" => "Request Successfully",
                        "data" => [
                            "user_id" => $dataset['kurir_id'],
                            "user_role" => "kurir",
                            "user_no_ktp" => $dataset['kurir_no_ktp'],
                            "user_nama" => $dataset['kurir_nama'],
                            "user_email" => $dataset['kurir_email'],
                            "user_password" => $dataset['kurir_password'],
                            "user_no_telp" => $dataset['kurir_no_telp'],
                            "user_tgl_lahir" => null,
                            "user_kota_tinggal" => null,
                            "user_alamat" => null
                        ],
                        "count" => $kurir->num_rows()
                    ];
                }
            }
        } else {
            $dataset = $admin->row_array();
            $resp = [
                "success" => true,
                "message" => "Request Successfully 1",
                "data" => [
                    "user_id" => $dataset['admin_id'],
                    "user_role" => "admin",
                    "user_no_ktp" => null,
                    "user_nama" => $dataset['admin_nama'],
                    "user_email" => $dataset['admin_email'],
                    "user_password" => $dataset['admin_password'],
                    "user_no_telp" => null,
                    "user_tgl_lahir" => null,
                    "user_kota_tinggal" => null,
                    "user_alamat" => null
                ],
                "count" => $admin->num_rows()
            ];
        }

        j_encode($resp, "raw");
    }
}
