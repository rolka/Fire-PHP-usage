<?php 
ob_start();
include_once 'includes/FirePHPCore/fb.php';
FB::setEnabled(true); // enables and disables FirePHP


// Display error messages directly in console.
$f = new FirePHP();
$f->registerExceptionHandler();
$f->registerErrorHandler();

//echo $helloworld;

 ?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>untitled</title>
</head>
<body>
<?php
$myVar = 'some value';

FB::group('My Group');
	FB::log('Hello, world');
	FB::log($myVar);
	FB::log($myVar, 'MyVar');
FB::groupEnd();

FB::group('Another Group');

FB::info('This is really important!');
FB::warn('Be careful about this!');
FB::error('ERROR!');

FB::groupEnd();

$someArray = array(
	array('The Letter', 'The Symbol'),
	array('first letter', 'a'),
	array('second letter', 'b')
);

FB::table('Letters', $someArray);

$anotherArray = array(1,2,3,4,5,6);

FB::log($anotherArray);


class MyClass {
	function doSomething() {
		return 'Hello, world';
	}
}

$myclass = new MyClass();

FB::info($myclass);


?>
</body>
</html>	
<?php ob_end_flush(); ?>