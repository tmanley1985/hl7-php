<?php

declare(strict_types=1);

namespace TManley1985\HL7Php\Contracts;

interface HL7ParserInterface
{
    public function parse(string $hl7String): HL7MessageInterface;
}
