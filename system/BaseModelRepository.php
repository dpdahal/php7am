<?php


namespace Application\system;

use Application\system\repository\ModelRepository;

/**
 * Class BaseModelRepository
 * @package Application\system
 */
class BaseModelRepository implements ModelRepository
{
    /**
     * @var Database|null
     */
    private $connection;
    protected $tableName, $columns, $criteria;

    /**
     * BaseModelRepository constructor.
     */

    protected $dataTime = true;

    public function __construct()
    {
        $this->connection = Database::Instance();

    }


    /**
     * @param array $data
     * @return bool
     */

    public function Insert(array $data)
    {
        if ($this->dataTime) {
            $data['created_at'] = Datetime::AddDate();
            $data['updated_at'] = Datetime::AddDate();
        }

        return $this->connection->Insert($this->tableName, $data);

    }

    public function Update($data = array(), $bindValue = array())
    {
        return $this->connection->Update($this->tableName, $data, $this->criteria, array($bindValue));

    }

    public function Delete($bindValue)
    {
        return $this->connection->Delete($this->tableName, $this->criteria, array($bindValue));
    }


    public function Select()
    {
        return $this->connection->SelectAll($this->tableName);

    }

    public function SelectBy($criteria)
    {


        $result = $this->connection->SelectByCriteria($this->tableName, $this->columns, $this->criteria, array($criteria));
        if ($result) {
            return $result[0];
        }
        return $result;


    }

    public function getSingle($criteria, $criteriaValue)
    {

        $result = $this->connection->SelectByCriteria($this->tableName, $this->columns, $criteria, array($criteriaValue));
        if ($result) {
            return $result[0];
        }
        return $result;


    }

    public function count()
    {

        return $this->connection->Count($this->tableName);
    }
}