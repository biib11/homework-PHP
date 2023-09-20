<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Bank</title>
</head>

<body>
    <h1>My Bank</h1>

    <h2>Menampilkan Saldo</h2>
    <form action="api/balance.php" method="GET">
        <label for="account_id">ID Akun:</label>
        <input type="text" name="account_id" id="account_id">
        <button type="submit">Cek Saldo</button>
    </form>

    <h2>Transfer Uang</h2>
    <form action="api/transfer.php" method="POST">
        <label for="sender_id">ID Pengirim:</label>
        <input type="text" name="sender_id" id="sender_id">
        <label for="receiver_id">ID Penerima:</label>
        <input type="text" name="receiver_id" id="receiver_id">
        <label for="amount">Jumlah Uang:</label>
        <input type="text" name="amount" id="amount">
        <button type="submit">Transfer</button>
    </form>

    <h2>Cek Transaksi Terakhir</h2>
    <form action="api/transactions.php" method="GET">
        <label for="account_id">ID Akun:</label>
        <input type="text" name="account_id" id="account_id">
        <button type="submit">Cek Transaksi</button>
    </form>
</body>

</html>