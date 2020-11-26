@extends('layouts.app', ['activePage' => 'questions', 'titlePage' => __('Questions Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('question.store') }}" autocomplete="off" class="form-horizontal">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Question') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('questions') }}" class="btn btn-sm btn-info">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Question') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('question') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" name="question" id="input-name" type="text" placeholder="{{ __('Question') }}" value="{{ old('question') }}" required="true" aria-required="true" required/>
                      @if ($errors->has('question'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('question') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('Answers') }}</label>
                  <div class="col-sm-7">
                    <div class="wrapper1"><div><input class="form-control"  type="text" name="answers[]" placeholder="Answer" /> <a href="javascript:void(0);" class="remove_field" style="position: relative;top: -27px;float: right;">Remove</a></div>
                    </div>
                    <div class="btn add_fields">add answer</div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-info">{{ __('Add Question') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection