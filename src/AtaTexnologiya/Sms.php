<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01.09.2017
 * Time: 19:51
 */

namespace AtaTexnologiya;


class Sms
{
    public function send()
    {
        function sendSMS($number='994773930002', $text = 'test'){
            // $number = $_GET['number'];
            // $text = $_GET['text'];
            //$text = transliterate($text);
            //$text = $text;
            $xml_data ="<?xml version='1.0' encoding='UTF-8'?>
                <request>
                    <head>
                        <operation>submit</operation>
                        <title>insure.az</title>
                        <login></login>
                        <password>!</password>
                        <isbulk>false</isbulk>
                        <controlid>".time()."</controlid>
                        <scheduled>now</scheduled>
                    </head>
                    <body>
                        <msisdn>$number</msisdn>
                        <message>$text</message>
                    </body>
                </request>";


            $URL = "https://sms.atatexnologiya.az/bulksms/api";

            $ch = curl_init($URL);
            #curl_setopt($ch, CURLOPT_MUTE, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);

            curl_close($ch);
            return $output;
        }
    }
}