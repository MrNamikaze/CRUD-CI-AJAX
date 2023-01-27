<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class user_data extends CI_Model {
 
    function getData(){
        return $this->db->get('karyawan')->result(); // me-return hasil dari get tb_siswa
    }
 
    function getDataByNoinduk($noinduk){
        $this->db->where('id_karyawan',$idkaryawan); // where no induk
        return $this->db->get('karyawan')->result(); // me-return hasil dari get tb_siswa
    }
 
    function deleteData($noinduk){
        $this->db->where('id_karyawan',$idkaryawan); // where no induk
        $this->db->delete('karyawan'); // mendelete tb_siswa sesuai kondisi di atas
    }
 
    function insertData($data){
        $this->db->insert('karyawan',$data); // menginsert pada tb_siswa dengan variabel data
    }
 
    function updateData($noinduk,$data){
        $this->db->where('id_karyawan',$idkaryawan); // where no induk
        $this->db->update('karyawan',$data); //mengupdate tb_siswa sesuai kondisi di atas
    }
}