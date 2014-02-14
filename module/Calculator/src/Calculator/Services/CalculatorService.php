<?php
namespace Calculator\Services;

use Zend\Session\Container;

class CalculatorService  {

    public function math($firstNumber, $secondNumber, $operator) {
        $operation = $this->operation($operator);
        return $this->$operation($firstNumber, $secondNumber);
    }

    private function operation($operator) {
        $availableOperations = array(
            "add" => "add",
            "subtract" => "subtract",
            "multiply" => "multiply",
            "divide" => "divide",
            "modulo" => "modulo",
        );
        $operation = $availableOperations[$operator];
        if (!$operation) {
            throw new \Exception("Operation not allowed");
        }
        return $operation;
    }

    private function add($firstNumber, $secondNumber) {
        return $firstNumber + $secondNumber;
    }

    private function subtract($firstNumber, $secondNumber) {
        return $firstNumber - $secondNumber;
    }

    private function multiply($firstNumber, $secondNumber) {
        return $firstNumber * $secondNumber;
    }

    private function divide($firstNumber, $secondNumber) {
        if ($secondNumber == 0) {
            return "Divide by zero oh shi--";
        } else {
            return $firstNumber / $secondNumber;
        }
    }

    private function modulo($firstNumber, $secondNumber) {
        return $firstNumber % $secondNumber;
    }

    private function saveAnswer($answer) {
        $container = new Container('calculator');
        $container->$answer = $answer;
        $message = "Saved to memory.";
        return $message;
    }

    private function getAnswer() {
        $savedAnswer = array();
        $container = new Container('calculator');
        foreach($container as $key => $value) {
            $savedAnswer[$key] = $value;
        }
        return $savedAnswer;
    }

    private function clearAnswer() {
        $container = new Container('calculator');
        $container->getManager()->getStorage()->clear('calculator');
        $message = "Cleared memory.";
        return $message;
    }

}
