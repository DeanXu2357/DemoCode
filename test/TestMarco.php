<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Marco;
use App\traits\Marco as MarcoTrait;

/**
 * MarcoTest
 *
 * @group group
 */
class MarcoTest extends TestCase
{
    /**
     * @test
     */
    public function 程式正常執行()
    {
        // arrange
        $expected = 'bar';
        $marco = new Marco;

        // act
        $marco->marco('foo', function () {
            return 'bar';
        });
        $actual = $marco->foo();

        $marco->marco('foo2', function () {
            return $this->data;
        });
        $actual2 = $marco->foo2();

        $marco->marco('foo3', function ($input) {
            return $input;
        });
        $actual3 = $marco->foo3('bar');

        // assert
        $this->assertEquals($expected, $actual);
        $this->assertEquals($expected, $actual2);
        $this->assertEquals($expected, $actual3);
    }


    /**
     * @test
     */
    public function 特徵版本的測試()
    {
        // arrange
        $mock = $this->getMockForTrait(MarcoTrait::class);
        $expected = 'bar';

        // act
        $mock->marco('foo', function () {
            return 'bar';
        });
        $actual = $mock->foo();

        $mock->marco('foo2', function () {
            return $this->data;
        });
        $actual2 = $mock->foo2();

        $mock->marco('foo3', function ($input) {
            return $input;
        });
        $actual3 = $mock->foo3('bar');

        // assert
        $this->assertEquals($expected, $actual);
        $this->assertEquals($expected, $actual2);
        $this->assertEquals($expected, $actual3);

        // assertions
    }
}
