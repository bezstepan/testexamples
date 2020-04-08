<?php

namespace Helper;

class generateThng extends \Codeception\Module
{
    public function generateThng($lenght){
        return substr(str_shuffle("xABCDEFGHIJKLMNOPQRSTUVWYZ0123456789"), 0, $lenght);
    }
}