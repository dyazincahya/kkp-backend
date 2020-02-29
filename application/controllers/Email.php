<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
            /*$this->pdf->load_view('example_to_pdf');
            $this->pdf->render();
            $this->pdf->stream("name-file.pdf");*/

            $this->pdf->loadHtml($this->load->view("example_to_pdf", array(), true));
            $this->pdf->render();
            // $this->pdf->stream("cahya.pdf");
            $this->pdf->output();
    }

    public function send()
    {
        $html = $this->load->view("example_to_pdf", array(), true);
        $s = zmailer([
            "to"        => "dyazincahya@gmail.com",
            "subject"   => "Test mail report",
            "message"   => $html
        ]);

        var_dump($s);
    }

    public function download_report($start, $end)
    {
        $star_date = $start;
        $end_date = $end;

        $customer_where = "customer_reg_date >= CAST('". $star_date ."' AS DATE) AND customer_reg_date <= CAST('". $end_date ."' AS DATE)";
        $customer = $this->db->query("
            SELECT * FROM customer
            WHERE " . $customer_where)->result_array();

        $package_where = "package_created >= CAST('". $star_date ."' AS DATE) AND package_created <= CAST('". $end_date ."' AS DATE)";
        $package = $this->db->query("
            SELECT * FROM package p
            LEFT JOIN customer c ON c.customer_id=p.package_customer_id
            LEFT JOIN kurir k ON k.kurir_id=p.package_kurir_id
            WHERE " . $package_where)->result_array();

        $customer_non_active = $this->db->get_where("customer", "customer_status='0' AND (". $customer_where . ")")->num_rows();
        $customer_active = $this->db->get_where("customer", "customer_status='1' AND (". $customer_where . ")")->num_rows();
        $customer_pending = $this->db->get_where("customer", "customer_status='2' AND (". $customer_where . ")")->num_rows();

        $package_request = $this->db->get_where("package", "package_status='REQUEST' AND (". $package_where . ")")->num_rows();
        $package_pickup = $this->db->get_where("package", "package_status='PICKUP' AND (". $package_where . ")")->num_rows();
        $package_karantina = $this->db->get_where("package", "package_status='KARANTINA' AND (". $package_where . ")")->num_rows();
        $package_pengiriman = $this->db->get_where("package", "package_status='PENGIRIMAN' AND (". $package_where . ")")->num_rows();
        $package_selesai = $this->db->get_where("package", "package_status='SELESAI' AND (". $package_where . ")")->num_rows();

        $data = [];
        $data['package'] = $package;
        $data['customer'] = $customer;
        $data['summary'] = [
            "cust_nonactive" => $customer_non_active,
            "cust_active" => $customer_active,
            "cust_pending" => $customer_pending,
            "pack_request" => $package_request,
            "pack_pickup" => $package_pickup,
            "pack_karantina" => $package_karantina,
            "pack_pengiriman" => $package_pengiriman,
            "pack_selesai" => $package_selesai
        ];

        $this->pdf->load_view('report_pdf_template', $data);
        $this->pdf->render();
        $this->pdf->stream("REPORT ". $start . " - " . $end);
    }

    public function preview_report()
    {
        $star_date = "2020-02-01";
        $end_date = "2020-02-28";

        $customer_where = "customer_reg_date >= CAST('". $star_date ."' AS DATE) AND customer_reg_date <= CAST('". $end_date ."' AS DATE)";
        $customer = $this->db->query("
            SELECT * FROM customer
            WHERE " . $customer_where)->result_array();

        $package_where = "package_created >= CAST('". $star_date ."' AS DATE) AND package_created <= CAST('". $end_date ."' AS DATE)";
        $package = $this->db->query("
            SELECT * FROM package p
            LEFT JOIN customer c ON c.customer_id=p.package_customer_id
            LEFT JOIN kurir k ON k.kurir_id=p.package_kurir_id
            WHERE " . $package_where)->result_array();

        $customer_non_active = $this->db->get_where("customer", "customer_status='0' AND (". $customer_where . ")")->num_rows();
        $customer_active = $this->db->get_where("customer", "customer_status='1' AND (". $customer_where . ")")->num_rows();
        $customer_pending = $this->db->get_where("customer", "customer_status='2' AND (". $customer_where . ")")->num_rows();

        $package_request = $this->db->get_where("package", "package_status='REQUEST' AND (". $package_where . ")")->num_rows();
        $package_pickup = $this->db->get_where("package", "package_status='PICKUP' AND (". $package_where . ")")->num_rows();
        $package_karantina = $this->db->get_where("package", "package_status='KARANTINA' AND (". $package_where . ")")->num_rows();
        $package_pengiriman = $this->db->get_where("package", "package_status='PENGIRIMAN' AND (". $package_where . ")")->num_rows();
        $package_selesai = $this->db->get_where("package", "package_status='SELESAI' AND (". $package_where . ")")->num_rows();

        $data = [];
        $data['package'] = $package;
        $data['customer'] = $customer;
        $data['summary'] = [
            "cust_nonactive" => $customer_non_active,
            "cust_active" => $customer_active,
            "cust_pending" => $customer_pending,
            "pack_request" => $package_request,
            "pack_pickup" => $package_pickup,
            "pack_karantina" => $package_karantina,
            "pack_pengiriman" => $package_pengiriman,
            "pack_selesai" => $package_selesai
        ];
        $data['url_download'] = site_url("index.php/email/download_report/" . $star_date . "/" . $end_date);

        $this->load->view("report_template", $data);
    }

    public function send_report()
    {
        $resp = default_response("Email laporan tidak terkirim!");

        $star_date = get_raw_body("star_date");
        $end_date = get_raw_body("end_date");

        $subject = "LAPORAN KIKAN periode (" . rfdate($star_date, "d/m/Y") . " sampai " . rfdate($end_date, "d/m/Y") . ")";
        $to = get_raw_body("to");
        $cc = get_raw_body("cc");
        $bcc = get_raw_body("bcc");


        $customer_where = "customer_reg_date >= CAST('". $star_date ."' AS DATE) AND customer_reg_date <= CAST('". $end_date ."' AS DATE)";
        $customer = $this->db->query("
            SELECT * FROM customer
            WHERE " . $customer_where)->result_array();

        $package_where = "package_created >= CAST('". $star_date ."' AS DATE) AND package_created <= CAST('". $end_date ."' AS DATE)";
        $package = $this->db->query("
            SELECT * FROM package p
            LEFT JOIN customer c ON c.customer_id=p.package_customer_id
            LEFT JOIN kurir k ON k.kurir_id=p.package_kurir_id
            WHERE " . $package_where)->result_array();

        $customer_non_active = $this->db->get_where("customer", "customer_status='0' AND (". $customer_where . ")")->num_rows();
        $customer_active = $this->db->get_where("customer", "customer_status='1' AND (". $customer_where . ")")->num_rows();
        $customer_pending = $this->db->get_where("customer", "customer_status='2' AND (". $customer_where . ")")->num_rows();

        $package_request = $this->db->get_where("package", "package_status='REQUEST' AND (". $package_where . ")")->num_rows();
        $package_pickup = $this->db->get_where("package", "package_status='PICKUP' AND (". $package_where . ")")->num_rows();
        $package_karantina = $this->db->get_where("package", "package_status='KARANTINA' AND (". $package_where . ")")->num_rows();
        $package_pengiriman = $this->db->get_where("package", "package_status='PENGIRIMAN' AND (". $package_where . ")")->num_rows();
        $package_selesai = $this->db->get_where("package", "package_status='SELESAI' AND (". $package_where . ")")->num_rows();

        $data = [];
        $data['package'] = $package;
        $data['customer'] = $customer;
        $data['summary'] = [
            "cust_nonactive" => $customer_non_active,
            "cust_active" => $customer_active,
            "cust_pending" => $customer_pending,
            "pack_request" => $package_request,
            "pack_pickup" => $package_pickup,
            "pack_karantina" => $package_karantina,
            "pack_pengiriman" => $package_pengiriman,
            "pack_selesai" => $package_selesai
        ];
        $data['url_download'] = site_url("email/download_report/" . $star_date . "/" . $end_date);
        $message = $this->load->view("report_template", $data, true);

        $mail_config = [
            "to"        => str_to_arr($to),
            "cc"        => str_to_arr($cc),
            "bcc"        => str_to_arr($bcc),
            "subject"   => $subject,
            "message"   => $message
        ];
        $mail_send = zmailer($mail_config);
        if($mail_send){
            $resp = [
                "success" => true,
                "message" => "Email laporan sudah terkirim",
                "data" => $mail_config,
                "total" => 1
            ];
        }

        j_encode($resp, "raw");
    }
}
