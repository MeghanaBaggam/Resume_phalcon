<?php

namespace App\Services;

use App\Models\Employees;
use App\Utils\CaseConvertUtils;
use App\Utils\ValidationUtils;
use Exception;

class EmployeeService
{
    /**
     * Create Employee
     */
    public function createEmployee(array $request)
    {
        $validated = ValidationUtils::validate($request, [
            "firstName"     => "required",
            "lastName"      => "required",
            "email"         => "required|email",
            "departmentId"  => "nullable|int",
            "location"      => "nullable|string",
            "dateOfJoining" => "nullable|string",
            "phoneNumber"   => "nullable|int",
            "workStation"   => "nullable|string",
            "reportingTo"   => "nullable|int",
            "picture"       => "nullable|string",
        ]);

        // camelCase → snake_case
        $employeeRequest = CaseConvertUtils::camelToSnakeCase($validated);

        $employee = new Employees();
        $employee->assign($employeeRequest);

        if ($employee->save() === false) {

            $messages = $employee->getMessages();
            throw new Exception($messages[0]->getMessage());
        }

        return "Employee created successfully";
    }

    /**
     * Update Employee
     */
    public function updateEmployee(int $employeeId, array $request)
    {
        $employee = Employees::findFirst($employeeId);

        if (!$employee) {
            throw new Exception("Employee not found with given id");
        }

        $employeeRequest = CaseConvertUtils::camelToSnakeCase($request);
          $employee->assign($employeeRequest);

        if ($employee->update() === false) {

            $messages = $employee->getMessages();
            throw new Exception($messages[0]->getMessage());
        }

        return "Employee updated successfully";
    }

    /**
     * Delete Employee
     */
    public function deleteEmployee(int $employeeId)
    {
        $employee = Employees::findFirst($employeeId);

        if (!$employee) {
            throw new Exception("Employee not found with given id");
        }

        if ($employee->delete() === false) {

            $messages = $employee->getMessages();
            throw new Exception($messages[0]->getMessage());
        }

        return "Employee deleted successfully";
    }

    /**
     * Get Single Employee
     */
    public function getEmployee(int $employeeId)
    {
        $employee = Employees::findFirst($employeeId);

        if (!$employee) {
            throw new Exception("Employee not found with given id");
        }

        return $employee;
    }

    /**
     * Get All Employees
     */
    public function getAllEmployees()
    {
        return Employees::find();
    }
}
