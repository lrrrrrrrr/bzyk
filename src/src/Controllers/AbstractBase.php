<?php

namespace Application\Controllers;

abstract class AbstractBase
{

    public function redirect($location) {
        header('Location: ' . $location);
        die();
    }

    public function response($stringResponse) {
        echo $stringResponse;
    }
}
