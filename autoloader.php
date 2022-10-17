<?php
foreach(array_diff(scandir(__DIR__.'/class/'), array(".", "..")) as $key){
    include __DIR__.'/class/'.$key;
}
?>