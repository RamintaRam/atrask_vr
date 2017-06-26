<?php namespace App\Http\Controllers;

use App\Models\VRUsers;
use App\VROrder;
use App\VRPages;
use App\VRPagesTranslations;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

class VROrderController extends Controller
{

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
        $data = request()->all();

        $record = VROrder::create($data);


        return redirect()->route('app.order.edit', [$record->id]);
    }

    /**
     * Display the specified resource.
     * GET /vrorder/{id}
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $record = VROrder::find($id)->toArray();
        $config = $this->getFormData();
        $dataFromModel = new VROrder();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['route'] = route('app.order.edit', $id);

        $config['record'] = $record;

        return view('admin.create-form', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrorder/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminUpdate($id)
    {
        $data = request()->all();

        $record = VROrder::find($id);
        $record->update($data);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /vrorder/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminDestroy($id)
    {
        //
    }


    public function getVRRoomsCategories()
    {
        $p = 'vr_'.(new VRPages())->getTableName();

        $t = 'vr_'.(new VRPagesTranslations())->getTableName();

        return VRPages::where('category_id', 'vr_rooms')->join($t, "$p.id", '=', "$t.record_id")->pluck("$t.title", "$p.id");
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
                    'pending' => trans('app.pending'),
                    'canceled' => trans('app.canceled'),
                    'aproved' => trans('app.aproved'),
                ]

            ];


        $config['fields'][] =
            [
                "type" => "dropDown",
                "key" => "pages",
                "option" => $this->getVRRoomsCategories(),

            ];

        $dates = [];

        $start_date = Carbon::today();
        $end_date = Carbon::today()->addDays(14);


        for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }


        $config['fields'][] =
            [
                "type" => "dropDown",
                "key" => "time",
                "option" => $dates
            ];


        return $config;
    }

}