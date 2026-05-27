<?php
require 'Koneksi.php';

function getAllMember()
{
    $conn = koneksi();
    $result = mysqli_query($conn, "SELECT * FROM member");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getMemberById($id)
{
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, "SELECT * FROM member WHERE id_member = '$id'");
    return mysqli_fetch_assoc($result);
}

function insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar)
{
    $conn = koneksi();
    $nama       = mysqli_real_escape_string($conn, $nama);
    $nomor      = mysqli_real_escape_string($conn, $nomor);
    $alamat     = mysqli_real_escape_string($conn, $alamat);
    $tgl_daftar = mysqli_real_escape_string($conn, $tgl_daftar);
    $tgl_bayar  = mysqli_real_escape_string($conn, $tgl_bayar);
    $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar)
            VALUES ('$nama', '$nomor', '$alamat', '$tgl_daftar', '$tgl_bayar')";
    return mysqli_query($conn, $sql);
}

function updateMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar)
{
    $conn = koneksi();
    $id         = mysqli_real_escape_string($conn, $id);
    $nama       = mysqli_real_escape_string($conn, $nama);
    $nomor      = mysqli_real_escape_string($conn, $nomor);
    $alamat     = mysqli_real_escape_string($conn, $alamat);
    $tgl_daftar = mysqli_real_escape_string($conn, $tgl_daftar);
    $tgl_bayar  = mysqli_real_escape_string($conn, $tgl_bayar);
    $sql = "UPDATE member SET
                nama_member = '$nama',
                nomor_member = '$nomor',
                alamat = '$alamat',
                tgl_mendaftar = '$tgl_daftar',
                tgl_terakhir_bayar = '$tgl_bayar'
            WHERE id_member = '$id'";
    return mysqli_query($conn, $sql);
}

function deleteMember($id)
{
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    return mysqli_query($conn, "DELETE FROM member WHERE id_member = '$id'");
}

function getAllBuku()
{
    $conn = koneksi();
    $result = mysqli_query($conn, "SELECT * FROM buku");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getBukuById($id)
{
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = '$id'");
    return mysqli_fetch_assoc($result);
}

function insertBuku($judul, $penulis, $penerbit, $tahun)
{
    $conn = koneksi();
    $judul   = mysqli_real_escape_string($conn, $judul);
    $penulis = mysqli_real_escape_string($conn, $penulis);
    $penerbit = mysqli_real_escape_string($conn, $penerbit);
    $tahun   = mysqli_real_escape_string($conn, $tahun);
    $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit)
            VALUES ('$judul', '$penulis', '$penerbit', '$tahun')";
    return mysqli_query($conn, $sql);
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun)
{
    $conn = koneksi();
    $id      = mysqli_real_escape_string($conn, $id);
    $judul   = mysqli_real_escape_string($conn, $judul);
    $penulis = mysqli_real_escape_string($conn, $penulis);
    $penerbit = mysqli_real_escape_string($conn, $penerbit);
    $tahun   = mysqli_real_escape_string($conn, $tahun);
    $sql = "UPDATE buku SET
                judul_buku = '$judul',
                penulis = '$penulis',
                penerbit = '$penerbit',
                tahun_terbit = '$tahun'
            WHERE id_buku = '$id'";
    return mysqli_query($conn, $sql);
}

function deleteBuku($id)
{
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    return mysqli_query($conn, "DELETE FROM buku WHERE id_buku = '$id'");
}

function getAllPeminjaman()
{
    $conn = koneksi();
    $sql = "SELECT p.*, m.nama_member, b.judul_buku
            FROM peminjaman p
            JOIN member m ON p.id_member = m.id_member
            JOIN buku b ON p.id_buku = b.id_buku";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getPeminjamanById($id)
{
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_peminjaman = '$id'");
    return mysqli_fetch_assoc($result);
}

function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali)
{
    $conn = koneksi();
    $id_member  = mysqli_real_escape_string($conn, $id_member);
    $id_buku    = mysqli_real_escape_string($conn, $id_buku);
    $tgl_pinjam = mysqli_real_escape_string($conn, $tgl_pinjam);
    $tgl_kembali = mysqli_real_escape_string($conn, $tgl_kembali);
    $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali)
            VALUES ('$id_member', '$id_buku', '$tgl_pinjam', '$tgl_kembali')";
    return mysqli_query($conn, $sql);
}

function updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali)
{
    $conn = koneksi();
    $id         = mysqli_real_escape_string($conn, $id);
    $id_member  = mysqli_real_escape_string($conn, $id_member);
    $id_buku    = mysqli_real_escape_string($conn, $id_buku);
    $tgl_pinjam = mysqli_real_escape_string($conn, $tgl_pinjam);
    $tgl_kembali = mysqli_real_escape_string($conn, $tgl_kembali);
    $sql = "UPDATE peminjaman SET
                id_member = '$id_member',
                id_buku = '$id_buku',
                tgl_pinjam = '$tgl_pinjam',
                tgl_kembali = '$tgl_kembali'
            WHERE id_peminjaman = '$id'";
    return mysqli_query($conn, $sql);
}

function deletePeminjaman($id)
{
    $conn = koneksi();
    $id = mysqli_real_escape_string($conn, $id);
    return mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman = '$id'");
}
