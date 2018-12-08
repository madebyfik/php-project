<?php

ini_set('display_errors', 0);

abstract class Controller {

    public function layout($rep, $page) {
        global $layout;

        require($rep . $layout['head']);

        require($rep . $page);

        require($rep . $layout['footer']);
    }

}