@extends('master')

@section('title')
404 Page
@endsection


@section('content')
	 <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <div class="error-template">
                <h1>Oops!</h1>
                <h2>404 Not Found</h2>
                <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
                </div>
            </div>
        </div>
    </div>
@endsection
