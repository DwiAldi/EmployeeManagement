<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\IsAdmin;
use App\Http\Requests\Admin\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Employee::all();

        return view('pages.admin.employee.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        // $lastIDEmployee = Employee::select('id_employee')->orderBy('id_employee', 'desc')->first();
        // $lastIDEmployee = (int)substr($lastIDEmployee, 3);
        // Debugbar::debug($lastIDEmployee);
        $lastIDEmployee = IdGenerator::generate(['table' => 'employees', 'field' => 'id_employee', 'length' => 7, 'prefix' =>'IP06']);

        $name = $request->name;
        $address = $request->address;
        $birth_date = $request->birth_date;
        $join_date = $request->join_date;

        $data = array(
            'id_employee' => $lastIDEmployee,
            'name' => $name,
            'address' => $address,
            'birth_date' => $birth_date,
            'join_date' => $join_date
        );

        Employee::create($data);
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_employee)
    {
        // $item = Employee::findOrFail($id_employee);

        $item = Employee::where('id_employee', '=', $id_employee)->firstOrFail();

        return view('pages.admin.employee.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id_employee)
    {
        //PERLU DICEK LAGI
        $data = $request->all();

        $item = Employee::findOrFail($id_employee);

        $item->update($data);

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_employee)
    {
        $item = Employee::findOrFail($id_employee);
        $item -> delete();

        return redirect()->route('employee.index');
    }
}
