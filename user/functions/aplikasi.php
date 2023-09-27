<?php 
require_once './config.php';
class Aplikasi
{
    private $db; 
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get_hasil_aplikasi()
    {
        return $this->db->query("SELECT a.id_aplikasi, a.nama_aplikasi, a.deskripsi,	
        a.f_id_auth, au.username,
        a.gambar, 
        COUNT(sa.id_skor_asli) AS jumlah_responden, 
        AVG(sa.nilai_jumlah) AS nilai_jumlah 
        FROM `aplikasi` a JOIN `skor_asli` sa 
        ON sa.f_id_app=a.id_aplikasi JOIN auth au ON au.id_auth=a.f_id_auth GROUP BY sa.f_id_app;");
    }
    public function get_high_skor()
    {
        return $this->db->query("SELECT
        a.id_aplikasi,
        a.nama_aplikasi,
        a.deskripsi,
        a.f_id_auth,
        au.username,
        a.gambar,
        COUNT(sa.id_skor_asli) AS jumlah_responden,
        AVG(sa.nilai_jumlah) AS nilai_jumlah
        FROM aplikasi a
        JOIN skor_asli sa ON sa.f_id_app = a.id_aplikasi
        JOIN auth au ON au.id_auth = a.f_id_auth
        GROUP BY a.id_aplikasi, a.nama_aplikasi, a.deskripsi, a.f_id_auth, au.username, a.gambar
        ORDER BY nilai_jumlah DESC LIMIT 1;")->fetch_assoc();
    }
}


$Aplikasi = new Aplikasi();


?>