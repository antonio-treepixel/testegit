<?php
namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Municipios;
use Application\Entity\Configurator;

class Municipio {
	
	/**
	 * @var Entity Mananger
	 */
	
	
	public function __construct(EntityManager $em){
		
		$this->em = $em;
	}
	
	public function insert(array $data){
		
		$entity = new Municipios($data);
		$this->em->persist($entity);
		$this->em->flush();
		return $entity;
	}
	
	public function update(array $data){
		$entity = $this->em->getReference('Application\Entity\Municipios', $data['id']);
		
		if (empty($data['senha']))
			unset($data['senha']);
		
		$entity = Configurator::configure($entity, $data);
		
		$this->em->persist($entity);
		$this->em->flush();
		return $entity;
	}
	
	public function delete($data) {
		$entity = $this->em->getReference('Application\Entity\Municipios', $data['id']);
		if($entity) {
			$this->em->remove($entity);
			$this->em->flush();
			return $id;
		}
	}
}