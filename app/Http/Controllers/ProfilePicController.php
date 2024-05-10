<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilePicController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'file' => 'required|image|max:2048', // 2MB Max
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $path = asset('storage/' . $path);

            $user = Auth()->user();
            $user->profile_pic = $path;
            $user->save();

            return response()->json([
                'message' => 'File uploaded successfully',
                'path' => $path
            ]);
        }

        return response()->json(['message' => 'No file uploaded'], 400);

    }
}
