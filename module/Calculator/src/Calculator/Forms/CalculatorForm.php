<?php

namespace Calculator\Forms;
use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Submit;

class CalculatorForm extends Form {

    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('calculator');
        $this->setAttribute('method', 'post');

        $firstNumber = new Text();
        $firstNumber->setName('firstNumber');
        $firstNumber->setOptions(array(
           'required' => 'false'
        ));
        $this->add($firstNumber);

        /*
        $this->add(array(
            'name' => 'firstNumber',
            'attributes' => array(
                'type'  => 'text',
                'id'    => 'firstNumber',
            ),
            'options'   => array(
                'label' => 'First Number:'
            ),
        ));
        */

        $this->add(array(
            'name' => 'secondNumber',
            'attributes' => array(
                'type'  => 'text',
                'id'    => 'secondNumber',
            ),
            'options' => array(
                'label' => 'Second Number:',
            ),
        ));
        $this->add(array(
            'name' => 'operator',
            'attributes' => array(
                'type'  => 'select',
                'options' => array(
                    ''          => 'Select Operator...',
                    'add'       => 'Add',
                    'subtract'  => 'Subtract',
                    'multiply'  => 'Multiply',
                    'divide'    => 'Divide',
                    'modulo'    => 'Modulo',
                ),
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Calculate',
                'id' => 'submitbutton',
            ),
        ));
    }

}