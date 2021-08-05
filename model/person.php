<?php
include_once('connection.php');

class Person extends Connection{

    public function __construct(){
        parent::__construct();
    }

    public function getDataPerson(){
        $query = "
        SELECT person.*,(select deptname from department where department.department_code = person.kode_department)deptname,
        (select posname from posisi where posisi.kode_posisi = person.kode_posisi)posname,
        (select CONCAT (asd.firstname,' ',asd.lastname) from person asd where asd.kode_posisi = person.supervisor_kode)supervisor_name
        FROM `person`
        ";
        $res = $this->getDb()->query($query) or trigger_error($this->getDb()->error."[$query]");
        $data = [   'datapegawai' => []
                ];
        $index = 1;
        while ($row = $res->fetch_assoc()) {
            array_push($data['datapegawai'],[ 
                'index' => $index++,
                'idperson' => $row['idperson'],
                'firstname' => $row['firstname'],
                'lastname' => $row['lastname'],
                'gender' => $row['gender'],
                'alamat' => $row['alamat'],
                'kode_posisi' => $row['kode_posisi'], 
                'kode_department' => $row['kode_department'],
                'supervisor_kode' => $row['supervisor_kode'],
                'deptname' => $row['deptname'],
                'posname' => $row['posname'],
                'supervisor_name' => $row['supervisor_name']                
            ]);
        }
        
        return $data;
    }
}