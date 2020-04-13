<?php

namespace Helper;

class generateArtifacts extends \Codeception\Module
{
    public function generateThng($lenght){
        return substr(str_shuffle("xABCDEFGHIJKLMNOPQRSTUVWYZ0123456789"), 0, $lenght);
    }

    public function generateProduct($lenght) {
        return substr(str_shuffle("0123456789"), 0, $lenght);
    }
}