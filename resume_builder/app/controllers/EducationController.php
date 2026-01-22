<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use App\Services\EducationService;
use App\Utils\ResponseUtils;

class EducationController extends Controller
{
    private EducationService $educationService;
    public function initialize()
    {
        $this->educationService = new EducationService();
    }

    public function getEmployeeEducationAction($employeeId)
    {
        try {

            $result = $this->educationService->getEmployeeEducation((int)$employeeId);

            return ResponseUtils::dataResponse($result);

        } catch (\Exception $e) {

            return ResponseUtils::error($e->getMessage());
        }
    }
}
