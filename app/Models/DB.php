<?php namespace App\Models;


class DB
{
    protected $pdo;
    protected $table;
    protected $selectables;
    protected $whereClause = [];
    protected $limit;
    protected $stmt;
    protected $rand;
    protected $bind = [];
    protected $fetchType = 'fetchAll';
    protected $fetchMode = \PDO::FETCH_OBJ;

    public function __construct($fetchMode=\PDO::FETCH_OBJ)
    {
        $this->fetchMode = $fetchMode;
        $config = require __DIR__ . '/../config.php';
        try {
            $this->pdo = new \PDO("mysql:host=localhost;dbname={$config['Database']['DBName']};charset=utf8",$config['Database']['Username'] , $config['Database']['Password']);

        } catch (\Exception $e) {
           die('Error : ' . $e->getMessage());
        }
    }

    public function select()
    {
        $this->selectables = func_get_args();
        return $this;
    }

    public function from($table)
    {
        $this->table = $table;
        return $this;
    }

    public function wheres($where)
    {
        $this->whereClause[] = $where;
        return $this;
    }

    public function JoinWithCategory(){
        $this->JoinWithCategory = true;
        return $this;
    }

    public function where($name , $value , $operator = '=')
    {
        $this->wheres("$name $operator :$name");

        if($operator == 'LIKE')
            $this->bind[$name] = '%' . $value . '%';
        else
            $this->bind[$name] = $value;

        return $this;
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset($offset){
        $this->offset = $offset;
        return $this;
    }

    public function rand()
    {
        $this->rand = true;
        return $this;
    }

    public function lasted($colmun="id")
    {
        $this->lasted = $colmun;
        return $this;
    }

    public function result()
    {

        $query[] = "SELECT";

        if(empty($this->selectables))
            $query[] = "*";
        elseif (in_array("count", $this->selectables))
            $query[] = "count(*)";
        else
            $query[] = join(', ' , $this->selectables);


        $query[] = "FROM";
        $query[] = $this->table;

        if(!empty($this->JoinWithCategory)){
            $query[] = "INNER JOIN categories ON categories.id = books.category_id";
        }

        if(! empty($this->whereClause)) {
            $query[] = $this->addWhereToQuery();
        }

        if(! empty($this->lasted)) {
            $query[] = "ORDER BY ";
            $query[] = "`$this->table`.`$this->lasted` DESC";
        }

        if($this->rand) {
            $query[] = "ORDER BY ";
            $query[] = "rand()";
        }

        if(!is_null($this->limit)) {
            $query[] = "LIMIT";
            $query[] = $this->limit;
        }


        if(! empty($this->offset)) {
            $query[] = "OFFSET";
            $query[] = $this->offset;
        }


error_log(print_r($query,true));
        $this->stmt = $this->pdo->prepare(join(' ',$query));
        $this->bindValue();
        $this->stmt->execute();
        return $this;
    }

    public function find($name , $value)
    {
        return $this->select()->where($name ,$value)->first();
    }

    public function first()
    {
        $this->limit(1)->result();
        $this->fetchType = 'fetch';
        return $this->fetch();
    }

    public function get()
    {
        $this->result();
        return $this->fetch();
    }

    public function all()
    {
        return $this->select()->get();
    }

    protected function fetch()
    {
        return  $this->stmt->{($this->fetchType == 'fetchAll') ? 'fetchAll' : 'fetch'}($this->fetchMode);
    }

    public function create($data)
    {
        error_log(print_r($data,true));
        $field = join(', ', array_keys($data));
        $param = ':'. join(', :' , array_keys($data));

        $this->stmt = $this->pdo->prepare("INSERT INTO $this->table ($field) VALUES ($param)");
        error_log(print_r($data,true));
        $this->bind = $data;
        $this->bindValue();
        return $this->stmt->execute();
    }

    public function update($id , $data)
    {
        $object = $this->find('id' , $id);
        if(!$object)
            throw new \Exception("this id not exist in $this->table table");

        $fieldForUpdate = $this->fieldForUpdate($data);
        $this->stmt = $this->pdo->prepare("UPDATE {$this->table} SET {$fieldForUpdate} WHERE id = :id");
        $this->bind = array_merge($data , ['id'=> $id]);
        $this->bindValue();

        return $this->stmt->execute();
    }

    public function delete($id)
    {
        $object = $this->find('id' , $id);
        if(!$object)
            throw new \Exception("this id not exist in $this->table table");

        $this->stmt = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $this->stmt->bindValue(':id' , $id);

        return $this->stmt->execute();
    }

    private function bindValue()
    {
        foreach ($this->bind as $key => $value) {
            $this->stmt->bindValue(":$key" , $value);
        }
    }

    private function addWhereToQuery()
    {
        $query = [];
        $query[] = "WHERE";
        foreach ($this->whereClause as $key => $where) {
            if($key !=0 )
                $query[] = "AND";
            $query[] = $where;
        }

        return join(' ', $query);
    }

    private function fieldForUpdate($data)
    {
        $field = [];
        foreach (array_keys($data) as $name) {
            $field[] = "$name = :$name";
        }
        return join(', ' , $field);
    }

}
