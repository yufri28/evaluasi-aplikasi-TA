<?php 
require_once './../config.php';
class Aplikasi
{
    private $db; 
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get_hasil_aplikasi($id_auth)
    {
        return $this->db->query("SELECT 
                                a.id_aplikasi,
                                a.nama_aplikasi,	
                                a.deskripsi,	
                                a.f_id_auth,	
                                a.gambar, 
                                COUNT(sa.id_skor_asli) AS jumlah_responden, 
                                AVG(sa.nilai_jumlah) AS nilai_jumlah 
                                FROM `aplikasi` a JOIN `skor_asli` sa 
                                ON sa.f_id_app=a.id_aplikasi  
                                WHERE f_id_auth='$id_auth' GROUP BY sa.f_id_app");
    }

    public function count_aplikasi($id_auth)
    {
         $data = $this->db->query("SELECT COUNT(id_aplikasi) AS jumlah_aplikasi FROM aplikasi WHERE f_id_auth='$id_auth'")->fetch_assoc();
         return $data['jumlah_aplikasi'];
    }

    public function get_data_aplikasi()
    {
        return $this->db->query("SELECT * FROM aplikasi");
    }

    public function get_data_aplikasi_byId($id_auth)
    {
        return $this->db->query("SELECT * FROM aplikasi WHERE f_id_auth='$id_auth'");
    }

    public function num_rows_user()
    {
        $data = $this->db->query("SELECT COUNT(*) AS jumlah_user FROM auth")->fetch_assoc();
        return $data['jumlah_user'];
    }

    public function num_rows_responden($id_auth)
    {
        $data = $this->db->query("SELECT COUNT(*) AS jumlah_user FROM skor_asli sa JOIN aplikasi a ON a.id_aplikasi=sa.f_id_app JOIN auth au ON au.id_auth=a.f_id_auth WHERE au.id_auth='$id_auth'")->fetch_assoc();
        return $data['jumlah_user'];
    }
    
    public function num_rows_app_admin()
    {
        $data = $this->db->query("SELECT COUNT(*) AS jumlah_rows_app FROM aplikasi")->fetch_assoc();
        return $data['jumlah_rows_app'];
    }
    
    public function count_num_rows_app($id_auth)
    {
        $data = $this->db->query("SELECT COUNT(*) AS jumlah_rows_app FROM aplikasi WHERE f_id_auth='$id_auth'")->fetch_assoc();
        return $data['jumlah_rows_app'];
    }

    public function create_data_aplikasi($data)
    {
    
        $nama_aplikasi = $data['nama_aplikasi'];
        $deskripsi = $data['deskripsi'];
        $id_auth = $data['id_auth'];
        $gambar = $data['gambar'];
        $insert_app = $this->db->query("INSERT INTO aplikasi(id_aplikasi,nama_aplikasi,deskripsi,f_id_auth,gambar) VALUES (0,'$nama_aplikasi','$deskripsi','$id_auth','$gambar')");
     
        if($insert_app)
        {
           return $_SESSION['success'] = 'Data berhasil disimpan!';
        }else{
           return $_SESSION['error'] = 'Data gagal disimpan!';
        }
    }
    public function update_data_aplikasi($data)
    {

        $id_aplikasi = $data['id_aplikasi'];
        $nama_aplikasi = $data['nama_aplikasi'];
        $deskripsi = $data['deskripsi'];
        $id_auth = $data['id_auth'];
        $gambar = $data['gambar'];
        $update_app = $this->db->query("UPDATE aplikasi  SET nama_aplikasi='$nama_aplikasi', deskripsi='$deskripsi',f_id_auth='$id_auth',gambar='$gambar' WHERE id_aplikasi='$id_aplikasi'");
     
        if($update_app)
        {
           return $_SESSION['success'] = 'Data berhasil diupdate!';
        }else{
           return $_SESSION['error'] = 'Data gagal diupdate!';
        }
    }
    public function delete_data_aplikasi($id_aplikasi)
    {
        $delete_app = $this->db->query("DELETE FROM aplikasi WHERE id_aplikasi='$id_aplikasi'");
     
        if($delete_app)
        {
           return $_SESSION['success'] = 'Data berhasil didelete!';
        }else{
           return $_SESSION['error'] = 'Data gagal didelete!';
        }
    }
    

    public function get_responden($id_aplikasi)
    {
        return $this->db->query("SELECT * FROM skor_asli sa JOIN aplikasi a ON a.id_aplikasi=sa.f_id_app WHERE sa.f_id_app='$id_aplikasi'");
    }
    public function num_rows_responden_byApp($id_aplikasi)
    {
        $data = $this->db->query("SELECT COUNT(*) AS jumlah_user FROM skor_asli WHERE f_id_app='$id_aplikasi'")->fetch_assoc();
        return $data['jumlah_user'];
    }

    public function delete_data_responden($id_skor_asli)
    {
        $delete_responden = $this->db->query("DELETE FROM skor_asli WHERE id_skor_asli='$id_skor_asli'");
     
        if($delete_responden)
        {
           return $_SESSION['success'] = 'Data berhasil didelete!';
        }else{
           return $_SESSION['error'] = 'Data gagal didelete!';
        }
    }
}


$Aplikasi = new Aplikasi();



?>