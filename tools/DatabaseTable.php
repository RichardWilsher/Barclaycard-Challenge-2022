<?php
namespace tools;
    // Generic Class to manage interactions with the specified database
    class DatabaseTable {

        private $table;
        private $pdo;
        private $primaryKey;
        private $entityClass;
        private $entityConstructor;

        // Constructor for the class to set the PDO object, table name and primary key
        public function __construct($pdo, $table, $primaryKey, $entityClass = 'stdclass', $entityConstructor = []){
            $this->pdo = $pdo;
            $this->table = $table;
            $this->primaryKey = $primaryKey;
            $this->entityClass = $entityClass;
            $this->entityConstructor = $entityConstructor;
        }

        // Function to find records based on specific criteria from the assigned database
        public function find($field, $value) {
            $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value' .';');
            $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
            $criteria = [
                'value' => $value
            ];

            $stmt->execute($criteria);

            return $stmt->fetchAll();
        }

        // Function to return all records from the set Table of the set database
        function findAll(){
            //$sql = 'SELECT * FROM ' . $this->table;

            $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);
            $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
            $stmt->execute();
    
            return $stmt->fetchAll();        
        }

        // Function to insert a record into the set table of the set database
        function insert($record){
	        $keys = array_keys($record);

	        $values = implode(', ', $keys);
	        $valuesWithColon = implode(', :', $keys);

	        $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';

	        $stmt = $this->pdo->prepare($query);

	        $stmt->execute($record);
        }

        // Function to delete a specified record from the set table of the set database
        public function delete($value) {
            $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->primaryKey . ' = :value');
            $criteria = [
                'value' => $value
            ];
            $stmt->execute($criteria);
        }

        // Function to update a specified record in the settable of the set database
        public function update($record) {
            $query = 'UPDATE ' . $this->table . ' SET ';

            $parameters = [];
            foreach ($record as $key => $value) {
                   $parameters[] = $key . ' = :' .$key;
            }

            $query .= implode(', ', $parameters);
            $query .= ' WHERE ' . $this->primaryKey . ' = :primaryKey';

            $record['primaryKey'] = $record[$this->primaryKey];

            $stmt = $this->pdo->prepare($query);

            $stmt->execute($record);
        }

        function save($record){
        // Function to try INSERTing a new record into the set table of the set database, if an error is raised 
        // (eg the record already exists) an update is performed instead
            try {
                $this->insert($record);
            }
            catch (\Exception $e) {
                $this->update($record);
            }
        }

        function login($username, $password, $field){
            // function to take the user provided username and password and verify them against the database stored 
            // values, including salted passsword
            $authCheck = $this->find($field,$username);
            if($authCheck != NULL){
                if (password_verify($password, $authCheck[0]->password)) {
                    return 1;
                } else {
                    return 0;
                }
            }
        }

        public function filteredFind($field1, $value1, $field2, $value2) {
            // Function to allow for 2 conditions to be applied to the database
            // Fix for when the showroom is filtered by manufacturer, archived cars are displayed
            $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field1 . ' = :value1' . ' AND ' . $field2 . ' = :value2;');
            $stmt->setFetchMode(\PDO::FETCH_CLASS, $this->entityClass, $this->entityConstructor);
            $criteria = [
                'value1' => $value1,
                'value2' => $value2
            ];

            $stmt->execute($criteria);

            return $stmt->fetchAll();
        }
    }
?>