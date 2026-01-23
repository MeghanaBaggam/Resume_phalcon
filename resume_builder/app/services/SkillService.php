<?php
namespace App\Services;

use App\Models\Skills;
use App\Models\SkillCategories;
use App\Models\ResumeCategoryMappers;
use App\Utils\CaseConvertUtils;
use App\Utils\ValidationUtils;
use Exception;

class SkillService{

    public function getAllSkills(){
        return skillCategories::find('skills')->get();
    }

}