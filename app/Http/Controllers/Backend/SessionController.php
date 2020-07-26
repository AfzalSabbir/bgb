<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\StringHelper;
use App\Helpers\QueryHelper;

class SessionController extends Controller
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
			$sessions = QueryHelper::simplePaginateSearch('Session', $where, $items, $orderBy);
			$total = $sessions->total();
			return view('backend.pages.session.index', compact('sessions','total','items', 'where'));
		}
		else{ 
			$sessions = QueryHelper::paginateRead('Session', $items);
			$total = $sessions->total();
			return view('backend.pages.session.index', compact('sessions','total','items'));
		}
	} 



	// Searching Session
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

		$sessions = QueryHelper::simplePaginateSearch('Session', $key, $items);
		$total = $sessions->total();
		return view('backend.pages.session.index', compact('sessions', 'items', 'total'));
	}



	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required'
		]);

		$data = array(
			'title' => $request->title,
			'status' => $request->status
		);

		QueryHelper::simpleInsert('Session', $data);

		session()->flash('add_message', 'Added');
		return redirect()->route('admin.session.index');
	}


	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'title' => 'required'
		]);

		$data = array(
			'title' => $request->title,
			'status' => $request->status
		);
		
		$where = array(
			'id' => $id
		);


		QueryHelper::simpleUpdate('Session', $data, $where);

		session()->flash('update_message', 'Added');
		return redirect()->route('admin.session.index');
	}


	public function delete($id)
	{

		$where = array('id' => $id);
		QueryHelper::delete('Session', $where);
		
		session()->flash('delete_message', 'Deleted');

		return redirect()->route('admin.session.index');
	}
}
