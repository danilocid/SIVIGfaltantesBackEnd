<?php 
class DB
{
	private $host;
	private $db;
	private $user;
	private $password;

	public function __construct()
	{
		$this->host = 'localhost';
		$this->db = 'sivig-faltantes';
		$this->user = 'root';
		$this->password = '';
	}

	public function connect()
	{
		try {
			$connection = "mysql:host=" . $this->host . ";dbname=" . $this->db;
			$options = [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES => false,
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
			];
			$pdo = new PDO($connection, $this->user, $this->password, $options);

			return $pdo;
		} catch (PDOException $e) {
			print_r('Error conenection: ' . $e->getMessage());
		}
	}
	public function sendOutput($data, $httpHeaders=array())
    {
        header_remove('Set-Cookie');
 
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
 
        echo $data;
        exit;
    }

}
 ?>