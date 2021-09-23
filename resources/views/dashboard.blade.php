@extends('dashboard-master')

@section('dashboard-content')
    <h4 class="text-center">Dashboard</h4>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="row text-center">

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total projects</h5>
                        <p class="card-text h1">{{ $projects->count() }}</p>
                    </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total users</h5>
                        <p class="card-text h1">{{ $users->count() }}</p>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
