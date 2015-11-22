<?php

use Illuminate\Database\Seeder;
use App\SimilarityFiles;

class SimilarityFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('similarityFiles')->delete();

    	SimilarityFiles::create([
            'append_id' => 22,
    	]);
    }
}
