<?php
/**
 * This program is free software. It comes without any warranty, to
 * the extent permitted by applicable law. You can redistribute it
 * and/or modify it under the terms of the Do What The Fuck You Want
 * To Public License, Version 2, as published by Sam Hocevar. See
 * http://www.wtfpl.net/ for more details.
 *
 * APNS notification send example
 * @author alxmsl
 * @date 5/2/13
 */

// Include autoloader
include '../source/Autoloader.php';

use alxmsl\APNS\Notification\AlertItem;
use alxmsl\APNS\Notification\BasePayload;
use alxmsl\APNS\Notification\Client;

// Create APNS notification client
$Client = new Client();

// Set secure certificate filename
$Client->setCertificateFile('topface.prod.pem');

$Item = new AlertItem();
$Item->setBody('жопа')
    ->setActionLocalizedKey(null);

$Payload = new BasePayload();
$Payload->setAlertItem($Item)
    ->setBadgeNumber(1)
    ->setIdentifier(time());

var_dump((string) $Payload);
$result = $Client->send('15765cae63cba1ed5b94d0b8d1a1e6a0abb9e2c1076e3c6c8de1e4d5c10ed7d6', $Payload);
//$result = $Client->send('15765cae63cba1ed5b94d0b8d1a1e6a0abb9e2c1076e3c6c8de1e4d5c10ed7d7', $Payload);
var_dump($result);