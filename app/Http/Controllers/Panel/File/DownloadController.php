<?php

namespace App\Http\Controllers\Panel\File;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function downloadFile($fileID)
    {
        $file = File::find($fileID);
        if (empty($file)) {

            return redirect()->back();
        }

        return Storage::download($file->path);
    }
}
