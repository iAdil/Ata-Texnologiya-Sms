<?php
/**
 * Created by Adil Aliyev.
 * Date: 05.09.2017
 * Time: 15:02
 */

namespace AtaTexnologiya;


class Sms
{
    // sms service title
    public $title;
    // sms service login
    public $login;
    // sms service password
    public $password;
    // number to send sms
    public $number;
    // text of sms
    public $text;

    /**
     * Sms constructor.
     * @param bool $title
     * @param bool $login
     * @param bool $password
     */
    public function __construct($title = false, $login = false, $password = false)
    {
        $this->sms_gate = "https://sms.atatexnologiya.az/bulksms/api";
        $this->title = $title;
        $this->login = $login;
        $this->password = $password;
        $this->schedule = "now";
    }

    /**
     * magic function for setting parameters
     * @param $name
     * @param $arguments
     * @return $this
     */
    public function __call($name, $arguments) {
        // get first argument
        $value = $arguments[0];
        // set value
        $this->$name = $value;
        return $this;
    }


    /**
     * sms sending function
     * @return mixed
     */
    function send(){
        $this->xml_data ="<?xml version='1.0' encoding='UTF-8'?>
		<request>
			<head>
				<operation>submit</operation>
				<title>$this->title</title>
				<login>$this->login</login>
				<password>$this->password</password>
				<isbulk>false</isbulk>
				<controlid>".time()."</controlid>
				<scheduled>$this->schedule</scheduled>
			</head>
			<body>
				<msisdn>$this->number</msisdn>
				<message>$this->text</message>
			</body>
		</request>";

        $ch = curl_init($this->sms_gate);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->xml_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);

        curl_close($ch);
        $this->result = $output;

        return $this;
    }
}