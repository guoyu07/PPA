<?php
use \Sidney\Latchet\BaseConnection;

class Connection extends BaseConnection {

	public function open($connection)
	{
		$connection->PPA = new \StdClass;
    	$connection->PPA->name  = $connection->WAMP->sessionId;
		echo "New connection established. User: \n";
		echo $connection->PPA->name;
	}

	public function close($connection)
	{
		echo "Connection closed. User: \n";
	}

	public function error($connection, $exception)
	{
		//close the connection
		$connection->close();
		echo $exception->getMessage() + "\n";
	}
}
