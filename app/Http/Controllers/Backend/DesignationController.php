<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\StringHelper;
use App\Helpers\QueryHelper;

class DesignationController extends Controller
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
				'title' => request()->title
			);
			$orderBy = 'title';
			$designations = QueryHelper::simplePaginateSearch('Designation', $where, $items, $orderBy);
			$total = $designations->total();
			return view('backend.pages.designation.index', compact('designations','total','items','where'));
		}
		else{ 
			$designations = QueryHelper::paginateRead('Designation', $items);
			$total = $designations->total();
			return view('backend.pages.designation.index', compact('designations','total','items'));
		}
	} 



	// Searching Designation
	public function search(Request $request, $key)
	{
		// $searchKey = $request->except(['_token']);
		// $key = array(
		// 	'title' => request()->title,
		// 	'slug' => request()->slug
		// );
		// if (request()->filled('items')) {
		// 	$items = request()->items;
		// }else{
		// 	$items = $this->initalItems;
		// }

		// $designations = QueryHelper::simplePaginateSearch('Designation', $key, $items);
		// $total = $designations->total();
		// return view('backend.pages.designation.index', compact('designations', 'items', 'total'));
		return request()->id;
	}



	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required'
		]);

		$data = array(
			'title' => $request->title,
			'slug' => StringHelper::clean($request->title, 'Designation', 'slug'),
			'status' => $request->status
		);

		QueryHelper::simpleInsert('Designation', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.designation.index');
	}


	public function update(Request $request, $slug)
	{
		$this->validate($request, [
			'title' => 'required'
		]);


		if($request->title === $request->old_title){
			$data = array(
				'title' => $request->title,
				'status' => $request->status
			);
		}
		else{
			$data = array(
				'title' => $request->title,
				'status' => $request->status,
				'slug' => StringHelper::clean($request->title, 'Designation', 'slug'),
			);
		}



		$where = array('slug' => $slug);
		QueryHelper::simpleUpdate('Designation', $data, $where);

		session()->flash('update_message', 'Added');
		return redirect()->route('admin.designation.index');
	}


	public function delete($slug)
	{

		$where = array('slug' => $slug);
		QueryHelper::delete('Designation', $where);
		
		session()->flash('delete_message', 'Deleted');

		return redirect()->route('admin.designation.index');
	}
}
