@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Invite Team Member') }}</div>

                <div class="card-body">
                    Invitation Link: 
                    <br/>

                    {{ route('register') }}?organization_id={{ auth()->user()->organization_id ?  auth()->user()->organization_id: auth()->id()}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection