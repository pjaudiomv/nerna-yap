# nerna-yap

This was created as a demo for the New England Region of NA to operate closely to their current phoneline.

This is a mod of YAP 2.0.1 [YAP](https://github.com/radius314/yap/)

The changes from base code are :

index.php points to a custom menu structure. - **ne-input-method.php**

* Option one points to Meeting Lookup - **input-method.php?Digits=2**
* Option two plays a custom helpline title mp3 and points to - **ne-helpline.php**
    * Option one points to a non-urgent helpline which is a custom service body - **helpline-search.php?override_service_body_id=18**
    * Option two points to the normal helpline search - **input-method.php?Digits=1**
    * if any digit besides one or two is selected it redirects to **ne-input-method.php?Digits=2**
* Option three points to Regional Meeting Directory SB and plays custom voicemail for ordering RMDs - **helpline-search.php?override_service_body_id=16**
* Option four Plays a custom PR title mp3 then points to PR SB and plays custom voicemail. - **helpline-search.php?override_service_body_id=17**
    * PR can add helpline volunteers if wanted otherwise gos direct to voicemail.
* Option five is for friends and family of addicts, plays a custom title mp3 and points to - **ne-concerned.php**
    * Option two plays a custom emergency mp3
    * Option three plays a custom non emergency mp3
    * if any digit besides one or two is selected it redirects to - **index.php**
    * when custom mp3s are done playing it also gets redirected to - **index.php**
* Option six plays a NA general info mp3 then points to - **na-info.php**
    * Option one plays a custom mp3 with basic NA info
    * Option two plays a custom mp3 with advanced NA info
    * if any digit besides one or two is selected it redirects to - **index.php**
    * when custom mp3s are done playing it also gets redirected to - **index.php**

voicemail-complete.php - Added ability to send emails to service body using PHPMailer.
