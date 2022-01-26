<?php

namespace App\Http\Controllers\Computer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Computer;
use PDF;
use App\Exports\ComputerExport;
use App\Models\Location;
use Maatwebsite\Excel\Facades\Excel;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computer = Computer::orderBy('created_at', 'DESC')->get();
        return view('computer.index', compact('computer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = Location::all();
        $computer = Computer::orderBy('created_at','DESC')->get()->first();
        if ($computer == null) {
            $id = 0;
            $row = $id+1;
            $nomor = str_pad($row, 3, "0", STR_PAD_LEFT);
        }else {
            $id = $computer->id;
            $row = $id+1;
            $nomor = str_pad($row, 3, "0", STR_PAD_LEFT);
        }
        
        return view('computer.create', compact('location','nomor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no' => 'required',
            'procesor' => 'required',
            'location' => 'required|integer',
            'memory' => 'required|integer',
            'harddisk' => 'required',
            'vga' => 'required',
            'condition' => 'required',
            'network' => 'required',
            'monitor' => 'required',
            'mouse' => 'required',
            'keyboard' => 'required',
            'type' => 'required',
            'keyboard' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $network = $request->input('network') ;
        $network = implode(",", $request['network']);
        $condition = $request->input('condition');

        $computer = Computer::create([
            'no' => $request->no,
            'location_id' => $request->location,
            'procesor' => $request->procesor,
            'memory' => $request->memory,
            'harddisk' => $request->harddisk,
            'vga' => $request->vga,
            'condition' => $request->condition,
            'network' => $network,
            'monitor' => $request->monitor,
            'mouse' => $request->mouse,
            'keyboard' => $request->keyboard,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        if($request->hasfile(['image'])){
            $request->file(['image'])->move('computers/',$request->file(['image'])->getClientOriginalName());
            $computer->image = $request->file(['image'])->getClientOriginalName();
            $computer->save();
        }

        return redirect(route('computer.index'))->with('insert',"sukses");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $computer = Computer::find($id);
        $pdf = PDF::loadview('computer.cetak',['computer'=>$computer]);
        $pdf->setPaper('f4', 'potrait');
	    return $pdf->stream();
    }

    public function print()
    {
        $computer = Computer::all();
        $pdf = PDF::loadview('computer.print',['computer'=>$computer]);
        $pdf->setPaper('f4', 'potrait');
	    return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $computer = Computer::find($id);
        $location = Location::all();
        return view('computer.edit', compact('computer','location'));
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
        $this->validate($request, [
            'no' => 'required',
            'procesor' => 'required',
            'location' => 'required|integer',
            'memory' => 'required|integer',
            'harddisk' => 'required',
            'vga' => 'required',
            'condition' => 'required',
            'network' => 'required',
            'monitor' => 'required',
            'mouse' => 'required',
            'keyboard' => 'required',
            'type' => 'required',
            'keyboard' => 'required',
            'image' => 'image|mimes:png,jpeg,jpg' 
        ]);

        // $network = $request->input('network') ;
        $network = implode(",", $request['network']);
        $condition = $request->input('condition');

        $computer = Computer::find($id);

        $computer->update([
            'no' => $request->no,
            'location_id' => $request->location,
            'procesor' => $request->procesor,
            'memory' => $request->memory,
            'harddisk' => $request->harddisk,
            'vga' => $request->vga,
            'condition' => $request->condition,
            'network' => $network,
            'monitor' => $request->monitor,
            'mouse' => $request->mouse,
            'keyboard' => $request->keyboard,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        if($request->hasfile(['image'])){
            $request->file(['image'])->move('computers/',$request->file(['image'])->getClientOriginalName());
            $computer->image = $request->file(['image'])->getClientOriginalName();
            $computer->save();
        }

        return redirect(route('computer.index'))->with('update',"sukses");
    }

    public function export() 
    {
        return Excel::download(new ComputerExport, 'Data-Computer.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $computer = Computer::find($id);
        \DB::statement("ALTER TABLE computers AUTO_INCREMENT = $id;");
        $computer->delete();
        return redirect()->back()->with('delete',"sukses"); 
    }
}
