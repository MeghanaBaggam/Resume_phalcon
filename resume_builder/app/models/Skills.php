<?php

class Skills extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $skill_id;

    /**
     *
     * @var integer
     */
    public $skill_category_id;

    /**
     *
     * @var string
     */
    public $skill_name;

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
        $this->setSource("skills");
    }
    public function category(){
        return $this->belongsTo(
            'skill_category_id',
            SkillCategories::class,
            'skill_category_id',
            [
                'alias'=>'skill'
            ]
            );
    }


    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Skills[]|Skills|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Skills|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
