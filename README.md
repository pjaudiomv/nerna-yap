# nerna-yap

This was created as a demo for the New England Region of NA to operate closely to their current phoneline.

This is a mod of [YAP](https://github.com/radius314/yap/) [2.5.0](https://github.com/radius314/yap/archive/2.5.0.zip)

The changes from base code are :

index.php plays title mp3 and points to a custom menu structure. - **ne-input-method.php**

* Option one points to Meeting Lookup - **input-method.php?Digits=2**
* Option two plays a helpline title mp3 and points to - **ne-helpline.php**
    * Option one points to a non-urgent helpline service body - **helpline-search.php?override_service_body_id=18**
    * Option two points to the normal helpline search - **input-method.php?Digits=1**
    * If any digit besides one or two is selected it redirects to **ne-input-method.php?Digits=2**
* Option three points to Regional Meeting Directory service body and plays voicemail mp3 for ordering RMDs - **helpline-search.php?override_service_body_id=16**
* Option four Plays a PR title mp3 then points to PR service body and plays voicemail mp3. - **helpline-search.php?override_service_body_id=17**
    * PR can add helpline volunteers if wanted otherwise gos direct to voicemail.
* Option five is for friends and family of addicts, plays a title mp3 and points to - **ne-concerned.php**
    * Option two plays a emergency mp3.
    * Option three plays a non emergency mp3.
    * If any digit besides one or two is selected it redirects to - **index.php**
    * When mp3s are done playing it also gets redirected to - **index.php**
* Option six plays a NA general info mp3 then points to - **na-info.php**
    * Option one plays a mp3 with basic NA info.
    * Option two plays a mp3 with advanced NA info.
    * If any digit besides one or two is selected it redirects to - **index.php**
    * When mp3s are done playing it also gets redirected to - **index.php**
