<?php

include_once('connection.php');
include_once('model/person.php');

Class Action extends Connection{

    public function __construct(){
        parent::__construct();
    }

    public function getData($query){
        $res = $this->getDb()->query($query);
        while ($row = $res->fetch_assoc()) {
            printf("%s (%s)\n", $row["nama_barang"], $row["jumlah_barang"]);
        }
    }
}


$obj = new Person();
$data = [];
$data = $obj->getDataPerson();

echo json_encode($data);
