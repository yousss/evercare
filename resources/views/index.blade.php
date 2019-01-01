@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <legen><a href="{{route('news.create')}}">create news</a></legen>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <td>ID</td>
                              <td>title</td>
                              <td>body</td>
                              <td>Actions</td>
                          </tr>
                      </thead>
                      <tbody>
                           @if($news)
                            @foreach($news as $key => $value)
                              <tr>
                              <td>{{ $value->id }}</td>
                              <td>{{ $value->title }}</td>
                              <td>{{ $value->body }}</td>
                              <td><a href="{{route('news.destroy')}}">Remove</a></td>
                            </tr>
                            @endforeach
                          @else
                          <tr>
                            <td colspan="4">No result</td>
                          </tr>
                          @endif
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $.ajax({
   type: "GET",
   dataType: "jsonp",
   url: "http://localhost:8000/api/news",
   success: function(data){        
     console.log(data);
   }
});
</script>
@endsection
