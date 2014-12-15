<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Form\Form as FrmMunicipio;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        
        $form = new FrmMunicipio;
    	        
        $form->add(array(
        'name' => 'municipio',
        'type' => 'Application\Form\Element\MyAutocompleteElement',
        'options' => array(
            'label' => 'My label here',
            'sm' => $this->getServiceLocator(), // don't forget to send Service Manager
        ),
        'attributes' => array(
            'required' => false,
            'class' => 'form-control input-sm'
        )
    ));
        
        
        return new ViewModel(array('form' => $form));
    }
}
