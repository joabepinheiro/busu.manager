<?php
namespace Application\Controller;

use Application\Service\Onibus;
use Base\Controller\ActionController;
use Zend\View\Model\ViewModel;

class AdministradorController extends ActionController
{
    public function __construct()
    {
        $this->slug = 'usuario';
        parent::__construct();
    }

    public function indexAction()
    {
        return new ViewModel();
    }
}
