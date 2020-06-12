<?php
//ini_set('display_errors','1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);

require_once('./pdo.php');
require_once ('./contr.php');

$copyresultarray = $resultLead;
$dat = null;
/** @var TabLead $item */
foreach ($resultLead as $keyfirst => $item){
    if($item->getDate() === $dat){
        continue;
    }
    $dat = $item->getDate();
    echo sprintf("| %s |", $item->getDayDate());

    foreach ($copyresultarray as $key => $i) {
        if(($i->getDate() === $dat) && ($count < 3)){
            $count++;
            echo sprintf(" %s (%s hours)", $i->getUserName(), round($i->getHours(), 2));
            unset($copyresultarray[$key]);
        } else {
            $count = 0;
            echo PHP_EOL;
            continue 2;
        }
    }
}

