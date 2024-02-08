<?php
    class Modalidade
    {
        private $imagem;
        private $nome;
        private $descricao;

        public function __construct(){}

        public function create($_imagem, $_nome, $_descricao)
        {
            $this->imagem = $_imagem;
            $this->nome = $_nome;
            $this->descricao = $_descricao;
        }

        public function listarModalidade()
        {
           try 
           {
                include("./db/conn.php");

                $sql = "CALL psModalidade()";
                $data = $conn->query($sql)->fetchAll();

                return $data;
           } 
           catch (Exception $e) 
           {
               return false;
           }
        }
    }

?>