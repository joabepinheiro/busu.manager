<?php
namespace Application\Controller;

use Application\Service\Onibus;
use Base\Controller\ActionController;
use Zend\View\Model\ViewModel;

class OnibusController extends ActionController
{
    public function __construct()
    {
        $this->slug = 'onibus';
        $this->formService = true;
        parent::__construct();
    }

    public function indexAction()
    {
        return new ViewModel();
    }
}
