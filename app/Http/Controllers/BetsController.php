<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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
        $teams = Teams::all();
        return view('welcome', compact('teams'));
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
        $input = $request->all();
        $initial_amount = 500;
        $total = 0;
        $tn = array();
        $teams = $input['teams'];
        for ($i = 1; $i < sizeof($teams) + 1; $i++){
            $total = $total + ($initial_amount*$i);
            $tn[$i-1] = Teams::findOrFail($teams[$i-1]);
        }
        
        $new_bet = Bets::create(['userid' => 1, 'totals' => $total]);
        if($new_bet){
            for ($i = 1; $i < sizeof($teams) + 1; $i++){
                $betitem = new BetItems();
                $betitem->amounts = $initial_amount*$i;
                $betitem->teamid = $teams[$i-1];
                $betitem->betid = $new_bet->id;
                $betitem->save();
            }
            
            // TODO : ADD EMAIL LOGIC HERE
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
