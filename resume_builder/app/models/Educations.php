<?php
namespace App\Models;
use App\Models\BaseModel;

class Educations extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $education_id;

    /**
     *
     * @var string
     */
    public $employee_id;

    /**
     *
     * @var string
     */
    public $degree;

    /**
     *
     * @var string
     */
    public $institute;

    /**
     *
     * @var string
     */
    public $start_year;

    /**
     *
     * @var string
     */
    public $end_year;

    /**
     *
     * @var double
     */
    public $percentage;

    /**
     *
     * @var string
     */
    public $created_at;

    /**
     *
     * @var string
     */
    public $updated_at;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("resume_phalcon");
        $this->setSource("educations");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Educations[]|Educations|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Educations|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
