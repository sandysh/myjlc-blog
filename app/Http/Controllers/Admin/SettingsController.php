<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function popularIndex()
    {
        $courses = Course::with('category')->whereActive(1)->get();
        $popular = Setting::where('key','popular')->first();
        if ($popular) {
            $popular =  json_decode($popular->value);
        }
        return view('admin.settings.popular',compact('courses','popular'));
    }

    public function popularStore(Request $request)
    {
        $keys = collect($request->popular)->keys();
        if (count($keys) % 3 !== 0) {
            return redirect()->route('settings.popular.index')->with('error','Must be multiple of 3');
        }
        $popular = DB::table('settings')->where('key','popular')->first();
        if ($popular) {
            DB::table('settings')->where('key','popular')->update(['value' => json_encode($keys)]);
        } else {
            DB::table('settings')->insert(['key' => 'popular','value' => json_encode($keys)]);
        }

        return redirect()->route('settings.popular.index')->with('success','Popular updated');
    }
}
