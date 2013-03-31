<?php
$requestStart = microtime();

include_once ('includes/FirePHPCore/fb.php');
ini_set('display_errors', true);
ob_start('ob_gzhandler');

FB::info('Hello, FirePHP');

$array['key1'] = 'some content';
$array['anotherKey'][] = 1234;
$array['anotherKey'][] = 5678;
$array['anotherKey'][] = 9012;
$array[] = null;

FB::info($array, 'My Array Test');

//echo $array;


class Person {
	public $name;
	protected $dob;
	private $age;
	
	public function __construct ( $name, $dob, $age ) {
		$this->name = $name;
		$this->dob = $dob;
		$this->age = $age;
	}
}

class Staff extends Person {
	public $salary;
	
	public function pay ( $fee ) {
		$this->salary = $fee;
	}
}

$obj = new Staff('Simon','24/12/1985', '23');

FB::info($obj, 'My Object Test');

$obj->pay('100000000000000'); // ;P

FB::info($obj, 'My Object Test');

//echo $obj;

?>

<h1>nettuts+ FirePHP Tutorial</h1>
<p>by <a href="http://twitter.com/simonhamp">Simon Hamp</a></p>
<p>Make sure Firebug with FirePHP is installed and running.</p>

<input type="button" value="Click Me!" id="button" />
<div id="ajaxContainer"></div>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>

<script type="text/javascript">
	google.load("jquery", "1.3");
</script>

<script type="text/javascript">		
	$(document).ready(function(){
		$('#button').click(function(){
			$('#ajaxContainer').load('ajax.php?str=I+love+jQuery');
		});
	});
</script>

<?php

$requestEnd = microtime();

// Calculate the time taken
$executionTime = $requestEnd - $requestStart;

FB::info($executionTime, 'This request took (seconds)');
ob_end_flush();
?>
