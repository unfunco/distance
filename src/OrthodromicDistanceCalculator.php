<?php

/*
 * Honest\Distance
 *
 * Copyright © 2017 Honest Empire Ltd
 *
 * Permission to use, copy, modify, and/or distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
 * WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY
 * SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
 * WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION
 * OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF OR IN
 * CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
 */

declare(strict_types = 1);

namespace Honest\Distance;

/**
 * Orthodromic distance calculator.
 *
 * @package Honest\Distance
 * @author  Daniel Morris <daniel@honestempire.com>
 */
class OrthodromicDistanceCalculator implements DistanceCalculator
{
    /**
     * Constant for converting degrees to radians.
     */
    private const DEGREES_TO_RADIANS = M_PI / 180;

    /**
     * Approximate radius of Earth in metres.
     */
    private const EARTH_RADIUS = 6372797.560856;

    /**
     * Calculates the distance between two points in metres.
     *
     * Calculates the orthodromic distance between two points, that is the
     * shortest distance between two points on a sphere.
     *
     * @param Point $from Starting point.
     * @param Point $to   Ending point.
     *
     * @return float
     */
    public function calculateDistance(Point $from, Point $to): float
    {
        return static::EARTH_RADIUS * $this->arc($from, $to);
    }

    /**
     * Computes the arc in radians between two points.
     *
     * @param Point $from Starting point.
     * @param Point $to   Ending point.
     *
     * @return float
     */
    private function arc(Point $from, Point $to): float
    {
        $latFrom = $from->getLatitude();
        $latTo = $to->getLatitude();

        $lngFrom = $from->getLongitude();
        $lngTo = $to->getLongitude();

        $latHaversine = sin(($latFrom - $latTo) * static::DEGREES_TO_RADIANS * 0.5) ** 2;
        $lngHaversine = sin(($lngFrom - $lngTo) * static::DEGREES_TO_RADIANS * 0.5) ** 2;

        $cosProduct = cos($latFrom * static::DEGREES_TO_RADIANS) * cos($latTo * static::DEGREES_TO_RADIANS);

        return 2 * asin(sqrt($latHaversine + $cosProduct * $lngHaversine));
    }
}
