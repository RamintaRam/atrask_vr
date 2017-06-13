<?php namespace App\Http\Controllers;

use App\VRCategories;
use App\VRCategoriesTranslations;
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
        $config = $this->getFormData();
        $data = request()->all();
        $dataFromModel = new VRCategories();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['list'] = VRCategories::get()->toArray();
        $config['route'] = route('app.categories.create');

//getFormData() funkcija apraryta apacioje.





        return view('admin.create-form', $config);
    }

    /**
	 * Store a newly created resource in storage.
	 * POST /vrcategories
	 *
	 * @return Response
	 */
    public function adminStore()
    {
        $data = request()->all();
/*
 * VIENAS BUDAS:
        $record = VRCategories::create();
        VRCategoriesTranslations::create([
            'record_id' => $record->id,
            'language_code' => $data['language_code'],
            'name' => $data['name'],
        ]);*/

//ANTRAS BUDAS:
        $record = VRCategories::create();
        $data['record_id'] = $record->id;
        VRCategoriesTranslations::create($data);


//TRECIAS BUDAS:
//        $data['record_id'] = (VRCategories::create())->id;
//        VRCategoriesTranslations::create($data);


        return redirect()->route('app.categories.edit', [$record->id]);

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
	public function adminEdit($id)
	{
        $config = $this->getFormData();
        $dataFromModel = new VRCategories();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['route'] = route('app.categories.edit', $id);


        return view('admin.create-form', $config);
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


	public function getFormData()
    {
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

        return $config;
    }

}