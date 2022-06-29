<?php
$var1 = mt_rand(1, 99);
$var2 = rand(2, 5);

$answer =$var1 + $var2;
echo '<div class="col-lg-12 col-md-12">
<div class="form-group">
<label><span class="text-info"> What is </span> <b class="text-danger"> '.$var1 .' + '. $var2 .' ?</b> :  </label><input type="hidden" name="captcha_correct_answer" id="captcha_correct_answer" value="'.$answer.'"/>';
echo '<input type="number"  class="form-control" name="user_captcha_anwser" id="user_captcha_anwser" placeholder="Write Your Answer?"/></div></div>';

?>