@extends('layouts.admin') 
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Team</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
            <div data-spy="scroll" data-offset="0">
                @foreach($teams as $team)
                <tr>
                    <th scope="row">{{$team->id}}</th>  
                    <td>{{ $team->teamname }}</td>
                    <td>
                        @if ($team->status == 1)
                            <a href="{{ url('admin-teams-deactivate')}}/{{$team->id}}" class="btn btn-danger">Deactivate</a>
                        @else
                            <a href="{{ url('admin-teams-activate')}}/{{$team->id}}" class="btn btn-warning">Activate</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </div>
     
    </tbody>
</table>
@endsection