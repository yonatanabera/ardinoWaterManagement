@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <form action="{{ route('customer.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter full name">
                            </div>
                            <div class="form-group">
                              <label for="deviceNumber">Device Number</label>
                              <input type="text" class="form-control" id="deviceNumber" name="deviceNumber" placeholder="Enter device number">
                            </div>
                            <div class="form-group">
                                <label for="deposite">Deposite</label>
                                <input type="number" class="form-control col-6" id="deposite" name="deposite" placeholder="Enter amount">
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
