<?php
//! Description
/**
* @date 3/28/13 11:33 AM
* @version 0.1
* @author Dmitry Bogatsky dbogatsky@gmail.com
*/

namespace app\tests\cases\models;

use app\models\Palindromic;

class PalindromicTest extends \PHPUnit_Framework_TestCase
{
    public function testGetTheLargest()
    {
        $correctResultValue = 9009;
        $palindromic = new Palindromic(2);
        $realResultValue = $palindromic->getTheLargest();
        $this->assertEquals($correctResultValue, $realResultValue);

        $correctResultValue = 906609;
        $palindromic = new Palindromic(3);
        $realResultValue = $palindromic->getTheLargest();
        $this->assertEquals($correctResultValue, $realResultValue);
    }
}

?>
