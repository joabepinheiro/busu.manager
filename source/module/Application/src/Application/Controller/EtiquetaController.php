<?php
namespace Application\Controller;

use Application\Service\Onibus;
use Base\Controller\ActionController;
use Zend\View\Model\ViewModel;

class EtiquetaController extends ActionController
{
    public function __construct()
    {
        $this->slug = 'etiqueta';
        parent::__construct();
    }

    public function indexAction()
    {
        return new ViewModel();
    }
}
