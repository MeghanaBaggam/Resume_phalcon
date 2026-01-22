<?php

namespace App\Services;

use App\Models\Educations;
use App\Utils\CaseConvertUtils;
use App\Utils\ValidationUtils;
use Exception;

class EducationService{
  public function createEducation(array $request){
    $validated = ValidationUtils::validate($request, [
           "employeeId"=> "required|id|exists:employees,employee_id",
            "degree"=>"required|string",
            "institute"=> "required|string",
            "startYear"=> "required|year",
            "endYear"=> "required|year",
            "percentage"=> "required|decimal",
        ]);
        $educationRequest = CaseConvertUtils::camelToSnakeCase($validated);
        $education =new Educations();
        $education->assign($educationRequest);
         if ($education->save() === false) {

            $messages = $education->getMessages();
            throw new Exception($messages[0]->getMessage());
        }

        return "Education created successfully";
    }

    public function updateEducation(int $educationId, array $request)
    {
        $education = Educations::findFirst($educationId);

        if (!$education) {
            throw new Exception("Education not found with given id");
        }

        $educationRequest = CaseConvertUtils::camelToSnakeCase($request);
          $education->assign($educationRequest);
        if ($education->update() === false) {

            $messages = $education->getMessages();
            throw new Exception($messages[0]->getMessage());
        }

        return "Education updated successfully";
    }
     public function deleteEducation(int $educationId)
    {
        $education = Educations::findFirst($educationId);

        if (!$education) {
            throw new Exception("Education not found with given id");
        }

        if ($education->delete() === false) {

            $messages = $education->getMessages();
            throw new Exception($messages[0]->getMessage());
        }

        return "Education deleted successfully";
    }
    public function getEducation(int $educationId)
    {
        $education = Educations::findFirst($educationId);

        if (!$education) {
            throw new Exception("Education not found with given id");
        }

        return $education;
    }
    public function getEmployeeEducation(int $employeeId)
    {
        $educations =Educations::find("employee_id = $employeeId");
      if(count($educations) == 0){
            return $educations;
        }

        return $educations;
    }


}