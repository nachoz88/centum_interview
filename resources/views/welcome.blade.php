@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Team</th>
                          <th scope="col">Select</th>
                        </tr>
                      </thead>
                      <tbody>
                        <form action="{{action('BetsController@store')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div data-spy="scroll" data-offset="0">
                              @foreach($teams as $team)
                                <tr>
                                  <th scope="row">{{$team->id}}</th>
                                  <td>{{ $team->teamname }}</td>
                                    <td>
                                      <input type="checkbox" name="teams[]" value="{{$team->id}}">
                                    </td>
                                </tr>
                                @endforeach
                            </div>
                            <input type="submit" class="btn btn-primary" value="Place your bet">
                        </form>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
