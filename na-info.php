<?php
include 'config.php';
include 'functions.php';
    $searchType = $_REQUEST['Digits'];
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
   
   <?php if ($searchType == "1") { ?>
         <Response>
           <Play>https://www.nerna.org/helpline/recordings/meetinginfo_basic.mp3</Play>
           <Redirect method="GET">index.php</Redirect>
         </Response>
      <?php  exit();
    } else if ($searchType == "2") { ?>
        <Response>
         <Play>https://www.nerna.org/helpline/recordings/meetinginfo_advanced.mp3</Play>
         <Redirect method="GET">index.php</Redirect>
        </Response>
       <?php exit();
    }
    else { ?>
        <Response><Redirect method="GET">index.php</Redirect></Response>
   <?php } ?>
