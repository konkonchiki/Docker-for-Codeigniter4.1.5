<?php
use mytest\Dice;
require_once 'ifclass.php';

$dice = new Dice();
$dice->setSided();
echo implode(',', $dice->getSided());