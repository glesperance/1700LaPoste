<?php

function getVimeoID($url){
        $id = (int) substr(parse_url($url, PHP_URL_PATH), 1);
        return $id;
}


?>