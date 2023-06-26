<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->headers->set('Content-Type', 'multipart/form-data');
        
        if (!$request->hasFile('file')) {
            return response()->json([
                'status_code' => 422,
                'success' => false,
                'error' => true,
                'error_message' => 'Image is required'
            ]);
        }

        $image = $request->file('file');
        $currentDateTime = Carbon::now()->format('Ymd_His');
        $fileName = $currentDateTime . '_' . $image->getClientOriginalName();
        $filePath = 'user/' . $fileName;
        Storage::disk('gcs')->put($filePath, file_get_contents($image), 'public');
        $imageUrl = env('GCS_STORAGE_API_URI').'/'.env('GCS_BUCKET').'/'.$filePath;

        // Simpan URL gambar ke dalam database
        $history = new History();
        $history->user_id = $request->user()->id;
        $history->url_image = $imageUrl;
        $history->save();

        return response()->json([
            'status_code' => 201,
            'success' => true,
            'error' => false,
            'success_message' => 'Image has been uploaded successfully',
            'history_id' => $history->id,
            'image_url' => $imageUrl
        ]);
    }
}