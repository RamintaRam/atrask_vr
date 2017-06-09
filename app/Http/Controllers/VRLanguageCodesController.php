<?php namespace App\Http\Controllers;

use App\VRLanguageCodes;
use Illuminate\Routing\Controller;

class VRLanguageCodesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrlauguagecodes
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $dataFromModel = new VRLanguageCodes();
		$config['list'] = VRLanguageCodes::get()->toArray();
		$config['callToAction'] = 'app.language.update';
        //$configuration['tableName'] = $dataFromModel->getTableName();
//		dd($config);

	    return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrlauguagecodes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrlauguagecodes
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vrlauguagecodes/{id}
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
	 * GET /vrlauguagecodes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminEdit($id)
	{


	}

	/**
	 * Update the specified resource in storage.
	 * PUT /vrlauguagecodes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminUpdate($id)
    {
        $record = VRLanguageCodes::find($id);

        $data = request()->all();
        $record->update($data);


// PVZ:       $record = VRLanguageCodes::findOrFail($id);

//    PAVYZDYS    $record = VRLanguageCodes::find($id);
//
//        if ($record)
//        {
//            $data = request()->all();
//            $record->update($data);
//        }
        return $record;
    }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vrlauguagecodes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}