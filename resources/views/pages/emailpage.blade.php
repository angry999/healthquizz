@extends('layouts.app', ['activePage' => 'emailpage', 'titlePage' => __('Email Content Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('updateemailpage') }}" autocomplete="off" class="form-horizontal">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Email Content management') }}</h4>
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
                    <table width="100%" bgcolor="gray" cellpadding="0" cellspacing="0" border="0">
                      <tbody>
                          <tr>
                              <td>
                                  <!-- begin main block -->
                                  <table cellpadding="0" cellspacing="0" width="900" border="0" align="center">
                                      <tbody>
                                          <tr>
                                              <td>
                                                  <!-- begin wrapper -->
                                                  <table bgcolor="white" cellpadding="0" cellspacing="0" border="0" width="100%">
                                                      <tbody>
                                                          <tr>
                                                            <td colspan="2">
                                                              <input type="text" class="form-control" style="float: left; text-align:left; font-size:17px; line-height:20px;color:#626658; margin-left:40px; margin-top: 15px; width:20%;" value="{{$phone}}" name="phone">
                                                              <label style="margin-left:75px;margin-right:10px;line-height:20px; padding-top:23px; float: left;" for="mainurlname">Link Url: </label>
                                                              <input type="text" class="form-control" style="font-weight: 100; padding-left: 50px; text-align:left;font-size:18px; line-height:20px; color:#bbbbbb; margin-left:140px;margin-top: 15px;width:40%;" value="{{$mainurlname}}" name="mainurlname"> 
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="2">
                                                              <label style="margin-left:75px;margin-right:10px;line-height:20px; padding-top:23px; float: left;" for="mainurladdress">Link Url Real Address: </label>
                                                              <input type="text" class="form-control" style="font-weight: 100; padding-left: 50px; text-align:left;font-size:18px; line-height:20px; color:#333; margin-left:140px;margin-top: 15px;width:50%;" value="{{$mainurladdress}}" name="mainurladdress"> 
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                              <td colspan="4" rowspan="3" bgcolor="#FFFFFF" style="padding:0 0 0px;">
                                                                  <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                                      <tbody>
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <input type="text" class="form-control" style="margin-top:48px;margin-bottom:0;margin-left:105px;margin-right:75px; font-size:22px; 
                                                                                  font-weight:bold;line-height:24px; color:#333333;padding-top: 20px;width: 70%;" value="{{$cong}}" name="cong"> 
                                                                              </td>
                                                                          </tr>
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <input type="text" class="form-control" style="margin-top:28px;margin-bottom:0;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:400;line-height:24px; color:#333333; width: 80%" value="{{$attention}}" name="attention">  
                                                                              </td>
                                                                          </tr>
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <input type="text" class="form-control" style="margin-top:18px;margin-bottom:0;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:400;line-height:24px; color:#32b2dd; width: 50%" value="{{$resulttext}}" name="resulttext"><b></b> 
                                                                              </td>
                                                                          </tr> 
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <textarea type="text" rows="3" class="form-control" style="font-size:34px; text-align:center;line-height:42px; color:#333333; margin-left:100px;margin-right:100px;margin-top:60px; width: 72%;" name="title"> {{$title}} </textarea> 
                                                                              </td>
                                                                          </tr>
                                                                           
                                                                           <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <input type="text" class="form-control" style="float:left;margin-top:18px;margin-bottom:0;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:400;line-height:24px; color:#333333;width: 40%;" value=" {{$clickon}} " name="clickon">
                                                                                  <input type="text" class="form-control" style="margin-top:18px;margin-bottom:0;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:400;line-height:24px; color:#951197;width: 10%;" value=" {{$clickonfree}} " name="clickonfree"> 

                                                                                  <textarea type="text" rows="3" class="form-control" style="margin-top:18px;margin-bottom:0;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:400;line-height:24px; color:#333333;width: 70%;" name="clickontext">  {{$clickontext}} </textarea> 
                                                                              </td>
                                                                          </tr>
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                <input type="text" class="form-control" style="float:left;margin-top:18px;margin-bottom:0;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:400;line-height:24px; color:#333333;width: 40%;" value=" {{$download}} " name="download">
                                                                                  <input type="text" class="form-control" style="margin-top:18px;margin-bottom:0;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:400;line-height:24px; color:#951197;width: 10%;" value=" {{$downloadfree}} " name="downloadfree"> 

                                                                                  <textarea type="text" rows="2" class="form-control" style="margin-top:18px;margin-bottom:0;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:400;line-height:24px; color:#333333;width: 70%;" name="downloadtext">  {{$downloadtext}} </textarea>  

                                                                              </td>
                                                                          </tr> 
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <input type="text" class="form-control" style="margin-top:48px;margin-bottom:0;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:300;line-height:24px; color:#333333;width: 70%;" value=" {{$question}} " name="question">
                                                                              </td>
                                                                          </tr>
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <input type="text" class="form-control" style="margin-top:18px;margin-bottom:20px;margin-left:75px; font-size:18px; 
                                                                                  font-weight:bold;line-height:24px; color:#333333;width: 6%;float: left;" value=" {{$these}} " name="these">
                                                                                  <input type="text" class="form-control" style="margin-top:18px;margin-bottom:20px;margin-left:5px; font-size:18px; 
                                                                                  font-weight:bold;line-height:24px; color:#951197;width: 6%; float: left;" value=" {{$thesefree}} " name="thesefree">
                                                                                  <input type="text" class="form-control" style="margin-top:18px;margin-bottom:20px;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:bold;line-height:24px; color:#333333;width: 60%;" value=" {{$thesetext}} " name="thesetext"> 
                                                                              </td>
                                                                          </tr>
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <input type="text" class="form-control" style="text-align:center;margin-top:32px;margin-bottom:20px;margin-left:125px;margin-right:125px; font-size:18px; 
                                                                                  font-weight:500;
                                                                                  line-height:55px; color:white;background: #26a6d1; width: 70%  " value=" {{$link1text}} " name="link1text">
                                                                              </td>
                                                                          </tr>
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <label style="margin-left:75px;margin-right:10px;line-height:24px; padding-top:8px; float: left;" for="link1url">Link Url: </label>
                                                                                  <input type="text" class="form-control" class="form-control" id="link1url" style=" margin-bottom:0;margin-right:75px; font-size:18px; 
                                                                                  font-weight:300;line-height:24px; color:#333333;width: 50%" value=" {{$link1url}} "  name="link1url"> 
                                                                              </td>
                                                                          </tr>

                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <input type="text" class="form-control" style="margin-top:58px;margin-bottom:20px;margin-left:75px;margin-right:75px; font-size:24px; 
                                                                                  font-weight:300;line-height:24px; color:#951197;width: 70%" value=" {{$change}} " name="change"> 
                                                                              </td>
                                                                          </tr>
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <textarea type="text" rows="2" class="form-control" style="margin-top:28px;margin-bottom:0;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:300;line-height:24px; color:#333333;width: 80%" name="having">  {{$having}} </textarea>
                                                                              </td>
                                                                          </tr>
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <input type="text" class="form-control" style="margin-top:28px;margin-bottom:20px;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:300;line-height:24px; color:#333333;width: 30%; float: left;" value=" {{$that}} " name="that">
                                                                                  <input type="text" class="form-control" style="margin-top:28px;margin-bottom:20px;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:300;line-height:24px; color:#951197;width: 40%" value="{{$three}}  " name="three">
                                                                                  <textarea type="text" rows="2" class="form-control" style="margin-top:28px;margin-bottom:0;margin-left:75px;margin-right:75px; font-size:18px; 
                                                                                  font-weight:300;line-height:24px; color:#333333;width: 80%" name="thattext">  {{$thattext}} </textarea>

                                                                              </td>
                                                                          </tr>
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <input type="text" class="form-control" style="text-align:center;margin-top:32px;margin-bottom:20px;margin-left:125px;margin-right:125px; font-size:18px; 
                                                                                  font-weight:500;
                                                                                  line-height:55px; color:white;background: #26a6d1; width: 70%  " value=" {{$link2text}} " name="link2text">
                                                                              </td>
                                                                          </tr>
                                                                          <tr valign="top">
                                                                              <td colspan="4">
                                                                                  <label style="margin-left:75px;margin-right:10px;line-height:24px; padding-top:8px; float: left;" for="link2url">Link Url: </label>
                                                                                  <input type="text" class="form-control" class="form-control" id="link2url" style=" margin-bottom:0;margin-right:75px; font-size:18px; 
                                                                                  font-weight:300;line-height:24px; color:#333333;width: 50%" value=" {{$link2url}} "  name="link2url"> 
                                                                              </td>
                                                                          </tr> 
                                                                          <tr valign="top" style="background: #D1D3D4; margin-top: 30px  ">
                                                                              
                                                                              <td width="400" height="100" style="background: #D1D3D4; margin-top: 30px  ">
                                                                                   <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-left: 1px solid #333333;margin-top: 30px">
                                                                                      <tbody>
                                                                                          <tr>
                                                                                           </tr>
                                                                                      </tbody>
                                                                                  </table>
                                                                              </td> 
                                                                          </tr>
                                                                      </tbody>
                                                                  </table>
                                                                   
                                                              </td>
                                                          </tr>
                                                          
                                                           
                                                      </tbody>
                                                  </table> 
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                                  <!-- end main block -->
                              </td>
                          </tr>
                      </tbody>
                  </table>
                </div>
              </div>

              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-rose">{{ __('Update Content') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> 
  </div>
@endsection