<?php
namespace Application\Controller;

use Application\Service\Onibus;
use Base\Controller\ActionController;
use Zend\View\Model\ViewModel;

class LinhaController extends ActionController
{
    public function __construct()
    {
        $this->slug = 'linha';
        parent::__construct();
    }

    public function indexAction()
    {
        return new ViewModel();
    }
}
