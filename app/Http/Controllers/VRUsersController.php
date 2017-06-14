<?php namespace App\Http\Controllers;


use App\Models\VRUsers;
use App\VRConnectionsUsersRoles;
use App\VRMenu;
use Illuminate\Routing\Controller;

class VRUsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /vrusers
	 *
	 * @return Response
	 */
	public function adminIndex()
	{
        $dataFromModel = new VRUsers();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['list'] = VRUsers::get()->toArray();
        $config['new'] = 'app.user.create';
        $config['edit'] = 'app.user.edit';
        $config['delete'] = 'app.user.delete';

        return view('admin.list', $config);

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrusers/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config = $this->getFormData();
        $dataFromModel = new VRUsers();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['route'] = route('app.user.create');

        //getFormData() funkcija apraryta apacioje.

        return view('admin.create-form', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrusers
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /vrusers/{id}
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
	 * GET /vrusers/{id}/edit
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
	 * PUT /vrusers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $record = VRUsers::find($id);

        $data = request()->all();
        $record->update($data);

        return $record;
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /vrusers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminDestroy($id)
	{
        VRConnectionsUsersRoles::destroy(VRConnectionsUsersRoles::where('user_id', $id)->pluck('id')->toArray());

        VRUsers::destroy($id);

        return json_encode(["success" => true, "id" => $id]);

	}

	
//    public function getFormData()
//    {
//        $config['fields'][] = [
//            "type" => "dropDown",
//            "key" => "language_code",
//            "option" => getActiveLanguages(),
//        ];
//        $config['fields'][] =
//            [
//                "type" => "singleLine",
//                "key" => "name",
//            ];
//
//        $config['fields'][] =
//            [
//                "type" => "singleLine",
//                "key" => "url",
//            ];
//
//        $config['fields'][] =
//            [
//                "type" => "checkBox",
//                "key" => '',
//                "option" => [[
//                    'name' => 'new_window',
//                    'value' => 1,
//                    'title' => trans("app.newWindow"),
//                ]]
//            ];
//
//        $config['fields'][] =
//            [
//                "type" => "singleLine",
//                "key" => "sequence",
//                "option" => [
//                    'key' => 'value',
//                ]
//            ];
//
//        $config['fields'][] =
//            [
//                "type" => "dropDown",
//                "key" => "vr_parent_id",
//                "option" => VRMenuTranslations::pluck('name', 'record_id'),
//
//            ];
//
//        return $config;
//    }

}

