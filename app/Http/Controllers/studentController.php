<?php

namespace App\Http\Controllers;

use App\Http\Requests\studentRequest;
use App\Http\Resources\studentResource;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =student::latest()->paginate(5);
        return Inertia::render('Dashboard',[
            'students' => $data,
            'search' => ""
         ]);
    }

    public function search($item)
    {
        $data = student::where("name",'LIKE','%'.$item.'%')->paginate(5);
        return ['data' => $data, 'search' => $item];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('CreateStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(studentRequest $request)
    {
        $data = student::create($request->validated());
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = student::findOrFail($id)->first()->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = student::where('id',$id)->first();
        return inertia::render('EditStudent',[
            'student' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(studentRequest $request, $id)
    {
        $student = student::where('id',$id)->first();
        $student->name = $request->name;
        $student->rollno = $request->rollno;
        $student->city = $request->city;
        $student->class = $request->class;
        $student->save();
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        student::findOrFail($id)->delete();
        return redirect()->route('dashboard');
    }
}
