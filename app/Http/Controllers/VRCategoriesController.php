<?php namespace App\Http\Controllers;

use App\VRCategories;
use App\VRLanguageCodes;
use Illuminate\Routing\Controller;

class VRCategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrcategories
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $dataFromModel = new VRCategories();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['list'] = VRCategories::get()->toArray();
        $config['new'] = 'app.categories.create';

        return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrcategories/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        $data = request()->all();
        $dataFromModel = new VRCategories();
        $config['tableName'] = $dataFromModel->getTableName();


        $config['fields'][] = [
            "type" => "dropDown",
            "key" => "language_code",
            "option" => getActiveLanguages(),
        ];
        $config['fields'][]=
            [
                "type" => "singleLine",
                "key" => "name",
            ];




        return view('admin.create-form', $config);
    }

    /**
	 * Store a newly created resource in storage.
	 * POST /vrcategories
	 *
	 * @return Response
	 */
	public function store()
	{
        $dataFromModel = new VRCategories();
        $config['tableName'] = $dataFromModel->getTableName();



	}

	/**
	 * Display the specified resource.
	 * GET /vrcategories/{id}
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
	 * GET /vrcategories/{id}/edit
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
	 * PUT /vrcategories/{id}
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
	 * DELETE /vrcategories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}