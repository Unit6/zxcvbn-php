<?php
/*
 * This file is part of the zxcvbn package.
 *
 * (c) Unit6 <team@unit6websites.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Unit6\zxcvbn;

/**
 * Tests for Searcher.
 *
 * @author Unit6 <team@unit6websites.com>
 */
class SearcherTest extends \PHPUnit_Framework_TestCase
{
    public function testMinimumEntropyMatchSequence()
    {
        $searcher = new Searcher();

        // Test simple password with no matches.
        $password = 'a';
        $entropy = $searcher->getMinimumEntropy($password, array());
        $this->assertEquals(log(26, 2), $entropy, 'Entropy incorrect for single character lowercase password');

        // Test password with repeat pattern.
        $password = 'aaa';
        $match = new Matchers\RepeatMatch($password, 0, 2, 'aaa', 'a');
        $entropy = $searcher->getMinimumEntropy($password, array($match));
        $this->assertEquals(log(26 * 3, 2), $entropy, 'Entropy incorrect for ' . $password);
        $sequence = $searcher->matchSequence;
        $this->assertSame($match, $sequence[0], 'Best match incorrect');
    }
}