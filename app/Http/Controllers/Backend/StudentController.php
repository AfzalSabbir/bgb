<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\QueryHelper;
use App\Helpers\StringHelper;
use App\Helpers\ImageUploadHelper;
use Datetime;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->initalItems = 20;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        if (request()->filled('items')) {
            $items = request()->items;
        }else{
            $items = $this->initalItems;
        }

        if(isset($_GET['searchButton'])){
            $where = array(
                'name' => request()->name,
                'class' => request()->class,
                'roll' => request()->roll,
                'group' => request()->group,
                'section' => request()->section,
                'year' => request()->year
            );
            $orderBy = 'name';
            $students = QueryHelper::simplePaginateSearch('Student', $where, $items, $orderBy);
            $total = $students->total();
            return view('backend.pages.student.index', compact('students','total','items','where'));
        }
        else{ 
            $students = QueryHelper::paginateRead('Student', $items);
            $total = $students->total();
            return view('backend.pages.student.index', compact('students','total','items'));
        }

        $students = QueryHelper::paginateRead('Student', $items);
        $total = $students->total();
        
        return view('backend.pages.student.index', compact('students','total','items'));
    }


    public function create()
    {
        return view('backend.pages.student.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'roll' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'dob' => 'required',
            'blood_group' => 'required',
            'present_address' => 'required',
            'class' => 'required',
            'section' => 'required',
            'year' => 'required'
        ]);

        $photo = ImageUploadHelper::upload('photo', $request->file('photo')[0], time(), 'public/images/students');
        $dob = date_format(DateTime::createFromFormat('Y-m-d', $request->dob), "Y-m-d");

        $data = $request->except(['_token', 'photo', 'dob']);
        $data['photo'] = $photo;
        $data['registration'] = mt_rand(100000,999999);
        $data['dob'] = $dob;

        QueryHelper::dbInsert('students', $data);

        session()->flash('success', 'Student');
        return redirect()->route('admin.student.index');
    }


    public function edit($id)
    {
        return view('backend.pages.student.edit');
    }


    public function show($id)
    {
        return view('backend.pages.student.show');
    }
}
