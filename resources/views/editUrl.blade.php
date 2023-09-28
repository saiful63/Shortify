@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="text-center">Update Url</h4>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    <span class="text-success">{{ session('success') }}</span>
                </div>

                @endif
                
                <form action="{{ route('url_shrotner.update',$url_det->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <input type="hidden" value="{{ $url_det->id }}">
                            <input type="text" name="url" class="form-control" value={{ $url_det->url }}>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary">Update</button>
                        </div>

                    </div>



                </form>
                <div class="row">
                    <div class="col-md-3">

                    </div>

                    <div class="col-md-4 mt-2">
                        @error('url')
                         <p class="btn btn-danger text-center">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

            </div>
        </div>


    </div>



</div>
@endsection



