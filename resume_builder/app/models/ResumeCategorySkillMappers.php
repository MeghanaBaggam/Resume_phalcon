<?php

class ResumeCategorySkillMappers extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $resume_category_skill_mapper_id;

    /**
     *
     * @var integer
     */
    public $resume_category_mapper_id;

    /**
     *
     * @var integer
     */
    public $skill_id;

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
        $this->setSource("resume_category_skill_mappers");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ResumeCategorySkillMappers[]|ResumeCategorySkillMappers|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ResumeCategorySkillMappers|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
