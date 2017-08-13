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
 * Point object.
 *
 * @package Honest\Distance
 * @author  Daniel Morris <daniel@honestempire.com>
 */
class Point
{
    /**
     * Latitude of the point.
     *
     * @var float
     */
    private $latitude;

    /**
     * Longitude of the point.
     *
     * @var float
     */
    private $longitude;

    /**
     * Instantiates a point.
     *
     * @param float $latitude  Latitude of the point.
     * @param float $longitude Longitude of the point.
     */
    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * Returns the latitude of the point.
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Returns the longitude of the point.
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
