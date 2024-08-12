<?php

namespace TManley1985\HL7Php\Tests\Unit;

use TManley1985\HL7Php\Messages\HL7v2Message;
use TManley1985\HL7Php\Segments\HL7Segment;
use TManley1985\HL7Php\Tests\Stubs\HL7Stubs;

test('it should parse a proper v2 message', function () {

    $expected = HL7Stubs::getADT_A01();

    $actual = HL7v2Message::parser()
        ->parse($expected)
        ->toString();

    expect($expected)->toBe($actual);
});
