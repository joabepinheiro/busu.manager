<?php
namespace Application\Controller;

use Application\Service\Onibus;
use Base\Controller\ActionController;
use Zend\View\Model\ViewModel;

class ItinerarioController extends ActionController
{
    public function __construct()
    {
        $this->slug = 'itinerario';
        $this->formService = true;
        parent::__construct();
    }

    public function indexAction()
    {
        return new ViewModel();
    }
}
