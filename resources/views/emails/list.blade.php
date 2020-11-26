@extends('layouts.app', ['activePage' => 'emaillist', 'titlePage' => __('Email List')])

@section('content')
  <div class="content">
    <div class="container-fluid">
        <div class="card">

          <div class="card-header card-header-info">
            <h4 class="card-title ">{{ __('Email List') }}</h4> 
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
              <a href="{{ route('email.export') }}" class="btn btn-sm btn-info">{{ __('Export as csv') }}</a>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead class=" text-primary">
              <th>
                  {{ __('No') }}
              </th> 
              <th>
                  {{ __('Email') }}
              </th> 
              <th>
                  {{ __('Result') }}
              </th> 
              <th>
                  {{ __('Date') }}
              </th> 
              <th class="text-right">
                {{ __('Actions') }}
              </th>
            </thead>
            <tbody>

              @foreach($emaillist as $data)
                <tr>
                  <td>
                    {{ $loop->iteration }}
                  </td> 
                  <td>
                    {{ $data->email }}
                  </td> 
                  <td>
                    {{ $data->content }}
                  </td>
                  <td>
                    {{ $data->created_at }}
                  </td>
                  <td class="td-actions text-right">
                      <form action="{{ route('email.destroy', $data) }}" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this email?") }}') ? this.parentElement.submit() : ''">
                              <i class="fa fa-trash"></i>
                              <div class="ripple-container"></div>
                          </button>
                      </form>
                    
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
              
          {{ $emaillist->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection