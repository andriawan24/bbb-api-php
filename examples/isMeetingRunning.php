<?php

require_once('../includes/bbb-api.php');

$bbb = new BigBlueButton();

$meetingId = '1234';

$itsAllGood = true;
try {
	$result = $bbb->isMeetingRunningWithXmlResponseArray($meetingId);
} catch (Exception $e) {
	echo 'Caught exception: ', $e->getMessage(), "\n";
	$itsAllGood = false;
}

if ($itsAllGood == true) {
	print_r($result);
}
