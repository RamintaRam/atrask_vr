<?php namespace App\Http\Controllers;

use App\Models\VRUsers;
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
        $config['new'] = 'app.order.create';
        $config['edit'] = 'app.order.edit';
        $config['delete'] = 'app.order.delete';

        return view('admin.list', $config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /vrorder/create
	 *
	 * @return Response
	 */
	public function adminCreate()
	{
        $config = $this->getFormData();
        $dataFromModel = new VROrder();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['route'] = route('app.order.create');

        //getFormData() funkcija apraryta apacioje.

        return view('admin.create-form', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /vrorder
	 *
	 * @return Response
	 */
	public function adminStore()
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
	public function adminShow($id)
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
	public function adminEdit($id)
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
	public function adminUpdate($id)
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
	public function adminDestroy($id)
	{
		//
	}


    public function getFormData()
    {
//        $lang = request('language_code');
//        if ($lang == null)
//            $lang = app()->getLocale();

        $config['fields'][] = [
            "type" => "dropDown",
            "key" => "user_id",
            "option" => VRUsers::pluck('email', 'id'),
        ];

        $config['fields'][] =
            [
                "type" => "dropDown",
                "key" => "status",
                "option" => [
                    'pending'=>trans('app.pending'),
                    'canceled'=>trans('app.canceled'),
                    'aproved'=>trans('app.aproved'),
                ]

];



        return $config;
    }
}