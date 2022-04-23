<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\DonorWall;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DonorWallController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function index() {
        $donor_walls = DonorWall::get();
        $donor_wall = [];
        foreach($donor_walls as $wall) {
            $donor_wall[$wall['name']] = $wall['url'];
        }

        return view('donor_wall', compact('donor_wall'));
    }

    public function upload(Request $request) {
        

        $ext = $request->file('file')->getClientOriginalExtension();
        $file_name = Str::random(40) . '.' . $ext;
        
        $request->file('file')->storeAs(
            'public/donor_wall', $file_name
        );

        $name = $request->input('name');
        $url = env('APP_URL') . '/storage/donor_wall/' . $file_name;

        $donor_wall = DonorWall::where('name', $name) ->first();
        if ($donor_wall) {
            $donor_wall->url = $url;
            $donor_wall->save();
        } else {
            $donor_wall = new DonorWall;
            $donor_wall->name = $name;
            $donor_wall->url = $url;
            $donor_wall->save();
        }


        return response()->json(['success' => true, 'url' => $url]);
    }

    public function donor_wall(Request $request) {
        $donor_walls = DonorWall::get();
        $donor_wall = [];
        foreach($donor_walls as $wall) {
            $donor_wall[$wall['name']] = $wall['url'];
        }

        return response()->json(['success' => true, 'data' => $donor_wall]);
    }

    
}
