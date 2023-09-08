<?php 
require_once './../config.php';
class Aplikasi
{
    private $db; 
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get_data_aplikasi($id_auth)
    {
        return $this->db->query("SELECT * FROM aplikasi WHERE f_id_auth='$id_auth'");
    }

    public function count_num_rows_app()
    {
        $data = mysqli_fetch_assoc($this->db->query("SELECT COUNT(*) AS jumlah_rows_app FROM aplikasi"));
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



}


$Aplikasi = new Aplikasi();



?>