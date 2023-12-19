@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Join Organization') }}</div>

                <div class="card-body">
                    <form action="{{ route('join.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="organization_id" value="{{ $organization->id }}">

                        <h4>Do you want to join organization  <strong>{{ $organization->name }} ?</strong> </h4>
                        
                        <button type="submit" class="btn btn-primary">Yes, Join</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection