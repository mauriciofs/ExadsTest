<?php
/**
 * Demonstrate with PHP how you would connect to a MySQL (InnoDB)database and
 * query for all records with the following fields: (name, age, job_title) from a table called 'exads_test':
 */
declare(strict_types=1);
namespace App;

class ExadsTest
{
    private $connection;

    //Receive the connection as DI to be testable with Stubs
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Return all rows from exads_test table
     *
     * @return array
     * @throws \PDOException
     */
    public function findAll() : array
    {
        try {
            $rows = $this->connection->query('SELECT name, age, job_title from exads_test', \PDO::FETCH_ASSOC);
            return $rows ?? array();
        } catch (\PDOException $e) {
            //Can throw especific exceptions for the app
        }
    }

    /**
     * Also provide an example of how you would write a sanitised record to the same table.
     *
     * @return bool
     * @throws \PDOException || \InvalidArgumentException
     */
    public function insert(array $params) : bool
    {
        if (!isset($params['name']) || !isset($params['age']) || !isset($params['job_title'])) {
            throw new \InvalidArgumentException('Invalid parameters');
        }

        extract($params, \EXTR_PREFIX_SAME);
        $stmt = $this->connection->prepare('INSERT INTO exads_test (name, age, job_title) VALUES (?,?,?)');
        return $stmt->execute(array($name, $age, $job_title));
    }
}

//USAGE
$hostname = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

$conn = new \PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$handler = new ExadsTest($conn);

foreach ($handler->findAll() as $row) {
    echo "{$row["name"]} - {$row["age"]} - {$row["job_title"]}" . PHP_EOL;
}


//INSERTING VALUES
try {
    $handler->insert(array(
        "name" => "Mauricio",
        "age" => "29",
        "job_title" => "Full Stack Developer"
    ));
} catch (\InvalidArgumentException $e) {
    //Do something about argument error
} catch (\PDOException $e) {
    //Do something about unexpected error
}
