<?php
class myDb extends mysqli {
	public static $queries;
	public static $totalQueryTime;
	
	public function query ( $query ) {
		// Start query timer
		$startTime = microtime();
		
		$result = parent::query ( $query );
		
		// End query timer
		$endTime = microtime();

		$execTime = $endTime - $startTime;

		// Increment the total query time
		self::$totalQueryTime += $execTime;

		if ( $result ) {
			// Notice that for each query we record the query string itself and the time it took to execute
			self::$queries[] = array ( $query, $execTime );
		}
		else {
			FB::error ( $query, 'Error in Query: ' . mysqli_error ( $this ) );
			FB::trace ( 'Stack Trace' );
		}

		return $result;
	}
}