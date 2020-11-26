@extends('layouts.app', ['activePage' => 'firstpage', 'titlePage' => __('First Page Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('updatefirstpage') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('First page management') }}</h4>
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
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-7">
                    <div class="form-group row justify-content-center">
                      <div class="col-md-12">
                        <div class="row justify-content-center">
                          <div class="col-md-12">
                            <textarea type="text" rows="1" class="form-control" id="top_title" name="top_title" required >{{$top_title}}
                            </textarea> 
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row justify-content-center">
                      <div class="col-md-12">
                        <div class="row justify-content-center">
                          <div class="col-md-12">
                            <textarea type="text" rows="1" class="form-control" id="top_title_body" name="top_title_body" required >{{$top_title_body}}
                            </textarea> 
                          </div>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group row justify-content-center">
                      <div class="col-md-12">
                        <div class="row justify-content-center">
                          <div class="col-md-12">
                            <textarea type="text" rows="3" class="form-control" id="top_text1" name="top_text1" required >{{$top_text1}}
                            </textarea> 
                          </div>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group row justify-content-center">
                      <div class="col-md-12">
                        <div class="row justify-content-center">
                          <div class="col-md-12">
                            <textarea type="text" rows="3" class="form-control" id="top_text2" name="top_text2" required >{{$top_text2}}  
                            </textarea> 
                          </div>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group row justify-content-center">
                      <div class="col-md-12">
                        <div class="row justify-content-center">
                          <div class="col-md-12">
                            <textarea type="text" rows="3" class="form-control" id="top_text3" name="top_text3" required >{{$top_text3}}  
                            </textarea> 
                          </div>
                        </div>
                      </div>
                    </div> 

                  </div>

                  <div class="col-md-5">
                    <div style="height: 30px"></div>
                    <label for="top_image">Click here to change the image</label>

                    <input hidden type="file" class="" name="top_image" id="top_image" >                                                          
                    <input type="hidden" name="top_image_o" id="top_image_o" value={{$top_image}}>                                                          
                    <img id="topPreviewImage" style="width:450px;height:300px;" src="{{ 'https://radiantshentiquiz.com/healthquizz/public/uploads/'.$top_image }}">
                  </div> 

                </div>

                <div class="row" style="height: 50px"></div>

                <div class="row">
                  <div class="col-md-5">
                    <label for="bottom_image">Click here to change the image</label>

                    <input hidden type="file" class="" name="bottom_image" id="bottom_image" >
                    <input type="hidden" name="bottom_image_o" id="bottom_image_o" value={{$bottom_image}}>                                                          
                    <img id="bottomPreviewImage" style="width:450px;height:300px;" src="{{ 'https://radiantshentiquiz.com/healthquizz/public/uploads/'.$bottom_image}}">
                  </div> 
                  <div class="col-md-7">
                    <div class="form-group row justify-content-center">
                      <div class="col-md-12">
                        <div class="row justify-content-center">
                          <div class="col-md-12">
                            <textarea type="text" rows="1" class="form-control" id="bottom_title" name="bottom_title" required >{{$bottom_title}}
                            </textarea> 
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row justify-content-center">
                      <div class="col-md-12">
                        <div class="row justify-content-center">
                          <div class="col-md-12">
                            <textarea type="text" rows="3" class="form-control" id="bottom_text1" name="bottom_text1" required >{{$bottom_text1}}
                            </textarea> 
                          </div>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group row justify-content-center">
                      <div class="col-md-12">
                        <div class="row justify-content-center">
                          <div class="col-md-12">
                            <textarea type="text" rows="3" class="form-control" id="bottom_text2" name="bottom_text2" required >{{$bottom_text2}}  
                            </textarea> 
                          </div>
                        </div>
                      </div>
                    </div> 

                    <div class="form-group row justify-content-center">
                      <div class="col-md-12">
                        <div class="row justify-content-center">
                          <div class="col-md-12">
                            <textarea type="text" rows="3" class="form-control" id="bottom_text3" name="bottom_text3" required placeholder="Please input the text here">{{$bottom_text3}}  
                            </textarea> 
                          </div>
                        </div>
                      </div>
                    </div> 

                  </div>

                </div>

              </div>
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row justify-content-center">
                      <div class="col-md-12">
                        <div class="row justify-content-center">
                          <div class="col-md-10">
                            <label for="contact_us">Contact US</label>
                            <textarea type="text" rows="2" class="form-control" id="contact_us" name="contact_us" required >{{$contact_us}}
                            </textarea> 
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-info">{{ __('Update Content') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      document.getElementById("top_image").onchange = function () {

          var reader = new FileReader();
          reader.onload = function (e) {
              document.getElementById("topPreviewImage").src = e.target.result;
          };
          document.getElementById("topPreviewImage").style.display = "block";

          reader.readAsDataURL(this.files[0]);

      };

      document.getElementById("bottom_image").onchange = function () {

          var reader = new FileReader();
          reader.onload = function (e) {
              document.getElementById("bottomPreviewImage").src = e.target.result;
          };
          document.getElementById("bottomPreviewImage").style.display = "block";

          reader.readAsDataURL(this.files[0]);

      };
  </script>
  </div>
@endsection