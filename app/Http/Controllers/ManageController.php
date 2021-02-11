<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Stock;
use App\Item;
use App\Facture;
use Carbon\Carbon;
use PDF;
use Auth;
class ManageController extends Controller
{
    public function admindashboard()
    {
        return view('admin.dashboard');
    }
    public function factinit()
    {
  
          $factures = DB::table('factures')->where('status_a','=',0)->get();
          $items = DB::table('items')->get();  


        return response()->json(array('factures'=>$factures,'items'=>$items));
    }
    public function reginit()
    {
  
          $factures = DB::table('factures')->where('status_r','=',0)->get();
          $items = DB::table('items')->get();  


        return response()->json(array('factures'=>$factures,'items'=>$items));
    }

    public function depinit()
    {
  
          $factures = DB::table('factures')->where('status_d','=',0)->where('status_a','=',0)->get();
          $items = DB::table('items')->get();  


        return response()->json(array('factures'=>$factures,'items'=>$items));
    }
    public function depotdashboard()
    {
        return view('depot.dashboard');
    }

    public function reglementdashboard()
    {
        return view('reglement.dashboard');
    }
 
    public function histfacture()
    {
        $factures = DB::table('factures')->where('status_a','=','1')->get();
        $items = DB::table('items')->get();  
        return view('admin.hist_facture')->with(compact('factures','items'));
    }
//
//
//
//
//
//Stock
//
//
//
//

    public function indexs()
    {
        $stocks = DB::table('stocks')->get();
        return view('admin.datastock')->with(compact('stocks'));
    }
    public function indexsdepot()
    {
        $stocks = DB::table('stocks')->get();
        return view('depot.datastock')->with(compact('stocks'));
    }
    public function indexstock()
    {
        $stocks = DB::table('stocks')->get();
        return $stocks->toJson(JSON_PRETTY_PRINT);
    }
    public function stockl()
    {
        return view('admin.liststock');
    }
    public function stocklist()
    {
      $stocks = DB::table('stocks')->get();
      $factures = DB::table('factures')->get();
      $items = DB::table('items')->get();  

      return response()->json(array('factures'=>$factures,'stocks'=>$stocks,'items'=>$items));
        }
    public function addStock(Request $request)
    {
      
        $data = $request->all();
        $rules = array(
          'article' => 'required',
          'quantity' => 'required',
        );
      $validator = Validator::make ( Input::all(), $rules);
      if ($validator->fails())
      return Response::json( $validator->getMessageBag()->toarray(),400);
    
      else {
        $stocks = new Stock;
        $stocks->article = $data["article"];
        $stocks->quantity = $data["quantity"];
        $stocks->casse = $data["casse"];
        $stocks->save();
        return $stocks->toJson(JSON_PRETTY_PRINT);
      }
    }
    public function editStock(request $request){
      $data = $request->all();
      $stocks = Stock::find ($request->id);
      $stocks->article = $request->article;
      $stocks->quantity = $request->quantity;
      $stocks->save();
      return $stocks->toJson(JSON_PRETTY_PRINT);
      }
      
    public function deleteStock(request $request){
        $stocks = Stock::find ($request->id)->delete();
        return response()->json();
    }
//
//
//
//
//Items
//
//
//
//

    public function indexi(){
        $items = Item::paginate(4);
        return view('admin.add_facture',compact('items'));
      }
//
//
//
//
//Facture
//
//
//
//
      public function indexf(){
        $factures = DB::table('factures')->select('N_facture')->orderBy('N_facture', 'desc')->first();
        $num = $factures->N_facture;
        $num += 1 ;
        return view('admin.add_facture',compact('num'));
      }
      public function indexfacture(Request $request){
        $items = DB::table('items')->where('N_facture_i','=',$request->n_facture)->get();
        return $items->toJson(JSON_PRETTY_PRINT);
        }
      public function addItem(Request $request){
         
          $data = $request->all();
          $rules = array(
            'article_i' => 'required',
            'quantity_i' => 'required',
          );
        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
        return Response::json( $validator->getMessageBag()->toarray(),400);
      
        else {
          $items = new Item;
          $facture = DB::table('factures')->orderBy('N_facture', 'desc')->first();
          $items->N_facture_i = $facture->N_facture + 1;
          $items->article_i = $data["article_i"];
          $items->quantity_i = $data["quantity_i"];
          $items->prix_i = $data["prix_i"];
          $items->save();
          return $items->toJson(JSON_PRETTY_PRINT);
        }
      }
      
      public function editItem(request $request){
        $data = $request->all();
        $items = Item::find ($request->id);
        $items->article_i = $request->article_i;
        $items->quantity_i = $request->quantity_i;
        $items->prix_i = $request->prix_i;
        $items->save();
        return $items->toJson(JSON_PRETTY_PRINT);
      }
      
