@extends('layouts.user_type.admin')

@section('content')

  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Student Count</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $userCount }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Survey Taken</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $surveyCount }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<canvas id="myChart" style="width:100%;max-width:400px"></canvas>

@endsection
@push('dashboard')
  <script>
  var xValues = [];
  var yValues = [];
  var data = @json($survey_results);

  data.forEach(function(item) {
        xValues.push(item.results); // Display column1 data
        yValues.push(item.count ); // Display column1 data
// Display column2 data
    });
  var barColors = ["#fffb00", "#7ce900","#ff26a7","#93ffd3","#003019","#006770","#9c2800","#00ec46","#6e29ff","#3c002b","#ff0e18"];

  new Chart("myChart", {
    type: "pie",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true,
        text: "Course Recommendation Chart Result"
      }
    }
  });
  </script>
@endpush
