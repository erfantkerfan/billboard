<?php

namespace App\Http\Controllers;

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
        return view('home')->with(['sliders'=>$sliders,'users'=>$users]);
    }

    public function slider()
    {
        $sliders = Slider::all();
        return view('slider')->with(['sliders'=>$sliders]);
    }

    public function create(Request $request)
    {
        $this->Validate($request, [
            'name' => 'required|string',
            'body' => 'nullable|string',
            'head' => 'nullable|string',
            'file' => 'required|image|mimes:jpeg',
        ]);

        $slider = new Slider(array(
            'name' => $request['name'],
            'body' => $request['body'],
            'head' => $request['head'],
        ));

        $slider->save();

        $file_name = $slider->id .'.jpg';
        $request->file('file')->move(public_path('image/slider/'), $file_name);

        return back();
    }

    public function delete(Request $request)
    {
        $slider = Slider::FindOrFail($request->id);
        $file_path = public_path('image/slider/').$slider->id.'.jpg';
        unlink($file_path);
        $slider -> delete();
        return back();
    }
}
