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
                                SUM(sa.nilai_jumlah) AS jumlah, 
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
    
    public function count_all_aplikasi()
    {
         $data = $this->db->query("SELECT COUNT(id_aplikasi) AS jumlah_aplikasi FROM aplikasi")->fetch_assoc();
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
        $nama = $data['nama'];
        $email = $data['email'];
        $prodi = $data['prodi'];
        $jk = $data['jk'];
        $usia = $data['usia'];
        $f_id_app = 0;

        $insert_app = $this->db->query("INSERT INTO aplikasi(id_aplikasi,nama_aplikasi,deskripsi,f_id_auth,gambar) VALUES (0,'$nama_aplikasi','$deskripsi','$id_auth','$gambar')");
        sleep(2);
        if($insert_app)
        {
           $id_app = $this->db->query("SELECT id_aplikasi FROM aplikasi ORDER BY id_aplikasi DESC LIMIT 1")->fetch_assoc();
           $f_id_app = $id_app['id_aplikasi'];
           $simpan_form = $this->db->query("INSERT INTO form(nama,email,prodi,jk,usia,f_id_app) VALUES('$nama','$email','$prodi','$jk','$usia','$f_id_app')");
           
           if($simpan_form){
               return $_SESSION['success'] = 'Data berhasil disimpan!';
           }
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
        $nama = $data['nama'];
        $email = $data['email'];
        $prodi = $data['prodi'];
        $jk = $data['jk'];
        $usia = $data['usia'];
        $id_form = $data['id_form'];


        $update_app = $this->db->query("UPDATE aplikasi  SET nama_aplikasi='$nama_aplikasi', deskripsi='$deskripsi',f_id_auth='$id_auth',gambar='$gambar' WHERE id_aplikasi='$id_aplikasi'");
        $update_form = $this->db->query("UPDATE form  SET nama='$nama', email='$email',prodi='$prodi',jk='$jk',usia='$usia',f_id_app='$id_aplikasi' WHERE id_form='$id_form'");
        
        if($update_app && $update_form)
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

    public function get_form($id_aplikasi)
    {
        return $this->db->query("SELECT * FROM form f JOIN aplikasi a ON a.id_aplikasi=f.f_id_app WHERE f.f_id_app='$id_aplikasi'")->fetch_assoc();
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