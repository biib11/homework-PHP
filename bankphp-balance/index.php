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

    <h2>Transfer Saldo</h2>
    <form action="api/transfer.php" method="POST">
        <label for="sender_account">Nomor Akun Pengirim:</label>
        <input type="text" name="sender_account" id="sender_account">
        <label for="receiver_account">Nomor Akun Penerima:</label>
        <input type="text" name="receiver_account" id="receiver_account">
        <label for="amount">Jumlah Transfer:</label>
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