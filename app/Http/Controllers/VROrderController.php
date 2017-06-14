<?php namespace App\Http\Controllers;

use App\VROrder;
use Illuminate\Routing\Controller;

class VROrderController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrorder
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $dataFromModel = new VROrder();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['list'] = VROrder::get()->toArray();
        $config['new'] = 'app.categories.create';
        $config['edit'] = 'app.categories.edit';
        $config['delete'] = 'app.categories.delete';

        return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrorder/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrorder
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vrorder/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /vrorder/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /vrorder/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vrorder/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}