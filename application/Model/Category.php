<?php
namespace Mini\Model;
use Mini\Libs\Dbpdo;
use PDO;
use Exception;

class Category extends Dbpdo
{
    private $table = 'categories';

    public function insert($fields)
    {

        $nulo = null;
        $prepare = $this->db->prepare("INSERT INTO $this->table(name, descripcion) VALUES(:nombre, :descripcion)");

        $prepare->bindParam(':nombre', $fields['nombre'], PDO::PARAM_STR);
        $prepare->bindParam(':descripcion', $fields['descripcion'], PDO::PARAM_STR);

        if($prepare->execute() == false){
            throw new Exception('Hay problemas con las BD');
        }


    }


    public function update($table, $data)
    {
        if(isset($table) || isset($data)){

            $prepare = $this->db->prepare("UPDATE $table SET name=:nombre, descripcion=:descripcion WHERE id = :id");

            $prepare->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
            $prepare->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
            $prepare->bindParam(':id', $data['id'], PDO::PARAM_STR);

            $prepare->execute();

        }else {
            throw new Exception('A ocurrido un error con la base de datos');
        }


    }


}
