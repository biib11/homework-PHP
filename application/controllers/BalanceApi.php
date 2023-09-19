<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BalanceApi extends CI_Controller {

    public function index()
    {
        // Simulasikan data akun
        $accountData = [
            "012340987" => [
                "saldo" => 5000000.00,
                "mata_uang" => "IDR"
            ],
            "082828282" => [
                "saldo" => 1000000.00,
                "mata_uang" => "IDR"
            ]
        ];

        // Ambil nomor akun dari permintaan
        $nomorAkun = $this->input->get("nomor_akun");

        // Periksa apakah nomor akun ada dalam data akun
        if (array_key_exists($nomorAkun, $accountData)) {
            $response = [
                "nomor_akun" => $nomorAkun,
                "saldo" => $accountData[$nomorAkun]["saldo"],
                "mata_uang" => $accountData[$nomorAkun]["mata_uang"]
            ];
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode($response));
        } else {
            $this->output
                ->set_status_header(404)
                ->set_output("Nomor akun tidak ditemukan");
        }
    }
}
// public function index()
    // {
    //     $this->load->database(); // Memuat database

    //     $query = $this->db->get('balance_saldo');

    //     // Membuat array yang akan dikonversi menjadi JSON
    //     $balances = array();

    //     foreach ($query->result() as $row) {
    //         $balances[] = array(
    //             'id' => $row->id,
    //             'username' => $row->username,
    //             'saldo' => $row->saldo
    //         );
    //     }

    //     // Mengirim respons dalam format JSON
    //     $this->output->set_content_type('application/json')->set_output(json_encode($balances));
    // }


?>
    