<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FileUploadController extends Controller
{
    protected $files = ['file-1.json', 'file-2.json'];

    protected function getFilesContent()
    {
        $locations = [];

        foreach ($this->files as $key => $file) {
            $fileContent = File::json(public_path("/files/{$file}"));

            foreach ($fileContent as $key => $location) {
                $location['category_id'] = auth()->user()
                    ->categories()
                    ->firstOrCreate(['name' => $location['category']])->id;
                unset($location['category']);
                unset($location['id']);

                $location['isFav'] =  $location['isFav'] ? 1 : 0;

                $location['user_id'] = auth()->id();
                $locations[] = $location;
            }
        }

        return $locations;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $content = $this->getFilesContent();

        DB::table('locations')->insert($content);

        return response()->json(['status' => 'success', 'message' => 'Files uploaded successfully.'], 200);
    }
}
