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
class Matcher
{
    public function __construct() {}

    /**
     * Get matches for a password.
     *
     * @param string $password   Password string to match.
     * @param array  $userInputs Values related to the user (optional).
     *
     * @code
     *   array('Alice Smith')
     * @endcode
     *
     * @return array Array of Match objects.
     */
    public function getMatches($password, array $userInputs = array())
    {
        $matches = [];

        foreach ($this->getMatchers() as $matcher) {
            $matched = $matcher::match($password, $userInputs);
            if (is_array($matched) && !empty($matched)) {
                $matches = array_merge($matches, $matched);
            }
        }

        return $matches;
    }

    /**
     * Load available Match objects to match against a password.
     *
     * @return array Classes implementing MatchInterface
     */
    protected function getMatchers()
    {
        // @todo change to dynamic
        return array(
            'Unit6\zxcvbn\Matchers\DateMatch',
            'Unit6\zxcvbn\Matchers\DigitMatch',
            'Unit6\zxcvbn\Matchers\LeetMatch',
            'Unit6\zxcvbn\Matchers\RepeatMatch',
            'Unit6\zxcvbn\Matchers\SequenceMatch',
            'Unit6\zxcvbn\Matchers\SpatialMatch',
            'Unit6\zxcvbn\Matchers\YearMatch',
            'Unit6\zxcvbn\Matchers\DictionaryMatch',
        );
    }
}