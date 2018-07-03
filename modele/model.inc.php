<?php
/* 
 * 
 */




function deserialise($serialisedO){

    $encodedO = stripslashes(urldecode($serialisedO));
    //var_dump($encodeObd);

    $o = unserialize($encodedO);
    
    return $o;
}