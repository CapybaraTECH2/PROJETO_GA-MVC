<?php

namespace App\Models;

use App\Models\BD;  

class Usuario
{
    public function getAll()
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findById($id)
    {
        $conn = BD::connect();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function save($nome, $email, $login, $senha, $funcao){

        $conn = BD::connect();

        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO usuarios (nome, e_mail, login, senha, funcao) VALUES (:nome, :e_mail, :login, :senha, :funcao)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':e_mail', $email);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $hash);
        $stmt->bindParam(':funcao', $funcao);
        $stmt->execute();

        return $conn->lastInsertId();
    }

     public function update($id, $nome, $email, $login, $funcao, $senha = null)
     {
         $conn = BD::connect();
        
         $usuario = $this->findById($id);

         if (!$usuario) {
             die("Usuário não encontrado.");
         }

         if(empty($senha) or is_null($senha)){
             $hash = $usuario->senha;
         }else{
             $hash = password_hash($senha, PASSWORD_DEFAULT);
         }         

         $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, e_mail = :e_mail, login = :login, senha = :senha, funcao = :funcao WHERE id = :id");
         $stmt->bindParam(':id', $id);
         $stmt->bindParam(':nome', $nome);
         $stmt->bindParam(':e_mail', $email);
         $stmt->bindParam(':login', $login);
         $stmt->bindParam(':senha', $hash);
         $stmt->bindParam(':funcao', $funcao);
         return $stmt->execute();
     }

    public function delete($id)
    {
        $conn = BD::connect();

        $usuario = $this->findById($id);
        if (!$usuario) {
            die("Usuário não encontrado.");
    }
    
     
        $sql = $conn->prepare(query: "DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(param: ":id", value: $usuario->id);
        $sql->execute();


        return true;
    }
}