<?php

declare(strict_types=1);

namespace TManley1985\HL7Php\Contracts;

interface HL7BuilderInterface
{
    public function addSegment(string $segmentType, callable $fieldsCallback): self;
    public function build(): HL7MessageInterface;
}