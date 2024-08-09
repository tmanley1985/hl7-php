<?php

namespace TManley1985\HL7Php\Tests\Unit;

use TManley1985\HL7Php\Messages\HL7v2Message;
use TManley1985\HL7Php\Segments\HL7Segment;
use TManley1985\HL7Php\Tests\Stubs\HL7Stubs;

test('example', function () {

    $expected = HL7Stubs::getADT_A01();

    /* @var HL7v2Message */
    $message = HL7v2Message::builder()
        ->addSegment('MSH', function (HL7Segment $segment) {
            $segment
                ->addField("^~\&")
                ->addField("SENDING_APPLICATION")
                ->addField("SENDING_FACILITY")
                ->addField("RECEIVING_APPLICATION")
                ->addField("RECEIVING_FACILITY")
                ->addField("20230815083000")
                ->addEmptyFields(1)
                ->addField("ADT^A01")
                ->addField("MSG00001")
                ->addField("P")
                ->addField("2.5.1");
        })
        ->addSegment("EVN", function (HL7Segment $segment) {
            $segment
                ->addField("A01")
                ->addField("20230815083000");
        })
        ->addSegment("PID", function (HL7Segment $segment) {
            $segment
                ->addField("1")
                ->addEmptyFields(1)
                ->addField("10006579^^^1^MRN^1")
                ->addEmptyField()
                ->addField("DUCK^DONALD^D")
                ->addEmptyFields(1)
                ->addField("19241010")
                ->addField("M")
                ->addEmptyFields(1)
                ->addField("1")
                ->addField("111 DUCK ST^^FOWL^CA^999990000^^M")
                ->addField("1")
                ->addField("8005551212")
                ->addField("8005551212")
                ->addField("1")
                ->addField("2")
                ->addEmptyField(1)
                ->addField("40007716^^^1^AN^1")
                ->addEmptyFields(1)
                ->addField("610074^^^1^DD^1")
                ->addField("Y")
                ->addField("1")
                ->addEmptyFields(10)
                ->addField("N");
        })
        ->addSegment("NK1", function (HL7Segment $segment) {
            $segment
                ->addField("1")
                ->addField("DUCK^DAISY^D")
                ->addField("SO")
                ->addField("3583 DUCK RD^^FOWL^CA^999990000")
                ->addField("8005552222")
                ->addEmptyFields(1)
                ->addField("Y")
                ->addEmptyFields(13);
        })
        ->addSegment("PV1", function (HL7Segment $segment) {
            $segment
                ->addField("1")
                ->addField("I")
                ->addField("PREOP^101^1^1^^^S")
                ->addField("3")
                ->addEmptyFields(2)
                ->addField("37^DISNEY^WALT^^^^^^1")
                ->addEmptyFields(2)
                ->addField("01")
                ->addEmptyFields(3)
                ->addField("1")
                ->addEmptyFields(2)
                ->addField("37^DISNEY^WALT^^^^^^1")
                ->addField("2")
                ->addField("40007716^^^1^AN^1")
                ->addField("4")
                ->addEmptyFields(18)
                ->addField("1")
                ->addEmptyFields(1)
                ->addField("G")
                ->addEmptyFields(2)
                ->addField("20230815082500")
                ->addEmptyFields(5);
        })
        ->build();

    $message = $message->toString();
    $actual = HL7Stubs::getADT_A01();

    expect($message)->toBe($actual);
});
