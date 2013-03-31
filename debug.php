<?php
if ( is_array ( myDb::$queries ) ) {
	// Create the header and footer rows
	$header[] = array ( 'SQL Query', 'Execution Time (s)' );
	$footer[] = array ( 'Total Execution Time:', myDb::$totalQueryTime );
	
	$table = array_merge($header, myDb::$queries, $footer);
}

FB::table ( count ( myDb::$queries ) . ' SQL queries executed', $table );