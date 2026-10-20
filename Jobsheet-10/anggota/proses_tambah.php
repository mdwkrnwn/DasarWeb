```php
<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';

$nama = trim($_POST['nama'] ?? '');
$noAnggota = trim($_POST['no_anggota'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');
$statusAnggota = $_POST['status_anggota'] ?? 'Aktif';

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

    header('Location: tambah.php');
    exit;
}

$stmt = $pdo->prepare(
    "INSERT INTO anggota
    (nama, no_anggota, alamat, no_hp, status_anggota)
    VALUES
    (:nama, :no_anggota, :alamat, :no_hp, :status_anggota)
    RETURNING id"
);

$stmt->execute([
    'nama' => $nama,
    'no_anggota' => $noAnggota,
    'alamat' => $alamat,
    'no_hp' => $noHp,
    'status_anggota' => $statusAnggota,
]);

$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Anggota berhasil ditambahkan.'
];

header('Location: list.php');
exit;
