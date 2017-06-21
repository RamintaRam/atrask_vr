<?php

use App\VRLanguageCodes;
use Illuminate\Database\Seeder;

class VRLanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ["name" => "Lietuvių", "id" => "lt", "language_code" =>"lt"],
            ["name" => "English", "id" => "en", "language_code" =>"en"],
            ["name" => "Русский", "id" => "ru", "language_code" => "ru"],
            ["name" => "Deutsch", "id" => "de", "language_code" =>"de"],
            ["name" => "Français", "id" => "fr", "language_code" =>"fr"],

        ];

        DB::beginTransaction();
        try {
            foreach ($list as $single) {
                $record = VRLanguageCodes::find($single['id']);
                if (!$record) {
                    VRLanguageCodes::create($single);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
        DB::commit();
    }
}