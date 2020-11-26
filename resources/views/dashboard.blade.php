@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<style>
  .card .card-header-info1 .card-icon,
.card .card-header-info1 .card-text,
.card .card-header-info1:not(.card-header-icon):not(.card-header-text),
.card.bg-info1,
.card.card-rotate.bg-info1 .front,
.card.card-rotate.bg-info1 .back {
  /*background: linear-gradient(60deg, #555555, #555555);*/
  background-image: url('http://amplo.blue/LightBeamAcademy/public/uploads/chat2.jpg');
}
  </style>
  <div class="content">
    <div class="container-fluid">
       
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"> </div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Daily Registered Coutomers</h4>
              <p class="card-category">                                
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> Number of Total Coutomers Daily Registered on Time and Late
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Weekly Registered Coutomers</h4>                            
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> Number of Total Coutomers Weekly Registered on Time and Late
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body card-header-info">
              <div class="ct-chart ct-perfect-fourth" id="completedTasksChart"></div>
            </div>
            <div class="card-body ">
              <div class="legend">
                  <i class="fa fa-circle text-info"></i> OnTime
                  <i class="fa fa-circle text-danger"></i> Late
              </div>
              <h4 class="card-title">Monthly Registered Coutomers</h4>                              
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> Number of Total Coutomers Monthly Registered on Time and Late
              </div>
            </div>
          </div>
        </div>
      </div>
       
    </div>
  </div>
  <p id="demo"></p>
@endsection

@push('js')

  <script>
    $(document).ready(function() {
        
    });
  </script>

  
@endpush