      public function deleteItem(request $request){
        $items = Item::find ($request->id)->delete();
        return response()->json();
      }
  
      public function addFacture(Request $request){   
        $data = $request->all();
        $factures = new Facture;
        $factures->N_client = $data['nom'];
        $factures->source_facture = $data['source'];
        $factures->adress = $data['adress'];
        $factures->p_num = $data['mobile'];
        $factures->net_payer = $data['np'];
        $factures->avance = $data['av'];
        $factures->tva = $data['tva'];
        $factures->type_caution = $data['tc'];
        $factures->remise = $data['re'];
        if ($data['rem'] == null){
          $factures->remarque = " ";
        }
        else{
        $factures->remarque = $data['rem'];
        }
        $factures->total = $data['total'];
        $factures->date_debut = $data['date_d'];
        $factures->date_fin = $data['date_f'];
        $factures->save();
        return redirect('admin/dashboard');
      }
      public function updateFacture(Request $request){   
        $data = $request->all();
        if ($data['rem'] == null){
          $factures = DB::table('factures')->where('N_facture','=',$data['id'])->update(['N_client' => $data['nom'], 'adress' => $data['adress'], 'p_num' => $data['mobile'] ,'source_facture' => $data['source'], 'total' => $data['total'],  'net_payer' => $data['np'] ,'avance' => $data['av'] ,'avance2' => $data['av2'] , 'remise' => $data['re'], 'tva' => $data['tva']  , 'type_caution' => $data['tc'] ,'remarque' => ' ', 'date_debut' => $data['date_d'], 'date_fin' => $data['date_f'] ]);
        }
        else{
          $factures = DB::table('factures')->where('N_facture','=',$data['id'])->update(['N_client' => $data['nom'], 'adress' => $data['adress'], 'p_num' => $data['mobile'] ,'source_facture' => $data['source'], 'total' => $data['total'],  'net_payer' => $data['np'] ,'avance' => $data['av'] ,'avance2' => $data['av2'] , 'remise' => $data['re'], 'tva' => $data['tva']  , 'type_caution' => $data['tc'] ,'remarque' => $data['rem'] , 'date_debut' => $data['date_d'], 'date_fin' => $data['date_f'] ]);
        }
        return redirect('admin/dashboard');
      }
      public function editFacture($id){   
        $num = $id;
        $factures = DB::table('factures')->where('N_facture','=',$id)->first();
        $n_client = $factures->N_client;
        $adress = $factures->adress;
        $p_num = $factures->p_num;
        $s_f = $factures->source_facture;
        $n_p = $factures->net_payer;
        $av1 = $factures->avance;
        $av2 = $factures->avance2;
        $remise = $factures->remise;
        $tva = $factures->tva;
        $tc = $factures->type_caution;
        $remarque = $factures->remarque;
        $dd = $factures->date_debut;
        $df = $factures->date_fin;
        return view('admin.edit_facture',compact('num','n_client','adress','p_num','s_f','n_p','av1','av2','remise','tva','tc','remarque','dd','df'));
      }

      public function deleteFacture(request $request){
        $factures = DB::table('factures')->where('N_facture','=',$request->id)->delete();
        $items = DB::table('items')->where('N_facture_i','=',$request->id)->delete();
        return response()->json();
      }

      public function avanceFacture(request $request){
          $data = $request->all();
          $factures = DB::table('factures')->where('N_facture','=',$request->id)->update(['avance2' => $request->avance2 ]);
          return response()->json();
      }   

      public function validFacture(request $request){
          $data = $request->all();
          if(Auth::user()->hasAnyRole('admin')){
            $factures = DB::table('factures')->where('N_facture','=',$request->id)->update(['status_a' => '1' ]);
          }
          else if(Auth::user()->hasAnyRole('depot')){
            $factures = DB::table('factures')->where('N_facture','=',$request->id)->update(['status_d' => '1' ]);
          }
          else{
            $factures = DB::table('factures')->where('N_facture','=',$request->id)->update(['status_r' => '1' ]);
          }
        
        return response()->json();
      }
        
      public function getPDF($id){
        $factures = DB::table('factures')->where('N_facture','=',$id)->first();
        $items = DB::table('items')->where('N_facture_i','=',$id)->get();
        if(Auth::user()->hasAnyRole('admin')){
          if($factures->tva == 1){
            $pdf = PDF::loadHTML('pdf+tva.facture', ['factures'=>$factures] , ['items'=>$items]);
          }
          else{
            $pdf = PDF::loadHTML('pdf-tva.facture', ['factures'=>$factures] , ['items'=>$items]);
          }
        } 
        else{
          $pdf = PDF::loadHTML('pdf.facture', ['factures'=>$factures] , ['items'=>$items]);
        }
        return $pdf->stream('facture.pdf');
      }
      
}

