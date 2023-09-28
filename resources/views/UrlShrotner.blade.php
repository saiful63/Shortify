@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="text-center">Copy and paste your large url to get small one</h4>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    <span class="text-success">{{ session('success') }}</span>
                </div>

                @endif
                <form action="{{ route('url_shrotner.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                          <span class="btn btn-primary">Logged in User : {{ Auth::user()->name }}</span>
                          <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="url" class="url_shrotner form-control" placeholder="Url here">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary">Shorten url</button>
                        </div>

                    </div>



                </form>
                <div class="row">
                    <div class="col-md-2">

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

    <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Url</th>
                    <th>Shorten url</th>
                    <th>Click count</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($urls as $url)
                @if(Auth::user()->id == $url->user_id)
                    <tr>
                        <td>{{ $url->url }}</td>
                        <td><a href="{{ route('getShrotenOne',$url->code) }}" target="_" onclick="Redirect(redirection{{ $url->code }})" id="redirection{{ $url->code }}">{{ route('getShrotenOne',$url->code) }}</a></td>
                        <td>{{ $url->count }}</td>
                        <td>
                            <div class="w-25 d-flex">
                                <a href="{{ route('url_shrotner.edit',$url->id) }}" class="btn btn-primary">Edit</a>
                                   <span class="m-2">||</span>
                                    <form action="{{ route('url_shrotner.destroy',$url->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="delData(confirm('Are you want to delete?'))">Delete</button>
                                    </form>


                            </div>


                        </td>
                    </tr>
                @endif
                @endforeach


            </tbody>
        </table>
</div>
@endsection

@push('scripts')
  <script>

    function Redirect(value){
    const href = value.getAttribute('href');
        const newTab = window.open(href, "_blank");
        setTimeout(function() {
            window.location.href="{{ route('home') }}";
            window.location.reload();
        });

     }

     function delData(result_val){
        if(result_val === false){
           event.preventDefault();
        }
     }


  </script>
@endpush


