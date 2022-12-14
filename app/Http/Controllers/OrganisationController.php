<?php

namespace App\Http\Controllers;

use App\Jobs\OrganisationsCsvProcess;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $records = file($request->my_file);
        //removing the header
        unset($records[0]);
        //chunking the big file into 1000 smaller files
        $chunks = array_chunk($records, 1000);
        $path = public_path('temp');
        foreach ($chunks as $key => $chunk) {
            $name = "/tmp{$key}.csv";
            file_put_contents($path . $name, $chunk);
        }
        $files = glob("$path/*.csv");
        foreach ($files as $file) {
            $data = file($file);
            OrganisationsCsvProcess::dispatch($data);
            unlink($file);
        }
        return 'done';
    }
}
