<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class karyawan extends CI_Controller{
    
    function insert_dumy(){
        // jumlah data yang akan di insert
        $jumlah_data = 1000;
        for ($i=1;$i<=$jumlah_data;$i++){
            $data   =   array(
                "nama_lengkap"  =>  "Karyawan Ke-".$i,
                "email"         =>  "karyawan-$i@gmil.com",
                "no_hp"         =>  '089699935552',
                "foto"          =>  "foto-karyawan-$i.jpg");
            $this->db->insert('karyawan',$data); 
        }
        echo $i.' Data Berhasil Di Insert';
    }
    
}
?>