<?php
    
    class Genero {

        private ?int $id;
        private ?String $genero;

        public function __toString(){
            return $this->genero;
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
         * Get the value of genero
         */ 
        public function getGenero()
        {
                return $this->genero;
        }

        /**
         * Set the value of genero
         *
         * @return  self
         */ 
        public function setGenero($genero)
        {
                $this->genero = $genero;

                return $this;
        }
    }