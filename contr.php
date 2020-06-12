<?php

require_once ('./TabLead.php');
require_once('./pdo.php');

$sth2 = $pdo->prepare("SELECT employees.name , DAYNAME(`date`) as dayname, `date` , SUM(hours ) as sumhours FROM 
time_reports inner join employees ON time_reports.employee_id = employees.id GROUP BY `date` , employees.id 
ORDER BY `date` DESC, SUM(hours ) DESC ");
$sth2->execute();
$resultLead = $sth2->fetchAll(PDO::FETCH_CLASS, 'TabLead');
