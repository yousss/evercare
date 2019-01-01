@extends('layouts.app')

@section('content')


<!-- if there are creation errors, they will show here -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                  <h1>Create a News</h1>
                  <form action="{{route('news.store')}}" method="post">
                    <div class="form-group">
                      <input type="text" value="" name="title" class="form-control"/>
                    </div>
                    @csrf
                    <div class="form-group">
                      <textarea name="body" class="form-control">
                        </textarea>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Çreate" />
                    </div>
                  </form>
                </div>
              </div>
            </div>


@endsection