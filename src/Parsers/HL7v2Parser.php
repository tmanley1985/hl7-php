<?php

declare(strict_types=1);

namespace TManley1985\HL7Php\Parsers;

use TManley1985\HL7Php\Contracts\HL7MessageInterface;
use TManley1985\HL7Php\Contracts\HL7ParserInterface;
use TManley1985\HL7Php\Messages\HL7v2Message;
use TManley1985\HL7Php\Segments\HL7Segment;

final class HL7v2Parser implements HL7ParserInterface
{
    public function __construct()
    {
    }

    public static function create(): HL7ParserInterface
    {
        return new self();
    }

    public function parse(string $hl7String): HL7MessageInterface
    {
        $segments = $this->lex($hl7String);

        $builder = HL7v2Message::builder();

        foreach ($segments as $segment) {
            $fields = explode("|", $segment);

            // Remove the last element if it's empty and the segment ends with a pipe.
            if (end($fields) === '' && substr($segment, -1) === '|') {
                array_pop($fields);
            }

            // We should remove the first element as this is the type.
            // The rest of the fields will be built.
            $type = array_shift($fields);


            $builder->addSegment($type, function (HL7Segment $segment) use ($fields) {
                foreach ($fields as $field) {
                    $segment
                        ->addField($field);
                }
            });
        }

        return $builder->build();
    }

    private function lex(string $hl7String): array
    {
        // Trim any trailing \r characters so that we don't
        // add an extra segment when we explode the string later.
        $hl7String = rtrim($hl7String, "\r");

        // Split the string into segments
        $segments = explode("\r", $hl7String);

        return $segments;
    }
}
