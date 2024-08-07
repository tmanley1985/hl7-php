<?php

namespace TManley1985\HL7Php\Tests\Unit;

use TManley1985\HL7Php\Tests\Stubs\HL7Stubs;

test('example', function () {

    var_dump(HL7Stubs::getADT_A01());
    expect(true)->toBeTrue();
});
