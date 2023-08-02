<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::orderBy('last_name', 'ASC')->get();

        return view('index', 
            [
                'employees'     => $employees,
                'currentCol'   => 'last_name',
                'currentDir'    => 'ASC',
            ]);
    }

    public function indexSorted (Request $request)
    {
        // dd($request->query('selectedCol'));
        if($request->query('currentCol')){
            $currentCol = $request->query('currentCol');
        } else {
            $currentCol = 'first_name';
        }
        if($request->query('selectedCol')){
            $selectedCol = $request->query('selectedCol');
        } else {
            $selectedCol = 'first_name';
        }
        if($request->query('currentDir')){
            $currentDir = $request->query('currentDir');
        } else {
            $currentDir = 'asc';
        }
        // dd(['currentCol' => $currentCol,
        //     'selectedCol' => $selectedCol,
        //     'currentDir' => $currentDir,
        // ]);
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
