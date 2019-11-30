<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function import()
    {
        $user = auth()->user();

        # check if other file is exist
        $exist = $user->getMedia();
        foreach ($exist as $item) {
            $item->delete();
        }

        $user->addMediaFromRequest('photo')->toMediaCollection();

        return redirect()->back();
    }
}
