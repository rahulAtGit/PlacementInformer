<?php
/**
 * Created by PhpStorm.
 * User: ramu
 * Date: 22/10/14
 * Time: 5:02 PM
 */
function obtainfiles($cname)
{
    $dir = "uploads/";

    $files1 = scandir($dir,0);
    $pattern = '/^' . $cname . '/';
    $r1 = preg_grep($pattern, $files1);
    if(empty($r1))
        echo 'No Attachments Available';
    foreach ($r1 as $key => $value) {
        $name = end(explode('_',$value));
        echo '<a href="http://localhost/placement informer/IN/uploads/' . $value . '">' . $name . '</a>';
        echo '<br>';
    }
}
?>