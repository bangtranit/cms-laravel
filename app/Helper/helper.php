<?php

function generatePathImage($imageName){
    $strPath = asset('storage/'.$imageName);
    return $strPath;
}