@extends('layouts.admin')
@section('title','Patient History')
@section('dash','Patient History')
@section('content')
    <div class="row" >
        <div class="col-md-8" style="margin: auto;">
            <div class="card" style="width:120%; margin-left: -40px;" >
                <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                        <i class="material-icons">description</i>
                    </div>
                    <h4 class="card-title">Patient's Records </h4>
                    <br>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Analysis Name</th>
                            <th>Date</th>
                            <th>Doctor Name</th>
                            <th>Actions</th>

                        </tr>


                        </thead>
                        <tbody>

                        @isset($analysis)
                            @foreach($analysis as $req)
                                <tr>
                                <td>{{$req->id}}</td>
                                <td>{{$req->analysis[0]->analysis_name}}</td>
                                <td>{{$req->time}}</td>
                                <td>{{$req->doctor[0]->name}}</td>
                                <td>###</td>
                                </tr>
                            @endforeach
                        @endisset

                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
