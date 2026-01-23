<?php

namespace App\Models;

use Phalcon\Mvc\Model;

class Employees extends BaseModel
{
    public $id;
    public $employee_id;
    public $first_name;
    public $last_name;
    public $email;
    public $department_id;
    public $location;
    public $date_of_joining;
    public $phone_number;
    public $work_station;
    public $business_unit;
    public $reporting_to;
    public $role_id;
    public $picture;
    public $created_at;
    public $updated_at;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        // Database
        $this->setSchema("resume_phalcon");
        $this->setSource("employees");
    }

     public function educations(){
       return $this->hasMany(
            'employee_id',
            Educations::class,
            'employee_id',
            [
                'alias' => 'educations'
            ]
        );
    }

       public function resume(){
        return $this->hasMany(
            'employee_id',
            Resumes::class,
            'employee_id',
            [
                'alias' => 'resumes'
            ]
        );
    }

        // Employee -> Role (belongsTo)
        // $this->belongsTo(
        //     'role_id',
        //     Roles::class,
        //     'id',
        //     [
        //         'alias' => 'role'
        //     ]
        // );
      public function user(){ 
       return $this->belongsTo(
            'employee_id',
            Users::class,
            'user_id',
            [
                'alias' => 'user'
            ]
        );
    }

       public function manager(){
        return
        $this->belongsTo(
            'reporting_to',
            Employees::class,
            'employee_id',
            [
                'alias' => 'manager'
            ]
        );
    }
       public function department(){
        return
        $this->belongsTo(
            'department_id',
            Departments::class,
            'department_id',
            [
                'alias' => 'department'
            ]
        );
    }

    /**
     * Find records
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Find first record
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
}
