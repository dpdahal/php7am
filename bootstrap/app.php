<?php
/**
 * require autoload file
 */
require_once "../vendor/autoload.php";

use Application\system\App;

try {

    (new App())->run();

} catch (PDOException $exception) {
    die($exception->getMessage());
}
