@extends('layouts.app', ['activePage' => 'results', 'titlePage' => __('Results Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
        <div class="card">

          <div class="card-header card-header-info">
            <h4 class="card-title ">{{ __('Results') }}</h4>
            <p class="card-category"> {{ __('Here you can manage results') }}</p>
          </div>
          <div class="card-body table-responsive">
            @if (session('status'))
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>{{ session('status') }}</span>
                  </div>
                </div>
              </div>
            @endif
          <div class="row">
            <div class="col-12 text-right">
              <a href="{{ route('result.create') }}" class="btn btn-sm btn-info">{{ __('Add result') }}</a>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead class=" text-primary">
              <th>
                  {{ __('Result') }}
              </th> 
              <th class="text-right">
                {{ __('Actions') }}
              </th>
            </thead>
            <tbody>

              @foreach($results as $result)
                <tr>
                  <td>
                    {{ $result->content }}
                  </td> 
                  <td class="td-actions text-right">
                      <form action="{{ route('result.destroy', $result) }}" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                          <input type="hidden" name="_method" value="DELETE">
                          <a rel="tooltip" class="btn btn-success btn-link" href="#" data-original-title="" title="">
                            <i class="fa fa-edit" data-toggle="tooltip"></i>
                            <div class="ripple-container"></div>
                          </a> 
                      </form>
                    
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
              
          {{ $results->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection