<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model{
function ambilData(){
	return $this->db->get('karyawan')->result();
	}
function id_kar_pk($idkar){
        $hasil=$this->db->query("SELECT * FROM karyawan WHERE idkaryawan='$idkar'");
        if($hasil->num_rows()>0){
            foreach ($hasil->result() as $data) {
                $hasil=array(
                	'idkaryawan' => $data->idkaryawan,
                    'namalengkap' => $data->namalengkap,
                    'email' => $data->email,
                    'nohp' => $data->nohp,
                    'foto' => $data->foto,
                    );
            }
        }
        return $hasil;
    }
function AmbilIdKaryawan($karyawan){
        $this->db->where('idkaryawan',$karyawan); // where no induk
        return $this->db->get('karyawan')->result(); // me-return hasil dari get tb_siswa
    }

function updateData($idkaryawan,$data){
        $this->db->where('idkaryawan',$idkaryawan); // where no induk
        $this->db->update('karyawan',$data); //mengupdate tb_siswa sesuai kondisi di atas
    }
function hapusData($idkaryawan){
        $this->db->where('idkaryawan',$idkaryawan); // where no induk
        $this->db->delete('karyawan'); // mendelete tb_siswa sesuai kondisi di atas
    }
 
 
}


?>