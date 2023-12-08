<?php
require_once(__DIR__ . "/Generos.php");
require_once(__DIR__ . "/Paises.php");


    class Filme{
        private ?int $id;
        private ?string $nome;
        private ?Genero $gen;
        private ?Paises $pais;
        private ?int $anoLancamento;
        private ?string $diretor;


        public function __construct() {
                $this->id = 0;
                $this->gen = null;
                $this->pais = null;
        }


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nome
         */ 
        public function getNome()
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         *
         * @return  self
         */ 
        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of diretor
         */ 
        public function getDiretor()
        {
                return $this->diretor;
        }

        /**
         * Set the value of diretor
         *
         * @return  self
         */ 
        public function setDiretor($diretor)
        {
                $this->diretor = $diretor;

                return $this;
        }

        /**
         * Get the value of anoLancamento
         */ 
        public function getAnoLancamento()
        {
                return $this->anoLancamento;
        }

        /**
         * Set the value of anoLancamento
         *
         * @return  self
         */ 
        public function setAnoLancamento($anoLancamento)
        {
                $this->anoLancamento = $anoLancamento;

                return $this;
        }

        /**
         * Get the value of gen
         */ 
        public function getGen()
        {
                return $this->gen;
        }

        /**
         * Set the value of gen
         *
         * @return  self
         */ 
        public function setGen($gen)
        {
                $this->gen = $gen;

                return $this;
        }

        /**
         * Get the value of pais
         */ 
        public function getPais()
        {
                return $this->pais;
        }

        /**
         * Set the value of pais
         *
         * @return  self
         */ 
        public function setPais($pais)
        {
                $this->pais = $pais;

                return $this;
        }
    }
?>