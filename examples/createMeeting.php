<?php

// Require the bbb-api file:
require_once('../includes/bbb-api.php');


// Instatiate the BBB class:
$bbb = new BigBlueButton();

/* ___________ CREATE MEETING w/ OPTIONS ______ */
/* 
*/
$creationParams = array(
	'meetingId' => '1234', 					// REQUIRED
	'meetingName' => 'Test Meeting Name', 	// REQUIRED
	'attendeePw' => 'androman23',
	'moderatorPw' => 'fawaznaufal23',
	'welcomeMsg' => '',
	'dialNumber' => '',
	'voiceBridge' => '',
	'webVoice' => '',
	'logoutUrl' => '',
	'maxParticipants' => '-1', 				// Biar Unlimited, pakenya -1 soalna kalo 0 ga ada yg bisa msk
	'record' => 'false', 					// Tau lah ya
	'duration' => '0', 						// Unlimited isi 0
	//'meta_category' => '', 				// Use to pass additional info to BBB server. See API docs.
);

// Create the meeting and get back a response:
$itsAllGood = true;
try {
	$result = $bbb->createMeetingWithXmlResponseArray($creationParams);
} catch (Exception $e) {
	echo 'Caught exception: ', $e->getMessage(), "\n";
	$itsAllGood = false;
}

if ($itsAllGood == true) {
	// If it's all good, then we've interfaced with our BBB php api OK:
	if ($result == null) {
		// If we get a null response, then we're not getting any XML back from BBB.
		echo "Failed to get any response. Maybe we can't contact the BBB server.";
	} else {
		// We got an XML response, so let's see what it says:
		print_r($result);
		if ($result['returncode'] == 'SUCCESS') {
			// Then do stuff ...
			echo "<p>Meeting succesfullly created.</p>";
		} else {
			// echo "<p>Meeting creation failed.</p>";
		}
	}
}
