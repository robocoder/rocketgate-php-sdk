<?php

////////////////////////////////////////////////////////////////////////////////
//
//	GatewayChecksum() - Static class for checksum and version.
//
////////////////////////////////////////////////////////////////////////////////
//
namespace RocketGate\Sdk;

class GatewayChecksum
{
    public static $checksum = "";
    public static $baseChecksum = "df47df699e9689127d1e4c72185421a4";
    public static $versionNo = "P7.25";

//////////////////////////////////////////////////////////////////////
//
//	Set the client version number.
//
//////////////////////////////////////////////////////////////////////
//
    static function SetVersion()
    {
        $dirName = dirname(__FILE__);
        $baseString = md5_file($dirName . "/GatewayService.php") .
            md5_file($dirName . "/GatewayRequest.php") .
            md5_file($dirName . "/GatewayResponse.php") .
            md5_file($dirName . "/GatewayParameterList.php") .
            md5_file($dirName . "/GatewayCodes.php");
        GatewayChecksum::$checksum = md5($baseString);
        if (GatewayChecksum::$checksum != GatewayChecksum::$baseChecksum) {
            GatewayChecksum::$versionNo = "P7.25m";
        }
    }
}
