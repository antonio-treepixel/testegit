<?php
namespace Application\Form\Element;

use Zf2DoctrineAutocomplete\Form\Element\ObjectAutocomplete;

class MyAutocompleteElement extends ObjectAutocomplete {

	private $initialized = false;

	public function setOptions($options) {
		if (!$this->initialized) {
			$options = array_merge($options, array(
					'class' => get_class($this),
					'object_manager' => $options['sm']->get('Doctrine\ORM\EntityManager'), // For Doctrine ORM
					// 'object_manager' => $options['sm']->get('doctrine.documentmanager.odm_default'), // For Doctrine ODM (Mongodb)
					'target_class' => 'Application\Entity\Municipios',
					'searchFields' => array('id', 'municipio'),
					'empty_item_label' => 'Municipio não encontrado',
					'select_warning_message' => 'Selecione um Município na lista',
					'property' => 'id',
					'orderBy' => array('municipio','ASC')
			));
			$this->initialized = true;
		}

		parent::setOptions($options);
	}

}