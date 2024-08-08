<?php

declare(strict_types=1);

namespace TManley1985\HL7Php\Messages;

use TManley1985\HL7Php\Builders\HL7v2Builder;
use TManley1985\HL7Php\Contracts\HL7MessageInterface;
use TManley1985\HL7Php\Contracts\HL7BuilderInterface;

final class HL7v2Message implements HL7MessageInterface {

    public function __construct(private array $segments) {}

    public static function fromSegments(array $segments) {
        return new self($segments);
    }

    public static function builder(): HL7BuilderInterface {
        return HL7v2Builder::create();
    }

    public function toString(): string {
        return "MSH|^~\&|SENDING_APPLICATION|SENDING_FACILITY|RECEIVING_APPLICATION|RECEIVING_FACILITY|20230815083000||ADT^A01|MSG00001|P|2.5.1
EVN|A01|20230815083000
PID|1||10006579^^^1^MRN^1||DUCK^DONALD^D||19241010|M||1|111 DUCK ST^^FOWL^CA^999990000^^M|1|8005551212|8005551212|1|2||40007716^^^1^AN^1||610074^^^1^DD^1|Y|1|||||||||||N
NK1|1|DUCK^DAISY^D|SO|3583 DUCK RD^^FOWL^CA^999990000|8005552222||Y||||||||||||||
PV1|1|I|PREOP^101^1^1^^^S|3|||37^DISNEY^WALT^^^^^^1|||01||||1|||37^DISNEY^WALT^^^^^^1|2|40007716^^^1^AN^1|4|||||||||||||||||||1||G|||20230815082500||||||";
    }

}