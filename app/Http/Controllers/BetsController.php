<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Teams;
use App\Bets;
use App\Betitems;

class BetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $teams = Teams::where('status','1')->get();
            return view('welcome', compact('teams'));
        }else{
            return redirect('login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //myq
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $input = $request->all();

        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $initial_amount = 500;
        $total = 0;
        $tn = array();
        $teams = $input['teams'];
        for ($i = 1; $i < sizeof($teams) + 1; $i++){
            $total = $total + ($initial_amount*$i);
            $tn[$i-1] = Teams::findOrFail($teams[$i-1]);
        }
        
        $new_bet = Bets::create(['userid' => Auth::id(), 'totals' => $total]);
        if($new_bet){
            for ($i = 1; $i < sizeof($teams) + 1; $i++){
                $betitem = new BetItems();
                $betitem->amounts = $initial_amount*$i;
                $betitem->teamid = $teams[$i-1];
                $betitem->betid = $new_bet->id;
                $betitem->save();
            }
            
            // TODO : ADD EMAIL LOGIC HERE
            // $res = $client->request('POST', 'https://2f24dddb.ngrok.io', [
            //     // 'form_params' => [
            //         'betid' => $new_bet->id, 'total' => $total, 'email'=>Auth::user()->email, 'teams'=>$tn
            //     // ]
            // ]);
        }
        
        return view('receipt', compact('total','tn'));
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
        //
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
    }
}
