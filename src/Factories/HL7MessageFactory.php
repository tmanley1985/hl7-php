<?php

declare(strict_types=1);

namespace TManley1985\HL7Php\Factories;

use TManley1985\HL7Php\Contracts\HL7MessageInterface;
use TManley1985\HL7Php\Contracts\HL7BuilderInterface;
use TManley1985\HL7Php\Messages\HL7v2Message;

enum HL7Version: string
{
    case V2_3 = 'v2.3';
    case V2_4 = 'v2.4';
    case V2_5 = 'v2.5';
    case V2_6 = 'v2.6';
    case V2_7 = 'v2.7';
}

final class HL7MessageFactory
{
    public static function createBuilder(HL7Version $version): HL7BuilderInterface
    {
        return match($version) {
            HL7Version::V2_3,
            HL7Version::V2_4,
            HL7Version::V2_5,
            HL7Version::V2_6,
            HL7Version::V2_7 => HL7v2Message::builder(),
        };
    }
}