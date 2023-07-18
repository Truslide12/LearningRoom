@extends('_layouts.main')

@section('content')
<div class="container">
    <div class="row m-5">
        <div class="col-6 col-sm-6">
            <div class="row">
                <h3 class="mb-5">Sorting with raw Laravel/HTML</h3>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table id="results" class="table table-hover col-sm-12 w-auto">
                        <thead class="thead-dark">
                            <tr>
                                <th><h5>First Name</h5></th>
                                <th><h5>Last Name</h5></th>
                                <!-- <th>Ranking</th>
                                <th></th> -->
                            </tr>
                        </thead>
                        <tbody class="tablecontents">
                            @if($employees->count())
                                @foreach($employees as $key => $employee)
                                <tr class="rankable" data-id="{{$employee->id}}">
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <!-- <td>{{$employee->lastName}}</td> -->
                                </tr>
                                @endforeach
                            @else
                                <tr>You need to hire someone!!</tr>
                            @endif 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>