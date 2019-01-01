@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <legen><a href="{{route('news.create')}}">create news</a></legen>
                <legen><a href="{{route('home')}}">show news</a></legen>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <td>id</td>
                              <td>title</td>
                              <td>body</td>
                          </tr>
                      </thead>
                      <tbody >
                       <tr id="show">
                         
                       </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
  <script type="text/javascript">
  $.ajax(
            {
                url: 'http://localhost:8000/api/news/'+ "{{$id}}",
                type: 'GET',
                dataTy0pe: "JSON",
                success: function (data)
                {
                    $('#show').append(
                      $('<td>').text(data.id),
                      $('<td>').text(data.title),
                      $('<td>').text(data.body)
                      )
              }
            });
</script>
@endsection
