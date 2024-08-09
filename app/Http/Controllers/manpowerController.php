<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manpower;
use Illuminate\Support\Facades\Session;

class manpowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci))
        {

            $data = manpower::where('noreg', 'like', "%$katakunci%")
            ->orwhere('name', 'like', "%$katakunci%")
            ->orWhere('jabatan', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        }
        else
        {
            $data = manpower::paginate($jumlahbaris);
        }
        return view('manpower.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manpower.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('noreg',$request->noreg);
        Session::flash('nama',$request->nama);
        Session::flash('jabatan',$request->jabatan);
        
        $request->validate([
            'noreg'=>'required|unique:manpower,noreg',
            'nama'=>'required',
            'jabatan'=>'required'
        ],[
            'noreg.required'=>'Mandatory fill Noreg',
            'noreg.unique'=>'Noreg already been taken',
            'nama.required'=>'Mandatory fill Name',
            'jabatan.required'=>'Mandatory fill Jabatan',
        ]);
        $data = [
            'noreg'=>$request->noreg,
            'name'=>$request->nama,
            'jabatan'=>$request->jabatan,
        ];
        manpower::create($data);
        //Session::flash('success', 'Data has been successfully saved!');
        return redirect()->to('mp')->with('success', 'Data has been successfully saved!');
        //return redirect()->back();
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
        //
       // return 'Hi'.$id;
       $data=manpower::where('noreg',$id)->first();
       return view('manpower.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($id,$request);
        $request->validate([
            'nama'=>'required',
            'jabatan'=>'required'
        ],[
            'nama.required'=>'Mandatory fill Name',
            'jabatan.required'=>'Mandatory fill Jabatan',
        ]);
        $data = [
            'name'=>$request->nama,
            'jabatan'=>$request->jabatan,
        ];
        manpower::where('noreg',$id)->update($data);
        //Session::flash('success', 'Data has been successfully saved!');
        return redirect()->to('mp')->with('success', 'Edit data has been successfully saved!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        manpower::where('noreg',$id)->delete();
        return redirect()->to('mp')->with('success', 'Deleted data has been successfully saved!');
        //return 'hi'.$id;
    }
}
