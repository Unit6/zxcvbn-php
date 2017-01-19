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
 *
 *
 * @author Unit6 <team@unit6websites.com>
 */
interface ScorerInterface
{
    /**
     * Score for a password's bits of entropy.
     *
     * @param float $entropy Entropy to score.
     *
     * @return float Score.
     */
    public function score($entropy);

    /**
     * Get metrics used to determine score.
     *
     * @return array Key value array of metrics.
     */
    public function getMetrics();
}
