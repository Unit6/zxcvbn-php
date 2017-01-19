<?php
/*
 * This file is part of the zxcvbn package.
 *
 * (c) Unit6 <team@unit6websites.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Unit6\zxcvbn\Matchers;

/**
 * Tests for Spatial Matches.
 *
 * @author Unit6 <team@unit6websites.com>
 */
class SpatialMatchTest extends \PHPUnit_Framework_TestCase
{
    public function testMatch()
    {
        $password = 'qzpm';
        $matches = SpatialMatch::match($password);
        $this->assertEmpty($matches);

        $password = 'reds';
        $matches = SpatialMatch::match($password);
        $this->assertCount(1, $matches);

        $password = 'qwerty';
        $matches = SpatialMatch::match($password);
        $this->assertCount(1, $matches);
        $this->assertSame(1, $matches[0]->turns, 'Turns incorrect');

        $password = '8qwerty_';
        $matches = SpatialMatch::match($password);
        $this->assertCount(1, $matches);
        $this->assertSame('qwerty', $matches[0]->token, 'Token incorrect');

        $password = 'qwER43@!';
        $matches = SpatialMatch::match($password);
        $this->assertCount(2, $matches);
        $this->assertSame('dvorak', $matches[1]->graph, 'Graph incorrect');

        $password = 'AOEUIDHG&*()LS_';
        $matches = SpatialMatch::match($password);
        $this->assertCount(2, $matches);
    }

    public function testEntropy()
    {
        $password = 'reds';
        $matches = SpatialMatch::match($password);
        $this->assertEquals(15.23614334369886, $matches[0]->getEntropy());

        // Test shifted character.
        $password = 'rEds';
        $matches = SpatialMatch::match($password);
        $this->assertEquals(17.55807143858622, $matches[0]->getEntropy());
    }
}