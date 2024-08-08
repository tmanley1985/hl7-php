<?php

declare(strict_types=1);

namespace TManley1985\HL7Php\Tests\Stubs;

final class HL7Stubs
{
    public static function getADT_A01(): string
    {
        $message = 'MSH|^~\&|SENDING_APPLICATION|SENDING_FACILITY|RECEIVING_APPLICATION|RECEIVING_FACILITY|20230815083000||ADT^A01|MSG00001|P|2.5.1' . '\r';
        $message = $message .= 'EVN|A01|20230815083000' . '\r';
        $message = $message .= 'PID|1||10006579^^^1^MRN^1||DUCK^DONALD^D||19241010|M||1|111 DUCK ST^^FOWL^CA^999990000^^M|1|8005551212|8005551212|1|2||40007716^^^1^AN^1||610074^^^1^DD^1|Y|1|||||||||||N' . '\r';
        $message = $message .= 'NK1|1|DUCK^DAISY^D|SO|3583 DUCK RD^^FOWL^CA^999990000|8005552222||Y||||||||||||||' . '\r';
        $message = $message .= 'PV1|1|I|PREOP^101^1^1^^^S|3|||37^DISNEY^WALT^^^^^^1|||01||||1|||37^DISNEY^WALT^^^^^^1|2|40007716^^^1^AN^1|4|||||||||||||||||||1||G|||20230815082500||||||' . '\r';

        // Replace newlines with carriage returns to conform to HL7 standards
        // return str_replace("\n", "\r", $message);
        return $message;
    }

    public static function getORU_R01(): string
    {
        return "MSH|^~\&|GHH LAB|ELAB-3|GHH OE|BLDG4|200202150930||ORU^R01|CNTRL-3456|P|2.4
PID|||555-44-4444||EVERYWOMAN^EVE^E^^^^L|JONES|19620320|F|||153 FERNWOOD DR.^^STATESVILLE^OH^35292||(206)3345232|(206)752-121||||AC555444444||67-A4335^OH^20030520
OBR|1|845439^GHH OE|1045813^GHH LAB|15545^GLUCOSE|||200202150730|||||||||555-55-5555^PRIMARY^PATRICIA P^^^^MD^^|||||||||F||||||444-44-4444^HIPPOCRATES^HOWARD H^^^^MD
OBX|1|SN|1554-5^GLUCOSE^POST 12H CFST:MCNC:PT:SER/PLAS:QN||^182|mg/dl|70_105|H|||F";
    }

    public static function getMDM_T02(): string
    {
        return "MSH|^~\&|SENDING_APPLICATION|SENDING_FACILITY|RECEIVING_APPLICATION|RECEIVING_FACILITY|20230815083000||MDM^T02|MSG00001|P|2.5.1
EVN|T02|20230815083000
PID|1||10006579^^^1^MRN^1||DUCK^DONALD^D||19241010|M||1|111 DUCK ST^^FOWL^CA^999990000^^M|1|8005551212|8005551212|1|2||40007716^^^1^AN^1||610074^^^1^DD^1|Y|1|||||||||||N
TXA|1|CN||20230815083000|20230815083000|20230815083000|FINAL|AUTH||DOC|10006579^^^1^MRN^1|AUTH||1|20230815083000
OBX|1|TX|DOCUMENT^Document||This is a sample document text.||||||F";
    }
}
