<?php

namespace Calculator\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Calculator\Forms\CalculatorForm;
use Calculator\Model\Calculator;

use Zend\Session\Container;

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

            $calculatorService = $this->getServiceLocator()->get('CalculatorService');
            $test = var_dump($request->getPost());

            if (isset($_POST['saveAnswer'])) {
                //$calculatorService->saveAnswer
                return array('test'=>$test);
            }

            if (isset($_POST['clearAnswer'])) {
                return array('test'=>$test);
            }

            if (isset($_POST['getAnswer'])) {
                return array('test'=>$test);
            }

            $firstNumber = (float) $request->getPost()->get("firstNumber", 0);
            $secondNumber = (float) $request->getPost()->get("secondNumber", 0);
            $operator = $request->getPost()->operator;
            $answer = "ERR";

            /**
             * @var \Calculator\Services\CalculatorService $CalculatorService
             */

            $answer = $calculatorService->math($firstNumber, $secondNumber, $operator);

            return array('answer'=>$answer);

        } else {
            return new ViewModel();
        }
    }

    public function ConsoleCalculateAction() {

        $request = $this->getRequest();

        if(!$request instanceof \Zend\Console\Request){
            throw new \Exception('This request is only allowed from the console.');
        }

        $calculatorService = $this->getServiceLocator()->get('CalculatorService');
        $firstNumber = $request->getParam('firstNumber');
        $secondNumber = $request->getParam('secondNumber');
        $operator = $request->getParam('operator');

        $answer = "ERR";

        /**
         * @var \Calculator\Services\CalculatorService $CalculatorService
         */

        $answer = $calculatorService->math($firstNumber, $secondNumber, $operator);
        echo $answer, PHP_EOL;
    }



    public function Calculate_WIP_Action()
    {
        $form = new CalculatorForm();
        $calculator = new Calculator();
        $request = $this->getRequest();

        $form->setInputFilter($calculator->getInputFilter());
        $form->setData($request->getPost());
        if ($request->isPost()) {
            if ($form->isValid()) {
                $calculator->exchangeArray($form->getData());

                //$firstNumber = (float) $request->getPost()->get("firstNumber", 0);
                $firstNumber = (float) $calculator->firstNumber;
                $secondNumber = (float) $calculator->secondNumber;
                $operator = $calculator->operator;
                $answer = "ERR";

                $calculatorService = $this->getServiceLocator()->get('CalculatorService');
                /**
                 * @var \Calculator\Services\CalculatorService $CalculatorService
                 */
                $answer = $calculatorService->math($firstNumber, $secondNumber, $operator);
                return array('answer'=>$answer);
            }
        } else {
            return array('form'=>$form);
        }
    }


}

