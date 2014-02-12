<?php

namespace Calculator\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StringCalculatorController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function CalculateAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $firstNumber = is_null($request->getPost()->firstNumber) ? 0 : (float) $request->getPost()->firstNumber;
            $secondNumber = is_null($request->getPost()->secondNumber) ? 0 : (float) $request->getPost()->secondNumber;
            $operator = $request->getPost()->operator;
            $answer = "ERR";

            switch($operator) {
                case "add":
                    $answer = $firstNumber + $secondNumber;
                    break;
                case "subtract":
                    $answer = $firstNumber - $secondNumber;
                    break;
                case "multiply":
                    $answer = $firstNumber * $secondNumber;
                    break;
                case "divide":
                    if ($secondNumber == 0) {
                        $answer = "Divide by zero oh shi--";
                    } else {
                        $answer = $firstNumber / $secondNumber;
                    }
                    break;
                case "modulo":
                    $answer = $firstNumber % $secondNumber;
                    break;
                default:
                    $answer = "Please select an operator.";
            }

            return array('answer'=>$answer);

        } else {
            return new ViewModel();
        }
    }


}

