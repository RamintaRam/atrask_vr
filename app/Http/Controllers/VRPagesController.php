<?php namespace App\Http\Controllers;

use App\Models\VRRoles;
use App\VRCategories;
use App\VRCategoriesTranslations;
use App\VRConnectionsPagesResources;
use App\VRPages;
use App\VRPagesTranslations;
use App\Models\VRResources;
use Illuminate\Routing\Controller;

class VRPagesController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /vrpages
     *
     * @return Response
     */
    public function adminIndex()
    {
        $dataFromModel = new VRPages();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['list'] = VRPages::get()->toArray();
        $config['new'] = 'app.pages.create';
        $config['edit'] = 'app.pages.edit';
        $config['delete'] = 'app.pages.delete';

//        dd($config);

        return view('admin.list', $config);

    }

    /**
     * Show the form for creating a new resource.
     * GET /vrpages/create
     *
     * @return Response
     */
    public function adminCreate()
    {
        $config = $this->getFormData();
        $dataFromModel = new VRPages();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['route'] = route('app.pages.create');

        //getFormData() funkcija aprasyta apacioje.

        return view('admin.create-form', $config);
    }

    /**
     * Store a newly created resource in storage.
     * POST /vrpages
     *
     * @return Response
     */
    public function adminStore()
    {
        $data = request()->all();
        $resources = request()->file('file');
        $uploadFile = new VRResourcesController();
        $record = $uploadFile->upload($resources);

        $data['cover_id'] = $record->id;
        $record = VRPages::create($data);

        $data['record_id'] = $record->id;
        $data['slug'] = str_slug($data['title'], '-');
        VRPagesTranslations::create($data);

//        VRConnectionsPagesResources::create([
//            'page_id'       => $record['id'],
//            'resource_id'   => $record->id
//        ]);


        return redirect()->route('app.pages.edit', [$record->id]);
    }

    /**
     * Display the specified resource.
     * GET /vrpages/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /vrpages/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $record = VRPages::find($id);
        $record['slug'] = $record['translation']['slug'];
        $record['title'] = $record['translation']['title'];
        $record['description_short'] = $record['translation']['description_short'];
        $record['description_long'] = $record['translation']['description_long'];
        $record['language_code'] = $record['translation']['language_code'];
        $record['path'] = $record['image']['path'];

        //prisilyginam $record $record['translation'], kad atiduotų info, kokia buvo pasirinkta kuriant.


        $config = $this->getFormData();
        $dataFromModel = new VRPages();
        $config['tableName'] = $dataFromModel->getTableName();
        $config['route'] = route('app.pages.edit', $id);

        $config['record'] = $record;


        return view('admin.create-form', $config);
    }

    /**
     * Update the specified resource in storage.
     * PUT /vrpages/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminUpdate($id)
    {
        $data = request()->all();


        if (request()->file('file')) {
            $resources = request()->file('file');
            $uploadFile = new VRResourcesController();
            $record = $uploadFile->upload($resources);

            $data['cover_id'] = $record->id;
        }
        elseif(isset($data["delete"]))
        {
            $data['cover_id'] = null;
        }


        $record = VRPages::find($id);
        $record->update($data);
        $data ['record_id'] = $id;

        VRPagesTranslations::updateOrCreate([
            'record_id' => $id,
            'language_code' => $data['language_code']
        ], $data);


        return redirect(route('app.pages.edit', $record->id));
    }


    /**
     * Remove the specified resource from storage.
     * DELETE /vrpages/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function adminDestroy($id)
    {
        VRPagesTranslations::destroy(VRPagesTranslations::where('record_id', $id)->pluck('id')->toArray());

        if (VRPages::find($id)->cover_id === null)
            VRResources::find(VRPages::find($id)->cover_id)->delete();

        VRPages::destroy($id);

        return json_encode(["success" => true, "id" => $id]);
    }


    public function getFormData()
    {
        $lang = request('language_code');
        if ($lang == null)
            $lang = app()->getLocale();

        $config['fields'][] = [
            "type" => "dropDown",
            "key" => "language_code",
            "option" => getActiveLanguages(),
        ];

        $config['fields'][] =
            [
                "type" => "dropDown",
                "key" => "category_id",
                "option" => VRCategoriesTranslations::where('language_code', $lang)->pluck('name', 'record_id'),


            ];
        $config['fields'][] =
            [
                "type" => "singleLine",
                "key" => "title",
            ];


        $config['fields'][] =
            [
                "type" => "singleLine",
                "key" => "description_short",
            ];

        $config['fields'][] =
            [
                "type" => "singleLine",
                "key" => "description_long",
            ];


        $config['fields'][] =
            [
                "type" => "singleLine",
                "key" => "slug",
            ];

        $config['fields'][] =
            [
                "type" => "file",
                "key" => "cover_id",
//                "option" => VRResources::pluck('path', 'id')->toArray(),
        ];


        $config['fields'][] =
            [
                "type" => "checkBox",
                "key" => "delete",
                "option" => [[
                    "name" => "delete",
                    "value" => "true",
                    "title" => "delete photo"
                ]]
            ];


        return $config;
    }


}