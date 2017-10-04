<?php

namespace tests;

use Classes\Currency\CountCurrency;
use Classes\Currency\Service\CbrXMLDaily;

class Fake implements Classes\Currency\Service\Reader
{
    private $values;
    
    public function __construct($values)
    {
        $this->values = $values;
    }
    
    public  function readFile() {
        return $this->values;
    }
}
    
class UnitXMLTest extends \PHPUnit_Framework_TestCase {

    private $countCurrency;

    protected function setUp() {
        $this->countCurrency = new CountCurrency(new Fake(['AUD' => 45, 'GBP' => 50]));
    }

    public function testAdd() {
        $result = $this->countCurrency->calculate(10, 'AUD', 'GBR');
        $this->assertEquals(9, $result);
    }
}
