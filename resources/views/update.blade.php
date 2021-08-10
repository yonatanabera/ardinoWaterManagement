@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ "Reacharge amount" }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <form action="{{ route('customer.update', $customer->deviceNumber) }}" method="post">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                              <label for="name">Device Id: {{ $customer->deviceNumber }}</label>
                            </div>
                            <div class="form-group">
                              <label for="deviceNumber">Customer Name: {{ $customer->name }}</label>
                            </div>
                            <div class="form-group">
                                <label for="deposite">Deposite</label>
                                <input type="number" step="0.01" class="form-control col-6" id="deposite" name="deposite" placeholder="Enter amount">
                                <small id="depositeHelp" class="form-text text-muted">Amount should be in Birr. </small>
                              </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
