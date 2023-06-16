<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Validation\Rule;

class ImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $filePath = 'user/' . $image->getClientOriginalName();
        Storage::disk('gcs')->put($filePath, file_get_contents($image), 'public');
        $imageUrl = env('GCS_STORAGE_API_URI').'/'.env('GCS_BUCKET').'/'.$filePath;

        // Simpan URL gambar ke dalam database
        $history = new History();
        $history->user_id = $request->user()->id;
        $history->url_image = $imageUrl;
        $history->save();

//      $this->uploadFile($request->file('file'), 'ImageHasil');
        return response()->json([
            'status_code' => 201,
            'success' => true,
            'error' => false,
            'success_message' => 'Image has been uploaded successfully',
            'history_id' => $history->id,
            'image_url' => $imageUrl
        ]);
    }

    private function uploadFile(UploadedFile $file, $folder = null, $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        return $file->storeAs(
            $folder,
            $name . "." . $file->getClientOriginalExtension(),
            'gcs'
        );
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'jenis_plastik' => 'required',
        'masa_pakai' => 'required',
        'tingkat_bahaya' => 'required',
        'detail_jenis_plastik' => 'required',
        'detail_masa_pakai' => 'required',
        'detail_tingkat_bahaya' => 'required',
    ]);

    $history = History::find($id);
    if(!$history) {
        return response()->json([
            'status_code' => 404,
            'success' => false,
            'error' => true,
            'error_message' => 'History not found'
        ]);
    }

    // Memeriksa apakah pengguna yang dikaitkan dengan history adalah pengguna yang mengirim permintaan
    if ($request->user()->id !== $history->user_id) {
        return response()->json([
            'status_code' => 403,
            'success' => false,
            'error' => true,
            'error_message' => 'You are not authorized to update this history'
        ]);
    }

    tap($history)->update($request->except('history_id'));

    return response()->json([
        'status_code' => 201,
        'success' => true,
        'error' => false,
        'success_message' => 'History has been updated successfully',
        'data' => $history
    ]);
}


public function index(Request $request, $user_id)
{
    $history = History::where('user_id', $user_id)->get();

    if (!$history->isEmpty()) {
        return response()->json([
            'status_code' => 200,
            'success' => true,
            'error' => false,
            'success_message' => 'Histories found',
            'histories' => $history
        ]);
    }

    return response()->json([
        'status_code' => 404,
        'success' => false,
        'error' => true,
        'error_message' => 'History with user ID ' . $user_id . ' not found',
        'histories' => $history
    ]);
}
}