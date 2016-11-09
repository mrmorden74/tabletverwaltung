<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Interviewer;
use Illuminate\Http\Request;

Route::get('/', function () {
    $interviewers = Interviewer::orderBy('vorname', 'asc')->get();
    return view('interviewers', [
        'interviewers' => $interviewers
    ]);
});
Route::post('/interviewer', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'intnr' => 'required|max:8',
        'vorname' => 'required|max:20',
        'nachname' => 'required|max:20',
    ]);
    
    if($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $interviewer = new Interviewer;
    $interviewer->intnr = $request->intnr;
    $interviewer->vorname = $request->vorname;
    $interviewer->nachname = $request->nachname;
    $interviewer->save();
    
    return redirect('/');
});
Route::delete('/interviewer/{interviewer}', function (Interviewer $interviewer) {
    $interviewer->delete();

    return redirect('/');
});