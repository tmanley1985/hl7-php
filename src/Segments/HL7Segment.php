<?php

declare(strict_types=1);

namespace TManley1985\HL7Php\Segments;

final class HL7Segment {

    public function __construct(private array $fields = []) {}

    public static function create(): self {
        return new self();
    }

    public function addField(string $field): self {
        // TODO: Probably should normalize this into its own class.
        $this->fields[] = $field;
        return $this;
    }

    public function addEmptyField(): self {
        return $this->addEmptyFields(1);
    }

    public function addEmptyFields(int $numFields): self {

        for ($i = 0; $i < $numFields; $i++) {
            $this->fields[] = "";
        }
        return $this;
    }
}