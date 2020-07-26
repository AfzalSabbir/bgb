<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}


	public function index()
	{
		return view('backend.pages.teacher.index');
	}


	public function create()
	{
		return view('backend.pages.teacher.create');
	}


	public function store(Request $request)
	{

	}


	public function edit($id)
	{
		return view('backend.pages.teacher.edit');
	}

	public function show($id)
	{
		return view('backend.pages.teacher.show');
	}


	public function update(Request $request, $id)
	{

	}


	public function delete($id)
	{
		
	} 
}
