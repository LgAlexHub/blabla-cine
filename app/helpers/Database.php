<?php 
    namespace App\helpers;

    class Database{
        private \PDO $pdo;
        public function __construct($nom_hote, $db ,$user, $pass='')
        {
            try {
                $this->pdo = new \PDO("mysql:host=$nom_hote;dbname=$db", $user, $pass);
            } catch (\Throwable $th) {
                die($th->getMessage());
            }
        }

        public function insertNew(String $table, Array $columns, Array $values){
            $placeHolders = [];
            $executeArray = [];
            foreach($columns as $columnKey => $columnVal){
                $placeHolders[] = ":".$columnVal;
                $executeArray[$columnVal] = $values[$columnKey];
            }
            $query = $this->pdo->prepare("INSERT INTO $table (".implode(", ",$columns).") VALUES (".implode(', ', $placeHolders).");");
            return $query->execute($executeArray);
        }

        public function deleteWhereId(int $id, String $table, String $columnId){
            $query = $this->pdo->prepare("DELETE FROM $table WHERE $columnId = :id;");
            return $query->execute([
                'id' => $id,
            ]);
        }

        public function select(String $table, Array $columnsToSelect, String $whereQuery='', String $orderBy = '', String $groupBy = ''){
            $columns = count($columnsToSelect) == 1 && $columnsToSelect[0] == '*' ? '*' : implode(", ",$columnsToSelect);
            $where = $whereQuery != '' ? ('WHERE '.$whereQuery) : '';
            $order = $orderBy != '' ? 'ORDER BY '.$orderBy : '';
            $group = $groupBy != '' ? 'GROUP BY '.$groupBy : '';
            $query = $this->pdo->query("SELECT $columns FROM $where $table $order $group");
            return $query->fetchAll(\PDO::FETCH_ASSOC);

        }
    }
