<?php  
class Port
{
private $db;

public function __construct()
{
    $this->db=new Database;
}


public function getPorts(){
    $this->db->query('SELECT * FROM port');
    $results = $this->db->resultSet();
    return $results;
}


public function addPorts($data){
    
}

}