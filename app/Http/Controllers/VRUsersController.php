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

        //getFormData() funkcija aprasyta apacioje.

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
        $data['password']= bcrypt($data['password']);
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
        $record = VRUsers::find($id)->toArray();
        $record['role_id'] = $record['role']['role_id'];

        $config = $this->getFormData();
        $config['record'] = $record;
        $dataFromModel = new VRUsers();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['route'] = route('app.users.edit', $id);


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
	    $data = request()->all();
        $record['password']= bcrypt($data['password']);

        $record = VRUsers::find($id);
        $data['user_id'] = $record->id;

        $record->update($data);

        //TODO ištraukti user roles connection where user_id = $record_id
        //TODO update with role_id

        VRConnectionsUsersRoles::updateOrCreate([
            'user_id' => $id,
            'role_id' => $data['role_id']
        ],$data);


        return redirect()->route('app.users.edit', [$record->id]);
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
        VRConnectionsUsersRoles::where('user_id', $id)->delete();

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

