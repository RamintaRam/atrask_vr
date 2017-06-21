<?php

use App\VRCategories;
use App\VRCategoriesTranslations;
use Illuminate\Database\Seeder;

class VRCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ["id" => "vr_rooms"],
        ];

        $translations = [
            ["record_id" => "vr_rooms", "name" => "VR kambariai", "language_code" => "LT"],
            ["record_id" => "vr_rooms", "name" => "VR rooms", "language_code" => "EN"],
            ["record_id" => "vr_rooms", "name" => "VR chambres", "language_code" => "FR"],
            ["record_id" => "vr_rooms", "name" => "BP комнаты", "language_code" => "RU"],
            ["record_id" => "vr_rooms", "name" => "VR räume", "language_code" => "DE"],
        ];

        DB::beginTransaction();
        try {
            foreach ($categories as $single) {
                $record = VRCategories::find($single['id']);
                if (!$record) {
                    VRCategories::create($single);
                }
            }

//   sąlyga: ieškoti, ar yra pas mus yra toks record_ir, ir ar yra toks language_code. Jeigu ne, sukurti:
            foreach ($translations as $single) {
                $record = VRCategoriesTranslations::where('record_id', $single['record_id'])
                    ->where('language_code', $single['language_code'])
                    ->first();

                if (!$record) {
                    VRCategoriesTranslations::create($single);
                }
            }


        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
        DB::commit();
    }

}
