<?php
include 'config.php';
include 'functions.php';
$searchType = $_REQUEST['Digits'];
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
   
   <?php if ($searchType == "1") {   // Meeting Lookup ?>
         <Response>
           <Redirect method="GET">input-method.php?Digits=2</Redirect>
         </Response>
      <?php  exit();
    } 
    
    else if ($searchType == "2") {   // Helpline ?>
        <Response>
         <Gather language="<?php echo setting('gather_language') ?>"
                        hints="<?php echo setting('gather_hints')?>"
                        input="dtmf"
                        timeout="15"
                        numDigits="1"
                        action="ne-helpline.php">
            <Play>https://www.nerna.org/helpline/recordings/helpline_title.mp3</Play>
         </Gather>
        </Response>
       <?php exit();
    } 
    
    else if ($searchType == "3") {   // RMD Order ?>
        <Response>
         <Redirect method="GET">helpline-search.php?override_service_body_id=16</Redirect>
        </Response>
       <?php exit();
    } 
  
    else if ($searchType == "4") {   // PR Info ?>
        <Response>
         <Gather language="<?php echo setting('gather_language') ?>"
                        hints="<?php echo setting('gather_hints')?>"
                        input="dtmf"
                        timeout="15"
                        numDigits="1"
                        action="helpline-search.php?override_service_body_id=17">
            <Play>https://www.nerna.org/helpline/recordings/pr_title.mp3</Play>
         </Gather>
        </Response>
       <?php exit();
    } 

    else if ($searchType == "5") {   // Concerned loved ones friends of addict ?>
        <Response>
           <Gather language="<?php echo setting('gather_language') ?>"
                        hints="<?php echo setting('gather_hints')?>"
                        input="dtmf"
                        timeout="15"
                        numDigits="1"
                        action="ne-concerned.php">
            <Play>https://www.nerna.org/helpline/recordings/concerned_title.mp3</Play>
           </Gather>
        </Response>
       <?php exit();
    } 

    else if ($searchType == "6") {   // General NA Info ?>
        <Response>
           <Gather language="<?php echo setting('gather_language') ?>"
                        hints="<?php echo setting('gather_hints')?>"
                        input="dtmf"
                        timeout="15"
                        numDigits="1"
                        action="na-info.php">
            <Play>https://www.nerna.org/helpline/recordings/meetinginfo_title.mp3</Play>
           </Gather>
        </Response>
       <?php exit();
    }
   
    else { ?>
        <Response><Redirect method="GET">index.php</Redirect></Response>
   <?php } ?>
