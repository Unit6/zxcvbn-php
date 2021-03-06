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
 * Tests for Matcher.
 *
 * @author Unit6 <team@unit6websites.com>
 */
class MatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testGetMatches()
    {
        $matcher = new Matcher();
        $matches = $matcher->getMatches('jjj');
        $this->assertSame('repeat', $matches[0]->pattern, 'Pattern incorrect');
        $this->assertCount(1, $matches);

        $matches = $matcher->getMatches('jjjjj');
        $this->assertSame('repeat', $matches[0]->pattern, 'Pattern incorrect');
    }
}