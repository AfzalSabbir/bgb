<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\StringHelper;
use App\Helpers\QueryHelper;

class SectionController extends Controller
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
		$sections = QueryHelper::paginateRead('Section', $items);
		$total = $sections->total();
		return view('backend.pages.section.index', compact('sections','total','items'));
	} 



	// Searching Section
	public function search(Request $request)
	{
		$searchKey = $request->except(['_token']);
		$key = array(
			'title' => request()->title
		);
		if (request()->filled('items')) {
			$items = request()->items;
		}else{
			$items = $this->initalItems;
		}

		$sections = QueryHelper::simplePaginateSearch('Section', $key, $items);
		$total = $sections->total();
		return view('backend.pages.section.index', compact('sections', 'items', 'total'));
	}



	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|unique:sections'
		]);

		$data = array(
			'title' => $request->title,
			'status' => $request->status
		);

		QueryHelper::simpleInsert('Section', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.section.index');
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title' => 'required|unique:sections,title,'.$id // skipping this row
		]);

		$data = array(
			'title' => $request->title,
			'status' => $request->status
		);
		
		$where = array(
			'id' => $id
		);


		QueryHelper::simpleUpdate('Section', $data, $where);

		session()->flash('update_message', 'Added');
		return redirect()->route('admin.section.index');
	}


	public function delete($id)
	{

		$where = array('id' => $id);
		QueryHelper::delete('Section', $where);
		
		session()->flash('delete_message', 'Deleted');

		return redirect()->route('admin.section.index');
	}
}
