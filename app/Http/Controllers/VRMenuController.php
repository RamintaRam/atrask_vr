<?php namespace App\Http\Controllers;

use App\VRCategories;
use App\VRMenu;
use App\VRMenuTranslations;
use Illuminate\Routing\Controller;

class VRMenuController extends Controller
{

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
        $config['new'] = 'app.menu.create';
        $config['edit'] = 'app.menu.edit';
        $config['delete'] = 'app.menu.delete';


        return view('admin.list', $config);

    }

    /**
     * Show the form for creating a new resource.
     * GET /vrmenu/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        $config = $this->getFormData();
        $dataFromModel = new VRMenu();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['route'] = route('app.menu.create');

        //getFormData() funkcija apraryta apacioje.

        return view('admin.create-form', $config);

    }

    /**
     * Store a newly created resource in storage.
     * POST /vrmenu
     *
     * @return Response
     */
    public function adminStore()
    {
        $data = request()->all();

        $record = VRMenu::create($data);
        $data['record_id'] = $record->id;
        VRMenuTranslations::create($data);

        return redirect()->route('app.menu.edit', [$record->id]);
    }

    /**
     * Display the specified resource.
     * GET /vrmenu/{id}
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
     * GET /vrmenu/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function adminEdit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrmenu/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminUpdate($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /vrmenu/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminDestroy($id)
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
        $config['fields'][] =
            [
                "type" => "singleLine",
                "key" => "name",
            ];

        $config['fields'][] =
            [
                "type" => "singleLine",
                "key" => "url",
            ];

        $config['fields'][] =
            [
                "type" => "checkBox",
                "key" => '',
                "option" => [[
                    'name' => 'new_window',
                    'value' => 1,
                    'title' => trans("app.newWindow"),
                ]]
            ];

        $config['fields'][] =
            [
                "type" => "singleLine",
                "key" => "sequence",
                "option" => [
                    'key' => 'value',
                ]
            ];

        $config['fields'][] =
            [
                "type" => "dropDown",
                "key" => "vr_parent_id",
                "option" => VRMenuTranslations::pluck('name', 'record_id'),

            ];

        return $config;
    }

}