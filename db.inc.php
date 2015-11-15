<?php
     abstract class Database_Object
     {
         protected static $DB_Name;
         protected static $DB_Open;
         protected static $DB_Conn;

         protected function __construct($database, $hostname, $hostport, $username, $password)
         {
             self::$DB_Name = $database;
             
             self::$DB_Conn = pg_connect("host=$hostname dbname= $database port=$hostport user=$username password=$password");
             if (!self::$DB_Conn) { die('Error: Database Error<br />' . pg_last_error()); }         
         }

         private function __clone() {}

         public function __destruct()
         {
//            mysql_close(self::$DB_Conn);  <-- commented out due to current shared-link close 'feature'.  If left in, causes a warning that this is not a valid link resource.
         }
     }

     final class DB extends Database_Object
     {
         public static function Open($database = 'dc560cukqibtnn', $hostname = 'ec2-54-197-230-210.compute-1.amazonaws.com', $hostport = '5432', $username = 'twqsyhnwtbyqik', $password = ' hSPbLyuwJ7O93u7r4TZVaV2zpB')
         {
             if (!self::$DB_Open)
             {
                 self::$DB_Open = new self($database, $hostname, $hostport, $username, $password);
             }
             else
             {
                 self::$DB_Open = null;
                 self::$DB_Open = new self($database, $hostname, $hostport, $username, $password);
             }
             return self::$DB_Open;
         }

         public function qry($sql, $return_format = 0)
         {
             $query = pg_query(self::$DB_Conn, $sql) OR die(pg_last_error());
             switch ($return_format)
             {
                 case 1:
                     $query = pg_fetch_row($query);
                     return $query;
                     break;
                 case 2:
                     $query = pg_fetch_array($query);
                     return $query;
                     break;
                 case 3:
                     $query = pg_fetch_row($query);
                     return $query[0];
                     break;
                 default:
                     return $query;
             }
         }
     } 
?>