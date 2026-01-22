<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use App\Services\EmployeeService;
use App\Utils\ResponseUtils;

class EmployeeController extends Controller
{
    private EmployeeService $employeeService;

    public function initialize()
    {
        $this->employeeService = new EmployeeService();
    }

    public function createAction()
    {
        try {

            $data = $this->request->getJsonRawBody(true);

            $response = $this->employeeService->createEmployee($data);

            return ResponseUtils::success($response);

        } catch (\Exception $e) {

            return ResponseUtils::error($e->getMessage());
        }
    }

    public function updateAction($id)
    {
        try {

            $data = $this->request->getJsonRawBody(true);

            $response = $this->employeeService->updateEmployee($id, $data);

            return ResponseUtils::success($response);

        } catch (\Exception $e) {

            return ResponseUtils::error($e->getMessage());
        }
    }

    public function deleteAction($id)
    {
        try {

            $response = $this->employeeService->deleteEmployee($id);

            return ResponseUtils::success($response);

        } catch (\Exception $e) {

            return ResponseUtils::error($e->getMessage());
        }
    }

    public function getEmployeeAction($id)
    {
        try {

            $employee = $this->employeeService->getEmployee($id);

            return ResponseUtils::dataResponse($employee);

        } catch (\Exception $e) {

            return ResponseUtils::error($e->getMessage());
        }
    }

    public function getAllAction()
    {
        $employees = $this->employeeService->getAllEmployees();

        return ResponseUtils::dataResponse($employees);
    }
}
