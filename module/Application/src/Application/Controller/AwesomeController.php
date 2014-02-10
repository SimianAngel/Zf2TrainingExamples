<?php
/**
 * Created by PhpStorm.
 * User: Joshua.Holland
 * Date: 2/10/14
 * Time: 10:13 AM
 */

namespace Application\Controller;

use Application\Model\Awesome;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AwesomeController extends AbstractActionController
{
    public function indexAction()
    {
        //$food = $this->params()->fromRoute('food', 'yummy bacon');
        $food = $this->params()->fromRoute('food');
        if ($food == '') {
            return $this->redirect()->toRoute('barf');
        }
        $awesome = new Awesome();
        $theBaconing = $awesome->Baconify();
        return array('food'=>$food, 'theBaconing'=>$theBaconing);
    }

    public function barfAction() {
        $food = "no damn it";
        return array('food'=>$food);
    }
}