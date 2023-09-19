<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransferApi extends CI_Controller {

    public function index()
    {
        // Simulasikan data akun
        $accountData = [
            "082828282" => [
                "saldo" => 5000000.00,
                "mata_uang" => "IDR"
            ],
            "87654321" => [
                "saldo" => 3000.00,
                "mata_uang" => "IDR"
            ]
        ];

        // Ambil data permintaan
        $requestData = json_decode(file_get_contents("php://input"), true);

        // Validasi data permintaan
        if (
            isset($requestData["nomor_akun_asal"]) &&
            isset($requestData["nomor_akun_tujuan"]) &&
            isset($requestData["jumlah"])
        ) {
            $nomorAkunAsal = $requestData["nomor_akun_asal"];
            $nomorAkunTujuan = $requestData["nomor_akun_tujuan"];
            $jumlah = $requestData["jumlah"];

            // Periksa apakah nomor akun asal dan tujuan ada dalam data akun
            if (array_key_exists($nomorAkunAsal, $accountData) && array_key_exists($nomorAkunTujuan, $accountData)) {
                // Periksa apakah saldo mencukupi untuk transfer
                if ($accountData[$nomorAkunAsal]["saldo"] >= $jumlah) {
                    // Lakukan transfer
                    $accountData[$nomorAkunAsal]["saldo"] -= $jumlah;
                    $accountData[$nomorAkunTujuan]["saldo"] += $jumlah;
                    
                    $response = [
                        "status" => "berhasil",
                        "pesan" => "Transfer berhasil dilakukan."
                    ];
                    $this->output
                        ->set_content_type("application/json")
                        ->set_output(json_encode($response));
                } else {
                    $this->output
                        ->set_status_header(400)
                        ->set_output("Saldo tidak mencukupi untuk transfer.");
                }
            } else {
                $this->output
                    ->set_status_header(404)
                    ->set_output("Nomor akun tidak ditemukan.");
            }
        } else {
            $this->output
                ->set_status_header(400)
                ->set_output("Data permintaan tidak valid.");
        }
    }
}
?>
