<?php

class crud_model extends CI_Model
{

function __construct(){
parent::__construct(); 
}

function create(){

}


function read(){
$this->db->order_by("id","desc");
$query=$this->db->get("member");
return $query->result_array();
}


function update($id,$value,$modul){

}

function delete($id){

}


}