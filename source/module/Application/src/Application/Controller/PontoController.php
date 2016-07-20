<?php
namespace Application\Controller;

use Application\Service\Leitor;
use Application\Service\Onibus;
use Base\Controller\ActionController;
use Zend\Form\Element\Select;
use Zend\View\Model\ViewModel;

class PontoController extends ActionController
{
    public function __construct()
    {
        $this->slug = 'ponto';
        $this->formService = true;
        parent::__construct();
    }

    public function indexAction()
    {
        return new ViewModel();
    }

}
