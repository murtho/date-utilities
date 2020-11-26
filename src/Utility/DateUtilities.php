<?php

/*
 * Author : Maarten Verijdt (murtho@gmail.com)
 */

namespace Murtho\Utility;

/**
 * DateUtilities
 */
class DateUtilities
{
    /**
     * Format Interval
     *
     * @param \DateInterval $dateInterval
     * @return string|null
     */
    public static function formatInterval(\DateInterval $dateInterval)
    {
        $intervalSpec = "P";

        // years
        if (0 !== $dateInterval->y) {
            $intervalSpec .= strval($dateInterval->y) . "Y";
        }

        // months
        if (0 !== $dateInterval->m) {
            $intervalSpec .= strval($dateInterval->m). "M";
        }

        // days
        if (0 !== $dateInterval->d) {
            $intervalSpec .= strval($dateInterval->d) . "D";
        }

        if (0 !== $dateInterval->h ||
            0 !== $dateInterval->i ||
            0 !== $dateInterval->s
        ) {
            $intervalSpec .= "T";
        }

        // seconds
        if (0 !== $dateInterval->h) {
            $intervalSpec .= strval($dateInterval->h) . "H";
        }

        // minutes
        if (0 !== $dateInterval->i) {
            $intervalSpec .= strval($dateInterval->i) . "M";
        }

        // seconds
        if (0 !== $dateInterval->s) {
            $intervalSpec .= strval($dateInterval->s) . "S";
        }

        if (1 === strlen($intervalSpec)) {
            return null;
        }

        return $intervalSpec;
    }
}