<?php

declare(strict_types=1);

namespace TManley1985\HL7Php\Messages;

use TManley1985\HL7Php\Builders\HL7v2Builder;
use TManley1985\HL7Php\Contracts\HL7MessageInterface;
use TManley1985\HL7Php\Contracts\HL7BuilderInterface;
use TManley1985\HL7Php\Contracts\HL7ParserInterface;
use TManley1985\HL7Php\Parsers\HL7v2Parser;

final class HL7v2Message implements HL7MessageInterface
{
    public function __construct(private array $segments)
    {
    }

    public static function fromSegments(array $segments)
    {
        return new self($segments);
    }

    public static function builder(): HL7BuilderInterface
    {
        return HL7v2Builder::create();
    }

    public static function parser(): HL7ParserInterface
    {
        return HL7v2Parser::create();
    }

    public function getSegments(): array
    {
        return $this->segments;
    }

    public function toString(): string
    {
        // Each segment needs their fields to be joined with pipe characters
        // and then joined with \r characters as per the spec.
        $segments = array_map(fn ($segment) => $segment->toString(), $this->segments);

        $message = "";

        foreach ($segments as $segment) {
            $message .= $segment . "\r";
        }
        return $message;
    }

}
