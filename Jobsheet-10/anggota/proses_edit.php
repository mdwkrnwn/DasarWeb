<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';

$id = $_POST['id'] ?? null;
$nama = trim($_POST['nama'] ?? '');
$noAnggota = trim($_POST['no_anggota'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');
$statusAnggota = $_POST['status_anggota'] ?? '';

if (!$id) {
    header('Location: list.php');
    exit;
}

$errors = [];

if ($nama === '') {
    $errors[] = "Nama wajib diisi.";
}

if ($noAnggota === '') {
    $errors[] = "No. Anggota wajib diisi.";
}

if (!in_array($statusAnggota, ['Aktif', 'Nonaktif'], true)) {
    $errors[] = "Status anggota tidak valid.";
}

if (!empty($errors)) {
    $_SESSION['flash'] = [
        'type' => 'error',
        'pesan' => implode(' ', $errors)
    ];

    header('Location: edit.php?id=' . urlencode($id));
    exit;
}

$stmt = $pdo->prepare(
    "UPDATE anggota SET
        nama = :nama,
        no_anggota = :no_anggota,
        alamat = :alamat,
        no_hp = :no_hp,
        status_anggota = :status_anggota
     WHERE id = :id"
);

$stmt->execute([
    'nama' => $nama,
    'no_anggota' => $noAnggota,
    'alamat' => $alamat,
    'no_hp' => $noHp,
    'status_anggota' => $statusAnggota,
    'id' => $id,
]);

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Anggota berhasil diperbarui.'
];

header('Location: list.php');
exit;
