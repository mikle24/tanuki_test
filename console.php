<?php
require_once('bootstrap.php');

use Tanuki\controllers\ActionController;

$application = new ActionController();

$application->run();