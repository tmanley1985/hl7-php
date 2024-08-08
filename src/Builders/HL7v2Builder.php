<?php

declare(strict_types=1);

namespace TManley1985\HL7Php\Builders;

use TManley1985\HL7Php\Contracts\HL7BuilderInterface;
use TManley1985\HL7Php\Contracts\HL7MessageInterface;
use TManley1985\HL7Php\Messages\HL7v2Message;
use TManley1985\HL7Php\Segments\HL7Segment;

final class HL7v2Builder implements HL7BuilderInterface {

    public function __construct(private array $segments = []) {}

    public static function create(): HL7BuilderInterface {
        return new self();
    }

    public function addSegment(string $segmentType, callable $fieldsCallback): self {

        $segment = HL7Segment::create()
            ->addField($segmentType);

        // Here we allow the caller to add field(s) to the segment.
        $segment = $fieldsCallback($segment);

        $this->segments[] = $segment;

        return $this;
    }
    public function build(): HL7MessageInterface {
        return HL7v2Message::fromSegments($this->segments);
    }
}