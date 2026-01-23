<?php

class ResumeCategoryMappers extends BaseModel
{

    /**
     *
     * @var integer
     */
    public $resume_category_mapper_id;

    /**
     *
     * @var integer
     */
    public $resume_id;

    /**
     *
     * @var integer
     */
    public $skill_category_id;

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
        $this->setSource("resume_category_mappers");
    }
    public function resume(){
        return $this->belongsTo(
            'resume_id',
            Resumes::class,
            'resume_id',[
                'alias'=>'resumes',
            ]

            );
    }
  public function category(){
    return $this->belongsTo(
        'skill_category_id',
        SkillCategories::class,
        'skill_category_id',[
            'alias'=>'skill',
        ]
        );
  }
   public function skills(){
        return $this->hasManyToMany(
            'resume_category_mapper_id',
            ResumeCategorySkillMappers::class,
            'resume_category_mapper_id',
            'skill_id',
           Skills::class,
           'skill_category_id',
           [
            'alias'=>'skills'
           ]
           );
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ResumeCategoryMappers[]|ResumeCategoryMappers|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ResumeCategoryMappers|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
