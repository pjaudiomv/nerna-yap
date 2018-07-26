<?php
include 'config.php';
include 'functions.php';
$searchType = $_REQUEST['Digits'];
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
   
   <?php if ($searchType == "1") { ?>
         <Response>
            <Redirect method="GET">helpline-search.php?override_service_body_id=18</Redirect>
         </Response>
      <?php  exit();
    } else if ($searchType == "2") { ?>
        <Response>
         <Redirect method="GET">input-method.php?Digits=1</Redirect>
        </Response>
       <?php exit();
    }
    else { ?>
        <Response><Redirect method="GET">ne-input-method.php?Digits=2</Redirect></Response>
   <?php } ?>
