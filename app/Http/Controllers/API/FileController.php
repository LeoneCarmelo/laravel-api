<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function index(){
        $files = File::with('user')->get();
        return response()->json([
            'success' => true,
            'results' => $files
        ]);
    }
}
