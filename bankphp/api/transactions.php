<?php
require_once('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['account_id'])) {
        $account_id = $_GET['account_id'];

        $sql = "SELECT * FROM transactions WHERE sender_account_id = $account_id OR receiver_account_id = $account_id ORDER BY timestamp DESC LIMIT 10";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $transactions = array();
            while ($row = $result->fetch_assoc()) {
                $transactions[] = $row;
            }
            echo json_encode($transactions);
        } else {
            echo json_encode(['message' => 'Tidak ada transaksi']);
        }
    } else {
        echo json_encode(['error' => 'Parameter account_id tidak diberikan']);
    }
}
