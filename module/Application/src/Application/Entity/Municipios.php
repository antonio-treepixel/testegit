<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="municipios")
 * @ORM\Entity(repositoryClass="Application\Entity\MunicipiosRepository")
 */
class Municipios {

     public function __construct($options = null){
     	Configurator::configure($this, $options);
     }
      
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @var int
	 */
	protected $id;
    
        /**
         * @ORM\Column(name="municipio", type="text")
         * @var string
         */
        protected $municipio;
    
    
        /**
         * @ORM\Column(name="iduf", type="text")
         * @var int
         */
        protected $iduf;

        /**
         * @ORM\Column(name="uf", type="text")
         * @var string
         */
        protected $uf;
    
       
        
        
        
        public function getId() {
            return $this->id;
        }

        public function getMunicipio() {
            return $this->municipio;
        }

        public function getIduf() {
            return $this->iduf;
        }

        public function getUf() {
            return $this->uf;
        }

        public function setId($id) {
            $this->id = $id;
            return $this;
        }

        public function setMunicipio($municipio) {
            $this->municipio = $municipio;
            return $this;
        }

        public function setIduf($iduf) {
            $this->iduf = $iduf;
            return $this;
        }

        public function setUf($uf) {
            $this->uf = $uf;
            return $this;
        }

         
    
    public function __toString() {
        return $this->nome;
    }
    
        
    public function toArray() {
        return array(
        	'id'=>$this->getId(),
        	'municipio'=>$this->getMunicipio(),
        	'iduf'=>$this->getIduf(), 
        	'uf'=>$this->getUf(), 
	
        );
    }
}