@extends('layouts.app', ['activePage' => 'user-permission', 'titlePage' => __('User Permission Management')])

@section('content')

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<div class="content">

    <div class="container-fluid">         

<div class="card">

    <div class="card-header card-header-info">        

        <h3 class="card-title">User Permission Management</h3>      
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
    </div>

    <form method="POST" action="{{ route('user.permissionUpdate') }}" enctype="multipart/form-data">            

        {{ csrf_field() }}           

        <div class="row justify-content-center">

            <div class="col-md-8">       

                <div class="card-body">                                                                            

                    <div class="form-group row justify-content-center">

                        <div class="col-md-12">

                            <select name="username" id="username" class="form-control username dynamic" required>

                                <option value="">Please Select User</option>    
							                  @foreach ($Users as $user)
                                  <option value="{{ $user->ID }}">{{ $user->name }} ({{ $user->email }}) </option>
                                @endforeach 

                            </select>                            

                        </div>

                    </div>                                                       

                    <div class="form-group row justify-content-center">
                        <div class="col-md-6">
                        	<div class="form-check mr-auto ml-3 mt-3">
      				              <label class="form-check-label">
      				                <input class="form-check-input" type="checkbox" name="questions" id="questions" > {{ __('Questions Permission') }}
      				                <span class="form-check-sign">
      				                   <span class="check"></span>
      				                </span>
      				              </label>
      				            </div>
                        </div>

                        <div class="col-md-6">
                        	<div class="form-check mr-auto ml-3 mt-3">
      				              <label class="form-check-label">
      				                <input class="form-check-input" type="checkbox" name="answers" > {{ __('Answers Permission') }}
      				                <span class="form-check-sign">
      				                   <span class="check"></span>
      				                </span>
      				              </label>
      				            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-md-6">
                          <div class="form-check mr-auto ml-3 mt-3">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="firstpage" id="firstpage" > {{ __('First Page Permission') }}
                              <span class="form-check-sign">
                                 <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-check mr-auto ml-3 mt-3">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="emailpage" > {{ __('Email Content Permission') }}
                              <span class="form-check-sign">
                                 <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-6">
                          <div class="form-check mr-auto ml-3 mt-3">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="results" id="results" > {{ __('Result Permission') }}
                              <span class="form-check-sign">
                                 <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div> 
                        <div class="col-md-6">
                          <div class="form-check mr-auto ml-3 mt-3">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="emaillist" id="emaillist" > {{ __('Email List Permission') }}
                              <span class="form-check-sign">
                                 <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div> 
                    </div>
 
                </div>

            </div>      

        </div>    

        <div class="card-footer justify-content-center">

                <div class="col-md-6 offset-md-4">

                <button type="submit" class="btn btn-info col-md-4" >{{ __('Update') }}</button>

            </div>                

        </div>

    </form>  

</div>  

    </div>

</div>



@endsection