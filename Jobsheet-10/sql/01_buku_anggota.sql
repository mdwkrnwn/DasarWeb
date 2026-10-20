-- Jobsheet 8: skema awal database simpus_mini (PostgreSQL)
-- Jalankan setelah membuat database, misal:
--   createdb simpus_mini
--   psql -d simpus_mini -f sql/01_buku_anggota.sql

CREATE TABLE IF NOT EXISTS buku (
    id SERIAL PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    pengarang VARCHAR(255) NOT NULL,
    tahun INTEGER NOT NULL,
    isbn VARCHAR(50),
    stok INTEGER NOT NULL DEFAULT 0,
    kategori VARCHAR(50
);

CREATE TABLE IF NOT EXISTS anggota (
    id SERIAL PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    no_anggota VARCHAR(50) NOT NULL UNIQUE,
    alamat VARCHAR(255),
    no_hp VARCHAR(30)
);


ALTER TABLE buku
ADD COLUMN IF NOT EXISTS deskripsi TEXT;

ALTER TABLE anggota
ADD COLUMN IF NOT EXISTS status_anggota
VARCHAR(20) NOT NULL DEFAULT 'Aktif';   



9INSERT INTO anggota
    (nama, no_anggota, alamat, no_hp, status_anggota)
VALUES
    ('Andi Pratama', 'AGT001', 'Jl. Melati No. 10, Malang', '081234567801', 'Aktif'),
    ('Siti Aisyah', 'AGT002', 'Jl. Mawar No. 5, Pasuruan', '081234567802', 'Aktif'),
    ('Budi Santoso', 'AGT003', 'Jl. Kenanga No. 12, Bangil', '081234567803', 'Aktif'),
    ('Dewi Lestari', 'AGT004', 'Jl. Anggrek No. 8, Beji', '081234567804', 'Aktif'),
    ('Rizky Ramadhan', 'AGT005', 'Jl. Diponegoro No. 21, Malang', '081234567805', 'Aktif'),
    ('Nurul Hidayah', 'AGT006', 'Jl. Ahmad Yani No. 15, Pasuruan', '081234567806', 'Aktif'),
    ('Fajar Maulana', 'AGT007', 'Jl. Sudirman No. 7, Bangil', '081234567807', 'Tidak Aktif'),
    ('Putri Amelia', 'AGT008', 'Jl. Kartini No. 3, Beji', '081234567808', 'Aktif'),
    ('Dimas Saputra', 'AGT009', 'Jl. Veteran No. 18, Malang', '081234567809', 'Aktif'),
    ('Intan Permata', 'AGT010', 'Jl. Pahlawan No. 11, Pasuruan', '081234567810', 'Tidak Aktif');