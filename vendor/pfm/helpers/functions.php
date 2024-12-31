<?php

function debug($data, $die = false) {
    
    echo "<pre>" . print_r($data, true) . "</pre>";
    $die ? die : null;
}