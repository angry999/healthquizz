@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])
@section('content')
<div class="container">
    <div class="row justify-content-center">       
        <div class="card" style="width: 150rem;">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">face</i>
                              </div>
                              <p class="card-category">Total</p>
                              <h3 class="card-title">50
                                <small>Students</small>
                              </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">people</i> Number of Total Registered Students
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">face</i>
                              </div>
                              <p class="card-category">Active Today</p>
                              <h3 class="card-title">15
                                <small>Students</small>
                              </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">people</i> Number of Total Active Students Today
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-danger card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">face</i>
                              </div>
                              <p class="card-category">On Time</p>
                              <h3 class="card-title">10
                                <small>Students</small>
                              </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">people</i> Number of Total Students Registered On Time Today
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">face</i>
                              </div>
                              <p class="card-category">Late</p>
                              <h3 class="card-title">5
                                <small>Students</small>
                              </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">people</i> Number of Total Students Registered Late Today
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="card card-chart">
                            <div class="card-header card-header-success">
                              <div class="ct-chart" id="dailySalesChart"></div>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Daily Registered Students</h4>
                              <p class="card-category">                                
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">access_time</i> Number of Total Students Daily Registered on Time and Late
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
                              <h4 class="card-title">Weekly Registered Stuents</h4>                            
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">access_time</i> Number of Total Students Weekly Registered on Time and Late
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card card-chart">
                            <div class="card-header card-header-danger">
                              <div class="ct-chart" id="completedTasksChart"></div>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Monthly Registered Students</h4>                              
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">access_time</i> Number of Total Students Monthly Registered on Time and Late
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                              <div class="card-header card-header-info">
                                <h4 class="card-title">Students Registered on Time</h4>
                                <p class="card-category">Top 10 Students That Have Been On Time</p>
                              </div>
                              <div class="card-body table-responsive">
                                <table class="table table-hover">
                                  <thead class="text-warning">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Group</th>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>Imran Khan</td>
                                      <td>Science</td>
                                      <td>Biology</td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>Minerva Hooper</td>
                                      <td>Science</td>
                                      <td>Chemistry</td>
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td>Sage Rodriguez</td>
                                      <td>Science</td>
                                      <td>Physics</td>
                                    </tr>
                                    <tr>
                                      <td>4</td>
                                      <td>Philip Chaney</td>
                                      <td>Sports</td>
                                      <td>Football</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>                        

                        <div class="col-lg-6 col-md-12">
                          <div class="card">
                            <div class="card-header card-header-warning">
                              <h4 class="card-title">Students Registered Late</h4>
                              <p class="card-category">Top 10 Students That Have Been Late</p>
                            </div>
                            <div class="card-body table-responsive">
                              <table class="table table-hover">
                                <thead class="text-warning">
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Department</th>
                                  <th>Group</th>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Imran Khan</td>
                                    <td>Science</td>
                                    <td>Biology</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>Science</td>
                                    <td>Chemistry</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>Science</td>
                                    <td>Physics</td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>Sports</td>
                                    <td>Football</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>     
        </div>
    </div>
</div>
@endsection