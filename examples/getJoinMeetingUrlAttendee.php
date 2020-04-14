<?php

require_once('../includes/bbb-api.php');


$bbb = new BigBlueButton();

$joinParams = array(
	'meetingId' => '1234', 			// REQUIRED - We have to know which meeting to join.
	'username' => 'Test Attendee',	// REQUIRED - The user display name that will show in the BBB meeting.
	'password' => 'ap',				// REQUIRED - Must match either attendee or moderator pass for meeting.
	'createTime' => '',				// OPTIONAL - string waktu
	'userId' => '',					// OPTIONAL - string user id
);

$itsAllGood = true;
try {
	$result = $bbb->getJoinMeetingURL($joinParams);
} catch (Exception $e) {
	echo 'Caught exception: ', $e->getMessage(), "\n";
	$itsAllGood = false;
}

if ($itsAllGood == true) {
	print_r($result);
}
