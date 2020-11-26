<?php

/*
 * Author : Maarten Verijdt (murtho@gmail.com)
 */

namespace Murtho\Tests\Unit\Utility;

use Murtho\Utility\DateUtilities;
use PHPUnit\Framework\TestCase;

/**
 * DateUtilitiesTest
 */
final class DateUtilitiesTest extends TestCase
{
    /**
     * @param string      $intervalSpec
     * @param string|null $expectedOutput
     *
     * @test
     * @dataProvider provideFormatsIntervalData
     */
    public function formatsInterval(string $intervalSpec, string $expectedOutput = null)
    {
        $dateInterval = new \DateInterval($intervalSpec);

        $output = DateUtilities::formatInterval($dateInterval);

        static::assertEquals($expectedOutput, $output);

        if (null !== $output) {
            static::assertIsString($output);
        }
    }

    /**
     * @return array
     */
    public function provideFormatsIntervalData(): array
    {
        return [
            ["P2Y", "P2Y"],
            ["P4M", "P4M"],
            ["P7D", "P7D"],
            ["PT12H", "PT12H"],
            ["PT15M", "PT15M"],
            ["PT20S", "PT20S"],
            ["P2Y4M7D", "P2Y4M7D"],
            ["PT12H15M20S", "PT12H15M20S"],
            ["P2Y4M7DT12H15M20S", "P2Y4M7DT12H15M20S"],
            ["P0Y", null],
            ["P0M", null],
            ["P0D", null],
            ["PT0H", null],
            ["PT0M", null],
            ["PT0S", null],
        ];
    }
}