@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="form-group ">
                        {{ $customer->name }}
                    </div>
                    @auth
                    <span class="float-right"><a class="btn btn-outline-primary" href="{{ route('customer.edit', $customer->id) }}">Edit</a></span>
                    @endauth
                
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-9 justify-content-center">

                        

                        <div class="form-group">
                            <p class="  " >Device Id : <small class="  ">{{ $customer->deviceNumber }}</small></p> 
                        </div>

                        <div class="form-group">
                            <p class="  ">This month Deposite : <small class="  ">{{ $customer->deposite ." birr"}}</small></p> 
                        </div class="form-group">


                        <div class="form-group">
                            <p class=" ">Balance</p>
                            <div class="progress">
                                <div class="progress-bar {{ ($remainingAmount) < 25 ? "bg-danger": "bg-primary" }}" role="progressbar" style="width: {{ $remainingAmount-$usedAmount }}%;" aria-valuenow="{{ $remainingAmount }}" aria-valuemin="0" aria-valuemax="100">{{ $remainingAmount-$usedAmount . " birr" }}</div>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <p class=" ">Consumption</p>
                            <div class="progress">
                                <div class="progress-bar {{ (($remainingConsumption/$customer->totalConsumption)*100) < 25 ? "bg-danger": "bg-success" }}" role="progressbar" style="width: {{ ($remainingConsumption/$customer->totalConsumption)*100 }}%;" aria-valuenow="{{ $remainingConsumption }}" aria-valuemin="0" aria-valuemax="{{ floor($customer->totalConsumption) }}">{{ $remainingConsumption . " Metric cube"}}</div>
                            </div>
                        </div> --}}





                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
