<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qc_checksheet;
use Carbon\Carbon;
use App\Models\qc_cheksheet;
use App\Models\rphs;
use Illuminate\Support\Facades\Auth;
// use App\Models\rphs;
use Illuminate\Support\Facades\Session;

class qc_checkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //return 'Hi';
    //     $data = qc_cheksheet::paginate();
    //    // return view('manpower.index')->with('data', $data);
    //    return view('qc_checksheet.index_qc')->with('data', $data);
    // }

    // Method to show the edit form
    public function edit($id)
    {
        $data = qc_cheksheet::where('product_name', $id)->first();
        $data = $this->formatTimeFields($data);
        return view('qc_checksheet.edit')->with('data', $data);
    }
    // Function to format time fields
    function formatTimeFields($data)
    {
        if ($data) {
            $data->start_time_tapping = Carbon::parse($data->start_time_tapping)->format('H:i');
            $data->start_time_pouring = Carbon::parse($data->start_time_pouring)->format('H:i');
            $data->n1_tpm = Carbon::parse($data->n1_tpm)->format('H:i');
            $data->n2_tpm = Carbon::parse($data->n2_tpm)->format('H:i');
            $data->n3_tpm = Carbon::parse($data->n3_tpm)->format('H:i');
            $data->time_finish_pouring = Carbon::parse($data->time_finish_pouring)->format('H:i');
        }
        return $data;
    }



    // Method to show the index page
    public function index()
    {
        $data = qc_cheksheet::paginate();

        // Format the time fields for each item in the collection
        foreach ($data as $item) {
            $item = $this->formatTimeFields($item);
        }

        return view('qc_checksheet.index_qc')->with('data', $data);
        //return view('layout.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /*
        $options = [
            'Value 1' => 'Option 1',
            'Value 2' => 'Option 2',
            'Value 3' => 'Option 3',
        ];
        $options2 = [
            'Value 1' => 'Option 3',
            'Value 2' => 'Option 4',
            'Value 3' => 'Option 5',
        ];
        */
        $today = Carbon::today()->format('Y-m-d');
        // $options = qc_cheksheet::table('rphs')->pluck('partname', 'id')->toArray();
        $options = rphs::whereRaw("CONVERT(varchar, tgl_pouring, 23) = ?", [$today])
            ->pluck('partname', 'partname')
            ->toArray();

        return view('qc_checksheet.create', compact('options'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function test()
    {
        return 'Hi';
    }


    public function getProductDetails(Request $request)
    {
        $today = Carbon::today()->format('Y-m-d');
        $productName = $request->input('product_name');
        $product = rphs::where('partname', $productName)
        ->whereRaw("CONVERT(varchar, tgl_pouring, 23) = ?", [$today])
        ->first();

        if ($product) {
            return response()->json([
                'material' => $product->material,
                'qty_mould' => $product->qty_mould,
            ]);
        }

        return response()->json([
            'material' => '',
            'qty_mould' => '',
        ]);
    }


    public function store(Request $request)
    {
        //
        Session::flash('product_name', $request->product_name);
        Session::flash('no_ladle', $request->no_ladle);
        Session::flash('material', $request->material);
        Session::flash('charging', $request->charging);

        Session::flash('temp_taping', $request->temp_tapping);
        Session::flash('start_time_tapping', $request->start_tapping);
        Session::flash('reaction_time', $request->reaction_time);

        Session::flash('time_start_pouring', $request->start_pouring);
        Session::flash('temp_start_pouring', $request->temp_start_pouring);

        Session::flash('n1_tpm', $request->time_pouring_n1);
        Session::flash('n2_tpm', $request->time_pouring_n2);
        Session::flash('n3_tpm', $request->time_pouring_n3);

        Session::flash('time_finish_pouring', $request->finish_pouring);
        Session::flash('temp_finish_pouring', $request->temp_finish_pouring);
        Session::flash('pcs_mold', $request->qty_mould);

        Session::flash('fading_time', $request->fading_time);
        Session::flash('short_pour', $request->defect_short);
        Session::flash('mold_bocor', $request->mold_bocor);

        Session::flash('marubo', $request->marubo);
        Session::flash('frm', $request->frm);
        Session::flash('remark', $request->remark);

        /*
        $request->validate([
            'product_name'=>'required',
            'no_ladle'=>'required',
            'material'=>'required'
        ],[
            'noreg.required'=>'Mandatory fill Noreg',
            'noreg.unique'=>'Noreg already been taken',
            'nama.required'=>'Mandatory fill Name',
            'jabatan.required'=>'Mandatory fill Jabatan',
        ]);
        */
        $data = [

            'product_name' => $request->product_name,
            'no_ladle' => $request->no_ladle,
            'material' => $request->material,
            'charging' => $request->charging,

            'temp_taping' => $request->temp_tapping,
            'start_time_tapping' => $request->start_tapping,
            'reaction_time' => $request->reaction_time,

            'time_start_pouring' => $request->start_pouring,
            'temp_start_pouring' => $request->temp_start_pouring,

            'n1_tpm' => $request->time_pouring_n1,
            'n2_tpm' => $request->time_pouring_n2,
            'n3_tpm' => $request->time_pouring_n3,

            'time_finish_pouring' => $request->finish_pouring,
            'temp_finish_pouring' => $request->temp_finish_pouring,
            'pcs_mold' => $request->qty_mould,

            'fading_time' => $request->fading_time,
            'short_pour' => $request->defect_short,
            'mold_bocor' => $request->mold_bocor,

            'marubo' => $request->marubo,
            'frm' => $request->frm,
            'remark' => $request->remark,
            'op_pouring' => Auth::user()->name
        ];
        qc_cheksheet::create($data);
        //Session::flash('success', 'Data has been successfully saved!');
        return redirect()->to('cs')->with('success', 'Data has been successfully saved!');
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
    // public function edit($id)
    // {
    //     //
    //     $data=qc_cheksheet::where('product_name',$id)->first();

    //      // Convert the start_time_tapping to HH:MM format

    //      $data->start_time_tapping = \Carbon\Carbon::parse($data->start_time_tapping)->format('H:i');
    //      $data->start_time_pouring = \Carbon\Carbon::parse($data->start_time_pouring)->format('H:i');

    //      $data->n1_tpm = \Carbon\Carbon::parse($data->n1_tpm)->format('H:i');
    //      $data->n2_tpm = \Carbon\Carbon::parse($data->n2_tpm)->format('H:i');
    //      $data->n3_tpm = \Carbon\Carbon::parse($data->n3_tpm)->format('H:i');

    //      $data->time_finish_pouring = \Carbon\Carbon::parse($data->time_finish_pouring)->format('H:i');


    //     return view('qc_checksheet.edit')->with('data',$data);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [

            // 'product_name'=>$request->product_name,
            'no_ladle' => $request->no_ladle,
            'material' => $request->material,
            'charging' => $request->charging,

            'temp_taping' => $request->temp_tapping,
            'start_time_tapping' => $request->start_tapping,
            'reaction_time' => $request->reaction_time,

            'time_start_pouring' => $request->start_pouring,
            'temp_start_pouring' => $request->temp_start_pouring,

            'n1_tpm' => $request->time_pouring_n1,
            'n2_tpm' => $request->time_pouring_n2,
            'n3_tpm' => $request->time_pouring_n3,

            'time_finish_pouring' => $request->finish_pouring,
            'temp_finish_pouring' => $request->temp_finish_pouring,
            'pcs_mold' => $request->qty_mould,

            'fading_time' => $request->fading_time,
            'short_pour' => $request->defect_short,
            'mold_bocor' => $request->mold_bocor,

            'marubo' => $request->marubo,
            'frm' => $request->frm,
            'remark' => $request->remark
        ];
        // qc_cheksheet::create($data);
        $today = Carbon::now()->startOfDay()->format('Y-m-d H:i:s'); // Awal hari
        $endOfDay = Carbon::now()->endOfDay()->format('Y-m-d H:i:s'); // Akhir hari
        qc_cheksheet::where('product_name', $id)
            ->where('no_ladle', $request->no_ladle)
            ->whereBetween('created_at', [$today, $endOfDay])
            ->update($data);
        //Session::flash('success', 'Data has been successfully saved!');
        return redirect()->to('cs')->with('success', 'Data has been successfully saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $no_ladle = $request->input('no_ladle');
        $today = Carbon::now()->startOfDay()->format('Y-m-d H:i:s'); // Awal hari
        $endOfDay = Carbon::now()->endOfDay()->format('Y-m-d H:i:s'); // Akhir hari
        qc_cheksheet::where('product_name', $id)
            ->where('no_ladle', $no_ladle)
            ->whereBetween('created_at', [$today, $endOfDay])
            ->delete();
        return redirect()->to('cs')->with('success', 'Deleted data has been successfully saved!');
    }
}
