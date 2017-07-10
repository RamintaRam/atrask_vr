<?php namespace App\Http\Controllers;

use App\VRReservations;
use Illuminate\Routing\Controller;

class VRReservationsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrreservations
	 *
	 * @return Response
	 */
	public function index()
	{
        $dataFromModel = new VRReservations();
//        $config['tableName'] = $dataFromModel->getTableName();
        $config['list'] = VRReservations::get()->toArray();
        $config['callToAction'] = 'app.users.update';
dd( $config['list']);
        return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrreservations/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrreservations
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vrreservations/{id}
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
	 * GET /vrreservations/{id}/edit
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
	 * PUT /vrreservations/{id}
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
	 * DELETE /vrreservations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}