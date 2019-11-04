<?php
namespace Framework\Database;


use PDO;

/**
 * Class QueryBuilder
 * @package Project\Database
 */
class QueryBuilder
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * QueryBuilder constructor.
     * @param PDO $pdo
     */
     public function __construct(PDO $pdo)
     {
         $this->pdo = $pdo;
     }


    /**
     * @param $table
     * @param bool $intoClass
     * @return array
     */
     public function selectAll($table, $intoClass = false)
     {
         $statement = $this->pdo->prepare("SELECT * FROM {$table}");
         $statement->execute();
         if($intoClass)
         {
             return $statement->fetchAll(PDO::FETCH_CLASS, $intoClass);
         }
         return $statement->fetchAll(PDO::FETCH_CLASS);
     }

     /**
      * @param $table
      * @param array $parameters
     */
     public function insert($table, array $parameters)
     {
         $sql = sprintf(
             'INSERT INTO %s (%s) VALUES (%s)',
             $table,
             implode(', ', array_keys($parameters)),
             ':'. implode(', :', array_keys($parameters))
         );

        try {

            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);

        } catch (\Exception $e) {

            die('Whoops, something went wrong.');
        }
     }
}

/*

array_map(function ($param) {
             return ":{$param}";
}, array_keys($parameters));

public function insert( string $table, array $parameters )
{
        $columnNames = join( ', ', array_keys( $parameters ) );
        $placeholder = ':' . join( ', :', array_keys( $parameters ) );

        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table, $columnNames, $placeholder
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (Exception $e) {
            die( $e->getMessage() );
        }
        header("Location: /");
    }
 */