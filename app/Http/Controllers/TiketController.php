<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Exports\TiketExport;
use Excel;

use PDF;

class TiketController extends Controller
{
    //
    public function index(){
        $tikets = Tiket::simplepaginate(5);
         return View('tiket',compact('tikets'));
    }
    public function create(){
        return view('form_tiket');
    }
    public function store(Request $request){
        $subtotal= $request->harga_tiket * $request->jumlah_nonton;
        
          if($request->jumlah_nonton > 5 && $request->jumlah_nonton <= 10){
              $discount = $request->harga_tiket * $request->jumlah_nonton * 0.1;
             

          }elseif($request->jumlah_nonton > 10){
            $discount= $request->harga_tiket * $request->jumlah_nonton * 0.2;
           
          }else{
            $discount = 0;
            
          }
         $total= $subtotal - $discount;
        Tiket::create([
            'nama'=>$request->nama,
            'tanggal'=>$request->tanggal,
            'judul_film'=>$request->judul_film,
            'harga_tiket'=>$request->harga_tiket,
            'jumlah_nonton'=>$request->jumlah_nonton,
            'subtotal'=>$subtotal,
            'diskon'=>$discount,
            'total'=>$total,
        ]);
         return redirect('/tiket');
        // dd($request);
    }
    public function update($id){
        // dd(tiket::find($id));
          $edit = tiket::find($id);
          return view ('form_tiket',compact(['edit']));
      }
      public function save_update(Request $request,$id){
          $Tiket = tiket::find($id);
  
          $Tiket-> nama= $request->nama;
          $Tiket->tanggal= $request->tanggal;
          $Tiket-> judul_film= $request->judul_film;
          $Tiket-> harga_tiket= $request->harga_tiket;
          $Tiket-> jumlah_nonton= $request->jumlah_nonton;
          $subtotal= $request->harga_tiket * $request->jumlah_nonton;
          $Tiket->subtotal = $subtotal;
          if($request->jumlah_nonton > 5 && $request->jumlah_nonton <= 10){
              $discount = $request->harga_tiket * $request->jumlah_nonton * 0.1;
              $Tiket-> diskon = $discount;

          }elseif($request->jumlah_nonton > 10){
            $discount= $request->harga_tiket * $request->jumlah_nonton * 0.2;
            $Tiket-> diskon = $discount;
          }else{
            $discount = 0;
            $Tiket->diskon=0;
          }
          $Tiket->total= $subtotal - $discount;
  
          $Tiket->save();
  
          return redirect('/tiket')->with('Success','data sudah dihapus');
      }
      //delete
    public function delete($id){
        // dd(laptop::find($id));
        $edit = tiket::find($id)->delete();
         return redirect('/tiket')->with('Success','data sudah dihapus');
    }
    public function export_pdf (){
        $tikets = Tiket::all();

    	$pdf = PDF::loadview('exports.tiket',['tikets'=>$tikets]);
    	return $pdf->download('recap-tiket-pdf.pdf');
    }
    public function export_excel(){
        return Excel::download(new TiketExport, 'tiket.xlsx');
    }
}
