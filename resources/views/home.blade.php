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
                              <td>id</td>
                              <td>title</td>
                              <td>body</td>
                              <td>Actions</td>
                          </tr>
                      </thead>
                      <tbody id="data">
                       
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
   
            $.ajax({
             type: "GET",
             dataType: "json",
             url: "http://localhost:8000/api/news",
             success: function(data){
                $.each(data, function(i, item) {

                  $('#data').append($('<tr>').append(
                      $('<td>').text(item.id),
                      $('<td>').text(item.title),
                      $('<td>').text(item.body),
                      $('<td>').append($('<form action="http://localhost:8000/news/'+item.id+'" method="post">').append(
                                  $(' @csrf'),
                                  $('<input type="hidden" name="_method" value="DELETE" >'),
                                  $('<input type="submit" value="delete " ></form>')
                                  ), $('<a href="http://localhost:8000/news/show/'+item.id+'">show</a>'))
                  )
                  );
              });
             //$('#data').html(dta);
              }
          
          
          });
</script>
@endsection