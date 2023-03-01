@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mt-3 mb-3">
                            <a href="/show_template"> <button class="btn btn-primary">Show All Templates </button></a>
                        </div>

                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif

                        <h5>Add an Email Template</h5>
                        <form method="POST" action="/add_template">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Template Id</label>
                                <input type="text" required name="templateid" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Template</label>
                                <textarea name="template" required class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection