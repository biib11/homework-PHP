<?php
require_once('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'));

    if (isset($data->sender_id, $data->receiver_id, $data->amount)) {
        $sender_id = $data->sender_id;
        $receiver_id = $data->receiver_id;
        $amount = $data->amount;

        $sql = "SELECT balance FROM accounts WHERE id = $sender_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $sender_balance = $row['balance'];

            if ($sender_balance >= $amount) {
                $conn->begin_transaction();
                $sql1 = "UPDATE accounts SET balance = balance - $amount WHERE id = $sender_id";
                $sql2 = "UPDATE accounts SET balance = balance + $amount WHERE id = $receiver_id";

                if ($conn->query($sql1) && $conn->query($sql2)) {
                    $conn->commit();
                    echo json_encode(['message' => 'Transfer berhasil']);
                } else {
                    $conn->rollback();
                    echo json_encode(['error' => 'Transfer gagal']);
                }
            } else {
                echo json_encode(['error' => 'Saldo tidak mencukupi']);
            }
        } else {
            echo json_encode(['error' => 'Akun pengirim tidak ditemukan']);
        }
    } else {
        echo json_encode(['error' => 'Parameter tidak lengkap']);
    }
}
