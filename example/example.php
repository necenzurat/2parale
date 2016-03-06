<?php
use DouaParale\Parale\Parale;

include "/../vendor/autoload.php";

echo "<pre>";

/* Instantiate the object */
$parale = new Parale("uername", "password");

/* The latest commissions */
$commissions = $parale->call('commissions/listforaffiliate');
/* do some stuff with $commissions; */

/* Campaigns */
$campaigns = $parale->call(
	'campaigns/listforaffiliate',
	array("page" => "1")
);

/* do some stuff with $campaigns; */
