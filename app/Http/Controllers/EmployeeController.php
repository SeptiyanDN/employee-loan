<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeAddress;
use App\Models\EmployeeBank;
use App\Models\EmployeeDocuments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{

    public function index(){

        $employees = User::leftJoin('employees','employees.user_id','=','users.id')
                    ->leftJoin('employee_banks','employees.id' ,'=','employee_banks.employee_id')
                    ->leftJoin('employee_addresses','employees.id' ,'=','employee_addresses.employee_id')

                    ->select(
                        'employee_banks.name as name_bank',
                        'employee_banks.number as number_bank',
                        'employee_addresses.address_line_1 as address_line_1',
                        'employee_addresses.address_line_2 as address_line_2',
                        'employee_addresses.landmark as landmark',
                        'employee_addresses.city as city',
                        'employee_addresses.state as state',
                        'employee_addresses.country as country',
                        'employees.name as employee_name',
                        'employees.nric',
                        'employees.phone',
                        'employees.number_id_staff',
                        'employees.haveALoan',
                        'users.id as user_id',
                        'users.email',
                        'employees.created_at',
                        'employees.id as id'
                    )
                    ->get();
        return view('module.employee.index',compact('employees'));
    }
    public function createEmployee(){

        return view('module.employee.create');
    }


    public function store(Request $request)
    {
        $random = Str::random(20);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($random),
        ]);
        $user->assignRole('Employee');

        $employee = Employee::create([
            'name' => $user->name,
            'nric' => $request->nric,
            'phone' => $request->phone,
            'number_id_staff'=> $request->number_id_staff,
            'haveALoan'=> false,
            'user_id' => $user->id
        ]);

        $documents = new EmployeeDocuments();
        if($request->hasFile('profile_image')){
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $fileNameProfileImage = 'profile_image'.'.'.$extension;
            $request->file('profile_image')->storeAs('public/documents/'.$request->nric,$fileNameProfileImage);

            $documents->profile_image = $request->profile_image ? $fileNameProfileImage : null;

        }
        if($request->hasFile('card_company')){
            $extension = $request->file('card_company')->getClientOriginalExtension();
            $fileNameCardCompany = 'card_company'.'.'.$extension;
            $request->file('card_company')->storeAs('public/documents/'.$request->nric,$fileNameCardCompany);
            $documents->card_company = $request->card_company ? $fileNameCardCompany : null;

        }
        if($request->hasFile('card_national')){
            $extension = $request->file('card_national')->getClientOriginalExtension();
            $fileNameCardNational = 'card_national'.'.'.$extension;
            $request->file('card_national')->storeAs('public/documents/'.$request->nric,$fileNameCardNational);
                $documents->card_national = $request->card_national ? $fileNameCardNational : null;
        }
        $documents->employee_id = $employee->id;
        $documents->save();
        EmployeeBank::create([
            'name' => $request->bank_name,
            'number' => $request->number_bank,
            'employee_id' => $employee->id
        ]);
        EmployeeAddress::create([
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'landmark' => $request->landmark,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'employee_id' => $employee->id
        ]);
        return redirect('/employee/management')->with('success','Success create new employee data.');
    }

    public function show(Employee $employee)
    {
        $data = User::leftJoin('employees','employees.user_id','=','users.id')
                    ->leftJoin('employee_banks','employees.id' ,'=','employee_banks.employee_id')
                    ->leftJoin('employee_addresses','employees.id' ,'=','employee_addresses.employee_id')
                    ->leftJoin('employee_documents','employees.id','=','employee_documents.employee_id')
                    ->where('employees.id',$employee->id)
                    ->select(
                        'employee_banks.name as name_bank',
                        'employee_banks.number as number_bank',
                        'employee_addresses.address_line_1 as address_line_1',
                        'employee_addresses.address_line_2 as address_line_2',
                        'employee_addresses.landmark as landmark',
                        'employee_addresses.city as city',
                        'employee_addresses.state as state',
                        'employee_addresses.country as country',
                        'employees.name as employee_name',
                        'employees.nric',
                        'employees.phone',
                        'employees.number_id_staff',
                        'employees.haveALoan',
                        'users.id as user_id',
                        'users.email',
                        'users.created_at',
                        'employees.id as id',
                        'employee_documents.profile_image as profile_image',
                        'employee_documents.card_company as card_company',
                        'employee_documents.card_national as card_national',
                    )
                    ->first();

                    // dd($data);
                    $profileImage = $data->profile_image ? 'http://localhost:8000/storage/documents/'.$data->nric.'/'.$data->profile_image : 'https://engineeredsys.com/wp-content/uploads/2019/08/download.png';
                //    dd($profileImage);
                    $cardCompany =  $data->card_company ? 'http://localhost:8000/storage/documents/'.$data->nric.'/'.$data->card_company : 'https://engineeredsys.com/wp-content/uploads/2019/08/download.png';
                    $cardNational = $data->card_national ? 'http://localhost:8000/storage/documents/'.$data->nric.'/'.$data->card_national : 'https://engineeredsys.com/wp-content/uploads/2019/08/download.png';

                    return view('module.employee.detail',compact('data','profileImage','cardCompany','cardNational'));
    }


    public function edit(Employee $employee)
    {
        $data = User::leftJoin('employees','employees.user_id','=','users.id')
        ->leftJoin('employee_banks','employees.id' ,'=','employee_banks.employee_id')
        ->leftJoin('employee_addresses','employees.id' ,'=','employee_addresses.employee_id')
        ->leftJoin('employee_documents','employees.id' ,'=','employee_documents.employee_id')
        ->where('employees.id',$employee->id)
        ->select(
            'employee_banks.name as name_bank',
            'employee_banks.number as number_bank',
            'employee_addresses.address_line_1 as address_line_1',
            'employee_addresses.address_line_2 as address_line_2',
            'employee_addresses.landmark as landmark',
            'employee_addresses.city as city',
            'employee_addresses.state as state',
            'employee_addresses.country as country',
            'employees.name as employee_name',
            'employees.nric',
            'employees.phone',
            'employees.number_id_staff',
            'employees.haveALoan',
            'users.id as user_id',
            'users.email',
            'users.created_at',
            'employees.id as id',
            'employee_documents.profile_image as profile_image',
            'employee_documents.card_company as card_company',
            'employee_documents.card_national as card_national',
        )
        ->first();
            $profileImage = $data->profile_image ? 'http://localhost:8000/storage/documents/'.$data->nric.'/'.$data->profile_image : 'https://engineeredsys.com/wp-content/uploads/2019/08/download.png';
            $cardCompany =  $data->card_company ? 'http://localhost:8000/storage/documents/'.$data->nric.'/'.$data->card_company : 'https://engineeredsys.com/wp-content/uploads/2019/08/download.png';
            $cardNational = $data->card_national ? 'http://localhost:8000/storage/documents/'.$data->nric.'/'.$data->card_national : 'https://engineeredsys.com/wp-content/uploads/2019/08/download.png';

        return view('module.employee.edit',compact('data','profileImage','cardCompany','cardNational','employee'));
 }

    public function update(Request $request, Employee $employee)
    {
        $employee->update([
            'name' => $request->name,
            'nric' => $request->nric,
            'phone' => $request->phone,
            'number_id_staff'=> $request->number_id_staff,
        ]);

        $documents = EmployeeDocuments::where('employee_id',$employee->id)->first();
        if($documents != null) {
            $documents->delete();
            File::deleteDirectory(storage_path('public/documents/'.$request->nric));
        }
        $documents = new EmployeeDocuments();
        if($request->hasFile('profile_image')){
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $fileNameProfileImage = 'profile_image'.'.'.$extension;
            $request->file('profile_image')->storeAs('public/documents/'.$request->nric,$fileNameProfileImage);
            $documents->profile_image = $request->profile_image ? $fileNameProfileImage : null;
        }
         if($request->hasFile('card_company')){
            $extension = $request->file('card_company')->getClientOriginalExtension();
            $fileNameCardCompany = 'card_company'.'.'.$extension;
            $request->file('card_company')->storeAs('public/documents/'.$request->nric,$fileNameCardCompany);
            $documents->card_company = $request->card_company ? $fileNameCardCompany : null;

        }
         if($request->hasFile('card_national')){
            $extension = $request->file('card_national')->getClientOriginalExtension();
            $fileNameCardNational = 'card_national'.'.'.$extension;
            $request->file('card_national')->storeAs('public/documents/'.$request->nric,$fileNameCardNational);
                $documents->card_national = $request->card_national ? $fileNameCardNational : null;
        }
        $documents->employee_id = $employee->id;
        $documents->save();


        $employeeBank = EmployeeBank::where('employee_id',$employee->id)->first();
        if ($employeeBank == null ) {
             EmployeeBank::create([
                'name' => $request->name_bank,
                'number' => $request->number_bank,
                'employee_id' => $employee->id
            ]);
        } else {
            $employeeBank->update([
                'name' => $request->name_bank,
                'number' => $request->number_bank,
            ]);
        }
        $employeeAddress = EmployeeAddress::where('employee_id',$employee->id)->first();
        if ($employeeAddress == null) {
            EmployeeAddress::create([
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
                'landmark' => $request->landmark,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'employee_id' => $employee->id
            ]);

        } else {
            $employeeAddress->update([
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
                'landmark' => $request->landmark,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
            ]);
        }

        return redirect()->route('users.management')->with('success','Employee Update Successfully');
    }

    public function destroy(Employee $employee)
    {
        $employee = Employee::find($employee)->first();
        $user = User::find($employee->id);

        $user->delete();
        return response()->json(null, 204);


    }
}
