<?php

declare(strict_types=1);

namespace TManley1985\HL7Php\Contracts;

interface HL7MessageInterface
{
    public function toString(): string;
}
