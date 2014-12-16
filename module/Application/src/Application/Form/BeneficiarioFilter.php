<?php
namespace Application\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\FileInput;
use Zend\Filter\File\RenameUpload;
use Zend\Validator\File\Size;
use Zend\Validator\File\MimeType;


class BeneficiarioFilter extends InputFilter {
	
	public function __construct(){
		
		/*$this->add(array(
			'name' => 'nome',
			'required' => true,
			'filters'  => array(
				array('name' => 'StripTags'),
				array('name' => 'StringTrim')
			),
			'validators' => array(
				array('name' => 'NotEmpty',
					  'options' => array(
					  'messages' => array('isEmpty' => 'nome não pode estar em branco')
					  )
				)
			)	
		));*/
		
		$foto = new FileInput('img');
		$foto->setRequired(true);
		$foto->getFilterChain()->attach(new RenameUpload(array(
			'target' => './data/beneficiario',
			'use_upload_extension' => true,
			'randomize' => true,	
		)));
		$foto->getValidatorChain()->attach(new Size(array(
				'max' => substr(ini_get('upload_max_filesize'), 0, -1).'MB'
		)));
		$foto->getValidatorChain()->attach(
				new MimeType(array(
						
					'image/gif',
					'image/jpeg',
					'image/png',
					'enableHeaderCheck' => true	
				))
				
				);
		$this->add($foto);
	}
}