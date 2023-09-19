<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionApi extends CI_Controller {

    public function index()
    {
        // Simulasikan data transaksi
        $transactionData = [
            "082828282" => [
                [
                    "tanggal" => "2023-09-18",
                    "deskripsi" => "Transfer keluar",
                    "jumlah" => -1000.00,
                    "mata_uang" => "IDR"
                ],
                [
                    "tanggal" => "2023-09-17",
                    "deskripsi" => "Deposit",
                    "jumlah" => 5000.00,
                    "mata_uang" => "IDR"
                ]
            ]
        ];

        // Ambil nomor akun dari permintaan
        $nomorAkun = $this->input->get("nomor_akun");

        // Periksa apakah nomor akun ada dalam data transaksi
        if (array_key_exists($nomorAkun, $transactionData)) {
            $response = [
                "nomor_akun" => $nomorAkun,
                "histori_transaksi" => $transactionData[$nomorAkun]
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
?>
