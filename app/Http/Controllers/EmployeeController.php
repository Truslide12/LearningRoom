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
        if($request->currentCol){
            $selectedCol = $request->selectedCol;
        } else {
            $selectedCol = 'first_name';
        }
        if($request->currentDir){
            $currentDir = $request->currentDir;
        } else {
            $currentDir = 'desc';
        }
        
        // Set Order and Direction
        if($selectedCol == $currentCol){
            if($currentDir === 'asc'){
                $employees = Employee::orderByDesc($selectedCol)->get();
                $currentDir = 'desc';
            } else {
                $employees = Employee::all();
                $currentDir = 'asc';
            }
        } else {
            $employees = Employee::orderByAsc($selectedCol)->get();
        } 
        // dd($employees);
        return view('index', ['employees' => $employees]);
    }
}
