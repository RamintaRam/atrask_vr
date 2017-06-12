<?php namespace App\Http\Controllers;

use App\VRMenu;
use Illuminate\Routing\Controller;

class VRMenuController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrmenu
	 *
	 * @return Response
	 */
	public function adminIndex()
	{

        $dataFromModel = new VRMenu();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['list'] = VRMenu::get()->toArray();
        $config['callToAction'] = 'app.menu.update';

        return view('admin.list', $config);

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrmenu/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrmenu
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vrmenu/{id}
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
	 * GET /vrmenu/{id}/edit
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
	 * PUT /vrmenu/{id}
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
	 * DELETE /vrmenu/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}