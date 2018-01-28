<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKindsRequest;
use App\Kind;
use Illuminate\Http\Request;

class KindsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kinds = Kind::paginate(5);//all();
        return view('kinds.index', compact('kinds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kinds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKindsRequest $request)
    {
        Kind::create($request->all());
        return redirect()->route('kinds.index')->with(['message' => 'Kind added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kind_of_animal = Kind::findOrFail($id);
        return view('kinds.edit', compact('kind_of_animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreKindsRequest $request, $id)
    {
        $kind_of_animal = Kind::findOrFail($id);
        $kind_of_animal->update($request->all());
        return redirect()->route('kinds.index')->with(['message' => 'Kind updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kind_of_animal = Kind::findOrFail($id);
        $kind_of_animal->delete();
        return redirect()->route('kinds.index')->with(['message' => 'Kind deleted successfully']);
    }
}
