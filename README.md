2parale SuperSimple API
=======
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/necenzurat/2parale/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/necenzurat/2parale/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/e182fbe2-b12f-4529-9d3c-df97595d9ca5/mini.png)](https://insight.sensiolabs.com/projects/e182fbe2-b12f-4529-9d3c-df97595d9ca5)
[![Latest Stable Version](https://poser.pugx.org/necenzurat/2parale/v/stable.svg)](https://packagist.org/packages/necenzurat/2parale) [![Total Downloads](https://poser.pugx.org/necenzurat/2parale/downloads.svg)](https://packagist.org/packages/necenzurat/2parale) 

[![License](https://poser.pugx.org/necenzurat/2parale/license.svg)](https://packagist.org/packages/necenzurat/2parale)

Super-simple, minimum abstraction 2Parale API v. 0.1.0 wrapper.

#### How to use it:

First you need to have a [2Parale account](http://event.2parale.ro/events/click?ad_type=quicklink&aff_code=0795f0f4f&unique=2b4e169e6&redirect_to=https://www.2parale.ro/)

````php
<?php
use DouaParale\Parale\Parale;

/* New Object */

$parale = new Parale("2parale_user","2parale_password");
$commissions = $parale->call('commissions/listforaffiliate');
var_dump($commissions)

/* With arguments */

$campaings = $parale->call(
	'campaigns/listforaffiliate',
	array("page" => "1") // just pass in an array
	);
var_dump($campaings);
````

#### API Methods:

For all the API methods, you can check the TPerformat shitload here: https://github.com/2Parale/2Performant-php/blob/master/TPerformant.php

#### License

````
            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
                    Version 2, December 2004

 Copyright (C) 2015 Costin Moise <necenzurat+wtfpl@gmail.com>

 Everyone is permitted to copy and distribute verbatim or modified
 copies of this license document, and changing it is allowed as long
 as the name is changed.

            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
   TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION

  0. You just DO WHAT THE FUCK YOU WANT TO.
````
