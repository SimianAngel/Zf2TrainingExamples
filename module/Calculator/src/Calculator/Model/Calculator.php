<?php

namespace Calculator\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Calculator implements InputFilterAwareInterface
{
    public $firstNumber;
    public $secondNumber;
    public $operator;
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->firstNumber = (isset($data['firstNumber'])) ? $data['firstNumber'] : null;
        $this->secondNumber = (isset($data['secondNumber'])) ? $data['secondNumber'] : null;
        $this->operator = (isset($data['operator'])) ? $data['operator'] : null;
    }

    // Add content to this method:
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'firstNumber',
                'required' => false,
                'filters'  => array(
                    //array('name' => 'text'),
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'secondNumber',
                'required' => false,
                'filters'  => array(
                    //array('name' => 'text'),
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'operator',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}