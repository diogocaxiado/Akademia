<?php

    class Usuario
    {
        private $nome;
        private $email;
        private $dtNascimento;
        private $cidade;
        private $senha;

        public function __construct(){}

        public function create($_nome, $_email, $_dtNascimento, $_cidade, $_senha) {
            $this->nome = $_nome;
            $this->email = $_email;
            $this->dtNascimento = $_dtNascimento;
            $this->cidade = $_cidade;
            $this->senha = $_senha;
        }
    

        public function getNome() {
            return $this->nome;
        }

        public function getEmail() {
            return $this->email;
        }
        
        public function getDtNascimento() {
            return $this->dtNascimento;
        }

        public function getCidade() {
            return $this->cidade;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setNome($_nome) {
            $this->nome = $_nome;
        }

        public function setEmail($_email) {
            $this->email = $_email;
        }

        public function setDtNascimento($_dtNascimento) {
            $this->dtNascimento = $_dtNascimento;
        }

        public function setCidade($_cidade) {
            $this->cidade = $_cidade;
        }

        public function setSenha($_senha) {
            $this->senha = $_senha;
        }

        public function inserirUsuario() {

            include_once('../db/conn.php');
            $sql = "CALL piUsuario(:nome, :email, :dtNascimento, :cidade, :senha)";

            $data = [
                'nome' => $this->nome,
                'email' => $this->email,
                'dtNascimento' => $this->dtNascimento,
                'cidade' => $this->cidade,
                'senha' => $this->senha
            ];

            $statement = $conn->prepare($sql);
            $statement->execute($data);

            return true;
        }

        public function listarUsuario() {
            include('../db/conn.php');
            $sql = "CALL psUsuario('')";

            $data = $conn->query($sql)->fetchAll();

            return $data;
        }

        public function excluirUsuario($_id)
        {
            include("../db/conn.php");
            $sql = "CALL pdUsuario(:id)";

            $data = [
                'id' => $_id
            ];

            $statement = $conn->prepare($sql);
            $statement->execute($data);

            return true;
        }
    }
?>