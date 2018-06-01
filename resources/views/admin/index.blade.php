@extends('layouts.admin')

@section('content')
<div class="continer">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Userid</th>
                <th scope="col">User names</th>
                <th scope="col">User email</th>
                <th scope="col">Bet Id</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
                <div data-spy="scroll" data-offset="0">
                    @foreach($bets as $bet)
                        <tr>
                            <td>{{$bet->user->id}}</td>
                            <td>{{$bet->user->name}}</td>
                            <td>{{$bet->user->email}}</td>
                            <td>{{$bet->id}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$bet->id}}">
                                  More...
                                </button>
                            </td>
                    
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{$bet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle{{$bet->id}}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle{{$bet->id}}">Selected Teams</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                        <ul>
                                            @foreach($bet->Betitems as $betitem)
                                                <li>
                                                    {{$betitem->teams->teamname}} at {{$betitem->amounts}}
                                                </li>
                                                
                                            @endforeach
                                                <li>
                                                    Total price : {{$bet->totals}}
                                                </li>
                                        </ul>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </tr>
                    @endforeach
                </div>
        </tbody>
    </table>
</div>
@endsection
