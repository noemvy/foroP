<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Dashboard', [
            'tweets' => Tweet::orderBy('id', 'desc')->get()
        ]);
    }
        /**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $file = null;
    $extension = null;
    $fileName = null;
    $path = '';

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $request->validate([ 'file' => 'required|mimes:jpg,jpeg,png,mp4' ]);
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $extension === 'mp4' ;
    }

    $tweet = new Tweet;
    $tweet->name = 'Noemi Vasquez';
    $tweet->image = 'https://i.pinimg.com/736x/c9/32/c5/c932c5b831a067a33030af2c0c7dea82.jpg';
    $tweet->handle = 'noemvy';
    $tweet->tweet = $request->input('tweet');

    if ($fileName) {
        $tweet->file = $path . $fileName;
        $tweet->is_file = $extension === 'mp4' ? true : false;
        $file->move(public_path() . $path, $fileName);
    }

    $locations = [
        'Panamá Oeste',
        'La Chorrera, Guadalupe',
        'La Chorrera, La Pesa',
        'La Valdeza',
        'Valle bonito',
        'Capira, El espino',
        'El Nazareno',
        'Barriada Villa Real'
    ];

    $tweet->likes = rand(5, 500);
    $tweet->comments = rand(5, 500);
    $tweet->date = Carbon::now();
    $tweet->tag = "basura";
    $tweet->location = $locations[array_rand($locations)];

    $tweet->save();

    return redirect()->route('dashboard');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tweet = Tweet::find($id);

        if (!is_null($tweet->file) && file_exists(public_path() . $tweet->file)) {
            unlink(public_path() . $tweet->file);
        }

        $tweet->delete();

        return redirect()->route('dashboard');
    }
}
