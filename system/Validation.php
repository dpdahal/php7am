<?php

namespace Application\system;
/**
 * Class Validation
 * @package Application\system
 */
class Validation
{
    /**
     * @var array
     */
    private $_errors = [];

    /**
     * @param array $validationRules
     * min,max,unique,email,match,img
     */

    private $_db;

    /**
     * Validation constructor.
     */

    public function __construct()
    {
        $this->_db = Database::Instance();
    }

    public function validation($validationRules = array())
    {
        foreach ($validationRules as $field => $rules) {
            $rules = explode('|', $rules);
            foreach ($rules as $rule) {
                if ($rule === 'required' &&
                    (isset($_POST[$field]) && ($_POST[$field] === '') ||
                        (isset($_FILES[$field])) && $this->imageEmpry($field))) {
                    $this->setErrors($field, $field . ' is required');
                } else if ((isset($_POST[$field]) && $_POST[$field] !== '') ||
                    isset($_FILES[$field]) && !$this->imageEmpry($field)) {

                    if (preg_match('/min:\d*/', $rule)) {
                        preg_match('/\d+/', $rule, $matches);
                        $minValue = $matches[0];
                        if (strlen($_POST[$field]) < $minValue) {
                            $this->setErrors($field, $field . ' at least ' . $minValue . ' character');

                        }
                    } else if (preg_match('/max:\d*/', $rule)) {
                        preg_match('/\d+/', $rule, $matches);
                        $minValue = $matches[0];
                        if (strlen($_POST[$field]) > $minValue) {
                            $this->setErrors($field, $field . ' max  ' . $minValue . ' character');

                        }
                    } else if ($rule === 'email') {
                        if (!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
                            $this->setErrors($field, $field . ' not validate');
                        }

                    } else if (preg_match('/matches:/', $rule)) {
                        $matchField = str_replace('matches:', '', $rule);
                        if ($_POST[$field] !== $_POST[$matchField]) {
                            $field = str_replace('_', ' ', $field);
                            $this->setErrors($field, "{$field} as {$matchField} must match");
                        }
                    } else if (preg_match('/mimes:/', $rule)) {
                        $matchField = str_replace('mimes:', '', $rule);
                        $matchFields = explode(',', $matchField);
                        $ext = strtolower(pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION));
                        if (!in_array($ext, $matchFields)) {
                            $this->setErrors($field, $matchField . ' only supported');
                        }
                    } else if (preg_match('/unique:/', $rule)) {
                        $matchField = str_replace('unique:', '', $rule);
                        $matchFields = explode(',', $matchField);
                        if (count($matchFields) < 2) throw new \PDOException("Unique field required table name & column");
                        $tableName = $matchFields[0];
                        $columns = $matchFields[1];

                        if (count($matchFields) === 3) {
                            $criteriaColumnValue = explode(':', $matchFields[2]);
                            $query = "SELECT " . $columns . " FROM " . $tableName . " where "
                                . $columns . "='" . $_POST[$field] . "' AND " . $criteriaColumnValue[0] . "!='" .
                                $criteriaColumnValue[1] . "'";
                            $result = $this->_db->CustomQuery($query);
                        } else {
                            $result = $this->_db->SelectByCriteria($tableName, '', $columns, array($_POST[$field]));

                        }

                        if ($result) {
                            $this->setErrors($field, $field . ' must be unique');

                        }

                    }
                }
            }
        }


    }


    public
    function imageEmpry($field)
    {

        if ($_FILES[$field]['error'] === 4)
            return true;
        return false;
    }


    /**
     * @param array $errors
     */
    public
    function setErrors($field, $message)
    {
        $this->_errors[$field] = $message;
    }

    /**
     * @return array
     */
    public  function getErrors()
    {
        return $this->_errors;
    }

    /**
     * @return bool
     */


    public function isValid()
    {
        return (empty($this->getErrors()));
    }


}