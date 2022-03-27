@extends('layouts.main_layout')
@section('title'){{"Clients"}}@endsection

@section('main-content')
    <div class="row d-flex justify-content-center">
        <div class="row mt-5">
            <h4 class="text-center"> List of Clients</h4>
        </div>
        
        <div class="col-md-12 mt-5 p-5" style="border: 1px solid #ced4da;">
            @include('partials._message')
            <div class="col-12 d-flex justify-content-end">
                <a class="btn btn-primary" href="{{route('client.create')}}"> Add Client</a>
            </div>
            <div class="row">
                <table class="table table-bordered table-striped mt-5">
                    <thead>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>DOB</th>
                        <th>Nationality</th>
                        <th>Education Background</th>
                        <th>Mode of Contact</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    
                    @foreach($clients as $key=>$client)
                        <tr>
                        <td>{{$loop->iteration}}</td>                        
                        @for($i=1; $i< count($client); $i++)
                            <td>{{$client[$i]}}</td>
                        @endfor
                        <td>
                            <a href="javascript:;" class="btn btn-warning view-btn" data-id="{{$client[0]}}">View</a>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $clients->render() !!}
            </div>
        </div>
    </div>
    @include('client.view_client')
@endsection
    