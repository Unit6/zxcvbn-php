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
 *
 *
 *
 *
 * @author Unit6 <team@unit6websites.com>
 */
interface MatchInterface
{
    /**
     * Match this password.
     *
     * @param string $password   Password to check for match.
     * @param array  $userInputs Values related to the user (optional).
     *
     * @code
     *   array('Alice Smith')
     * @endcode
     *
     * @return array Array of Match objects
     */
    public static function match($password, array $userInputs = array());

    /**
     * Get entropy for this match's token.
     *
     * @return float Entropy of the matched token in the password.
     */
    public function getEntropy();
}