<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        if($request->currentCol){
            $currentCol = $request->currentCol;
        } else {
            $currentCol = 'first_name';
        }
        if($request->selectedCol){
            $selectedCol = $request->selectedCol;
        } else {
            $selectedCol = 'first_name';
        }
        if($request->currentDir){
            $currentDir = $request->currentDir;
        } else {
            $currentDir = 'asc';
        }
        
        // // Set Order and Direction
        if($selectedCol === $currentCol){
            if($currentDir === 'asc'){
                $employees = Employee::orderBy($selectedCol, 'desc')->get();
                $currentDir = 'desc';
            } else {
                $employees = Employee::orderBy($selectedCol, 'asc')->get();
                $currentDir = 'asc';
            }
        } else {
            $employees = Employee::orderBy($selectedCol, $currentDir)->get();
        } 
        // dd($employees);
        // $employees = Employee::orderBy('first_name', 'desc')->get();
        return view('index', 
            [
                'employees'     => $employees,
                'currentCol'   => $selectedCol,
                'currentDir'    => $currentDir,
            ]);
    }
}
