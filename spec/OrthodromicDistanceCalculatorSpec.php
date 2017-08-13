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

namespace spec\Honest\Distance;

use Honest\Distance\DistanceCalculator;
use Honest\Distance\OrthodromicDistanceCalculator;
use Honest\Distance\Point;
use PhpSpec\ObjectBehavior;

/**
 * Specification for the orthodromic distance calculator.
 *
 * @mixin OrthodromicDistanceCalculator
 *
 * @package Honest\Distance
 * @author  Daniel Morris <daniel@honestempire.com>
 */
final class OrthodromicDistanceCalculatorSpec extends ObjectBehavior
{
    function it_is_a_distance_calculator()
    {
        $this->shouldImplement(DistanceCalculator::class);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(OrthodromicDistanceCalculator::class);
    }

    function it_calculates_the_distance_between_two_points(Point $fromStart, Point $toEnd)
    {
        $fromStart->getLatitude()->willReturn(52.5121);
        $fromStart->getLongitude()->willReturn(3.3131);

        $toEnd->getLatitude()->willReturn(53.4084);
        $toEnd->getLongitude()->willReturn(2.9916);

        // Approximate within 10 metres.
        $this->calculateDistance($fromStart, $toEnd)->shouldBeApproximately(102000, 1e1);
    }
}
