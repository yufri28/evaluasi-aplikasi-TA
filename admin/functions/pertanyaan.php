<?php 
require_once './../config.php';
class Pertanyaan
{
    private $db; 
    public function __construct()
    {
        $this->db = connectDatabase();
    }

    public function get_data_question()
    {
        return $this->db->query("SELECT * FROM pertanyaan");
    }

    public function count_num_rows_question()
    {
        $data = mysqli_fetch_assoc($this->db->query("SELECT COUNT(*) AS num_rows_question FROM pertanyaan"));
        return $data['num_rows_question'];
    }

    public function create_data_question($pertanyaan)
    {
        $insert_question = $this->db->query("INSERT INTO pertanyaan(id_pertanyaan,pertanyaan) VALUES (0,'$pertanyaan')");
        if($insert_question)
        {
           return $_SESSION['success'] = 'Data berhasil disimpan!';
        }else{
           return $_SESSION['error'] = 'Data gagal disimpan!';
        }
    }
    public function update_data_question($data)
    {

        $id_pertanyaan = $data['id_pertanyaan'];
        $pertanyaan = $data['pertanyaan'];
        $update_question = $this->db->query("UPDATE pertanyaan SET pertanyaan='$pertanyaan' WHERE id_pertanyaan='$id_pertanyaan'");
        if($update_question)
        {
           return $_SESSION['success'] = 'Data berhasil diupdate!';
        }else{
           return $_SESSION['error'] = 'Data gagal diupdate!';
        }
    }
    public function delete_data_question($id_question)
    {
        $delete_question = $this->db->query("DELETE FROM pertanyaan WHERE id_pertanyaan='$id_question'");
     
        if($delete_question)
        {
           return $_SESSION['success'] = 'Data berhasil didelete!';
        }else{
           return $_SESSION['error'] = 'Data gagal didelete!';
        }
    }



}


$Pertanyaan = new Pertanyaan();



?>