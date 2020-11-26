@extends('layouts.app', ['activePage' => 'questions', 'titlePage' => __('Questions Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
        <div class="card">

          <div class="card-header card-header-info">
            <h4 class="card-title ">{{ __('Questions') }}</h4>
            <p class="card-category"> {{ __('Here you can manage questions') }}</p>
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
          @if (session('admin') == 1 || session('questions') == 1)
          <div class="row">
            <div class="col-12 text-right">
              <a href="{{ route('question.create') }}" class="btn btn-sm btn-info">{{ __('Add question') }}</a>
            </div>
          </div>
          @endif
          <table class="table table-striped table-hover">
            <thead class=" text-primary">
              <th>
                  {{ __('Question') }}
              </th> 
              <th class="text-right">
                {{ __('Actions') }}
              </th>
            </thead>
            <tbody>

              @foreach($questions as $question)
                <tr>
                  <td>
                    {{ $question->question }}
                  </td> 
                  <td class="td-actions text-right">
                      @if (session('admin') == 1 || session('questions') == 1)
                      <form action="{{ route('question.destroy', $question) }}" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                          <input type="hidden" name="_method" value="DELETE">
                          <a rel="tooltip" class="btn btn-info btn-link" href="{{ route('question.edit', $question) }}" data-original-title="" title="">
                            <i class="fa fa-edit" data-toggle="tooltip"></i>
                            <div class="ripple-container"></div>
                          </a>
                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this question?") }}') ? this.parentElement.submit() : ''">
                              <i class="fa fa-trash"></i>
                              <div class="ripple-container"></div>
                          </button>
                      </form>
                      @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
              
          {{ $questions->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection