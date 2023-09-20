<?php
require_once('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['account_id'])) {
        $account_id = $_GET['account_id'];

        $sql = "SELECT balance FROM accounts WHERE id = $account_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $balance = $row['balance'];
            echo json_encode(['balance' => $balance]);
        } else {
            echo json_encode(['error' => 'Akun tidak ditemukan']);
        }
    } else {
        echo json_encode(['error' => 'Parameter account_id tidak diberikan']);
    }
}
