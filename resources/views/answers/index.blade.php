@extends('layouts.app', ['activePage' => 'answers', 'titlePage' => __('Answers Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
        <div class="card">

          <div class="card-header card-header-info">
            <h4 class="card-title ">{{ __('Answers') }}</h4>
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
              <a href="{{ route('answer.create') }}" class="btn btn-sm btn-info">{{ __('Add answer') }}</a>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead class=" text-primary">
              <th>
                  {{ __('Question') }}
              </th> 
              <th>
                  {{ __('Answer') }}
              </th> 
              <th class="text-right">
                {{ __('Actions') }}
              </th>
            </thead>
            <tbody>

              @foreach($answers as $answer)
                <tr>
                  <td>
                    {{ $answer->question }}
                  </td> 
                  <td>
                    {{ $answer->answer }}
                  </td> 
                  <td class="td-actions text-right">
                      <form action="{{ route('answer.destroy', $answer) }}" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                          <input type="hidden" name="_method" value="DELETE">
                      
                          <a rel="tooltip" class="btn btn-info btn-link" href="{{ route('editAnswer', $answer->id) }}" data-original-title="" title="">
                            <i class="fa fa-edit" data-toggle="tooltip"></i>
                            <div class="ripple-container"></div>
                          </a> 

                      </form>
                    
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
              
          {{ $answers->links() }}

        </div>
      </div>
    </div>
  </div>
@endsection