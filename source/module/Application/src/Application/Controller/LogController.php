<?php
namespace Application\Controller;

use Application\Service\Log;
use Application\Service\Onibus;
use Base\Controller\ActionController;
use Zend\View\Model\ViewModel;

class LogController extends ActionController
{
    public function __construct()
    {
        $this->slug = 'log';
        $this->formService = true;
        parent::__construct();
    }

    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function postAction(){
        $post = $this->getRequest()->getPost();
        (new Log($this->getDm()))->insert($post);
    }
}
