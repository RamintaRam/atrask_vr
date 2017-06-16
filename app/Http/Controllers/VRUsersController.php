<?php namespace App\Http\Controllers;


use App\Models\VRRoles;
use App\Models\VRUsers;
use App\VRConnectionsUsersRoles;
use App\VRMenu;
use App\VRPermissions;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

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
        $config['new'] = 'app.users.create';
        $config['edit'] = 'app.users.edit';
        $config['delete'] = 'app.users.delete';

        return view('admin.list', $config);

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrusers/create
	 *
	 * @return Response
	 */
	public function adminCreate()
	{
        $config = $this->getFormData();
        $dataFromModel = new VRUsers();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['route'] = route('app.users.create');

        //getFormData() funkcija apraryta apacioje.

        return view('admin.create-form', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrusers
	 *
	 * @return Response
	 */
	public function adminStore()
	{
        $data = request()->all();
//$data['id'] = Uuid::uuid4();
        $record = VRUsers::create($data);
        $data['user_id'] = $record->id;

        VRConnectionsUsersRoles::create($data);

        return redirect()->route('app.users.edit', [$record->id]);
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
	public function adminEdit($id)
	{
        $config = $this->getFormData();
        $dataFromModel = new VRUsers();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['route'] = route('app.users.edit', $id);
        $record = VRUsers::find($id)->toArray();


        return view('admin.create-form', $config);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /vrusers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function adminUpdate($id)
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


    public function getFormData()
    {

        $config['fields'][] =
            [
                "type" => "singleLine",
                "key" => "name",

            ];
//
        $config['fields'][] =
            [
                "type" => "singleLine",
                "key" => "email",
            ];

        $config['fields'][] =
            [
                "type" => "singleLine",
                "key" => "phone",
            ];


        $config['fields'][] =
            [
                "type" => "dropDown",
                "key" => "role_id",
                "option" => VRRoles::pluck('name', 'id'),

            ];
//
        $config['fields'][] =
            [
                "type" => "singleLine",
                "key" => "password",
            ];


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
//
//
        return $config;
    }

}

