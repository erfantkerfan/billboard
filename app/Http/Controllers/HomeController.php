<?php

namespace App\Http\Controllers;

use App\Config;
use App\User;
use Illuminate\Http\Request;
use App\Slider;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function index()
    {
        $sliders = Slider::all();
        $users = User::all();
        $configs = Config::all();
        return view('home')->with(['sliders'=>$sliders,'users'=>$users,'configs'=>$configs]);
    }

    public function slider()
    {
        $sliders = Slider::all();
        $refresh = 0;
//        dd(Config::where('name','زمان هر اسلاید')->first());
        $time = Config::where('name','زمان هر اسلاید')->first()->attribute;
        foreach ($sliders as $slider){
            $refresh = $refresh + ($slider->files)*$time;
        }
        $refresh =$refresh+2;
        return view('slider')->with(['sliders'=>$sliders,'refresh'=>$refresh]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'body' => 'nullable|string',
            'head' => 'nullable|string',
            'files' => 'required',
            'files.*' => 'image|mimes:jpeg',
        ]);

        $count = 0;
        if ($request->hasFile('files')) {
            $count = count($_FILES['files']['tmp_name']);
        }


        $slider = new Slider(array(
            'name' => $request['name'],
            'body' => $request['body'],
            'head' => $request['head'],
            'files' => $count,
        ));

        $slider->save();

        if($count!=0)
        {
            $files = $request->file('files');
            $i =0;
            foreach ($files as $file) {
                $i++;
                $file->move(public_path('image/slider/'.$slider->id.'/'), $i.'.jpg');
            }
        }

        return back();
    }

    public function delete(Request $request)
    {
        $slider = Slider::FindOrFail($request->id);
        $dir_name = public_path('image/slider/'.$slider->id.'/');
        try {
            array_map('unlink', glob("$dir_name/*.*"));
            rmdir($dir_name);
        }
        finally {
            $slider -> delete();
            return back();
        }
    }
}
