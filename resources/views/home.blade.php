@extends('layouts.admin')

@section('content')
<h1 class="title-bar-title">
              <span class="d-ib">Dashboard</span>
              <span class="d-ib">
                <a class="title-bar-shortcut" href="#" title="Add to shortcut list" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip">
                  <span class="sr-only">Add to shortcut list</span>
                </a>
              </span>
            </h1>
            <p class="title-bar-description">
              <small>Selamat Datang Di Menu Admin ;) <a href="widgets.html">widgets</a>.</small>
            </p>
          {{--   <div class="row gutter-xs">
          <div class="col-xs-6 col-md-3">
            <div class="card no-background no-border">
              <div class="card-values">
                <div class="p-x">
                  <small>Visitors</small>
                  <h3 class="card-title fw-l">185,118</h3>
                </div>
              </div>
              <div class="card-chart">
                <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "rgba(10, 194, 157, 0.03)", "borderColor": "#0ac29d", "data": [25250, 23370, 25568, 28961, 26762, 30072, 25135]}]' data-scales='{"yAxes": [{ "ticks": {"max": 32327}}]}' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="35"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-md-3">
            <div class="card bg-primary no-border">
              <div class="card-values">
                <div class="p-x">
                  <small>New visitors</small>
                  <h3 class="card-title fw-l">68,494</h3>
                </div>
              </div>
              <div class="card-chart">
                <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "rgba(255, 255, 255, 0.5)", "borderColor": "#ffffff", "data": [8796, 11317, 8678, 9452, 8453, 11853, 9945]}]' data-scales='{"yAxes": [{ "ticks": {"max": 12742}}]}' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="35"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-md-3">
            <div class="card bg-info no-border">
              <div class="card-values">
                <div class="p-x">
                  <small>Pageviews</small>
                  <h3 class="card-title fw-l">925,590</h3>
                </div>
              </div>
              <div class="card-chart">
                <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "rgba(255, 255, 255, 0.5)", "borderColor": "#ffffff", "data": [116196, 145160, 124419, 147004, 134740, 120846, 137225]}]' data-scales='{"yAxes": [{ "ticks": {"max": 158029}}]}' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="35"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-md-3">
            <div class="card bg-warning no-border">
              <div class="card-values">
                <div class="p-x">
                  <small>Average duration</small>
                  <h3 class="card-title fw-l">00:07:56</h3>
                </div>
              </div>
              <div class="card-chart">
                <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "rgba(255, 255, 255, 0.5)", "borderColor": "#ffffff", "data": [13590442, 12362934, 13639564, 13055677, 12915203, 11009940, 11542408]}]' data-scales='{"yAxes": [{ "ticks": {"max": 14662531}}]}' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="35"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="row gutter-xs">
          <div class="col-md-6">
            <div class="card bg-primary no-border">
              <div class="card-body">
                <span>PAGE VIEWS</span>
                <h3 class="card-title">
                  <span class="fw-l">925,590</span>
                  <span class="fw-b fz-sm">
                    <span class="icon icon-caret-up"></span>
                    15%
                  </span>
                </h3>
              </div>
              <div class="card-chart">
                <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "#067961", "borderColor": "#067961", "data": [116196, 145160, 124419, 147004, 134740, 120846, 137225]}]' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="33"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card bg-info no-border">
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-6">
                    <span>PAGE VIEWS</span>
                    <h3 class="card-title">
                      <span class="fw-l">925,590</span>
                      <span class="fw-b fz-sm">
                        <span class="icon icon-caret-up"></span>
                        15%
                      </span>
                    </h3>
                  </div>
                  <div class="col-xs-6">
                    <ul class="list-inline pull-right">
                      <li>
                        <small>
                          <span class="icon icon-square icon-fw" style="color: #1c9ea0"></span>
                          This week
                        </small>
                      </li>
                      <li>
                        <small>
                          <span class="icon icon-square icon-fw" style="color: #aeea00"></span>
                          Last week
                        </small>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-chart">
                <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "transparent", "borderColor": "#aeea00", "borderDash": [2, 4], "pointBackgroundColor": "#aeea00", "data": [111842, 103515, 113251, 128280, 118539, 133201, 111333]}, {"backgroundColor": "#1c9ea0", "borderColor": "#1c9ea0", "data": [116196, 145160, 124419, 147004, 134740, 120846, 137225]}]' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="33"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="row gutter-xs">
          <div class="col-md-4">
            <div class="card bg-primary">
              <div class="card-body">
                <div class="media">
                  <div class="media-middle media-body">
                    <h2 class="media-heading">
                      <span class="fw-l">3,972</span>
                      <span class="fw-b fz-sm">SIGNUPS</span>
                    </h2>
                  </div>
                  <div class="media-middle media-right">
                    <div class="media-chart">
                      <canvas data-chart="bar" data-animation="false" data-labels='["S", "M", "T", "W", "T", "F", "S"]' data-values='[{"backgroundColor": "#067961", "borderColor": "transparent", "data": [676, 297, 479, 226, 979, 743, 572]}]' data-scales='{"xAxes": [{ "gridLines": {"color": "#067961"}, "ticks": {"fontColor": "#fff"}} ]}' data-hide='["gridLinesX", "legend", "scalesY", "tooltips"]' height="66" width="132"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-info">
              <div class="card-body">
                <div class="media">
                  <div class="media-middle media-left">
                    <div class="media-chart">
                      <canvas data-chart="doughnut" data-animation="false" data-labels='["New", "Returning"]' data-values='[{ "backgroundColor": ["#aeea00", "rgba(0, 0, 0, 0.15)"], "borderColor" : ["#2fd7da", "#2fd7da"], "data": [18422, 32594]}]' data-hide='["scalesX", "legend", "scalesY", "tooltips"]' height="66" width="66"></canvas>
                    </div>
                  </div>
                  <div class="media-middle media-body">
                    <h2 class="media-heading">
                      <span class="fw-l">18,422</span>
                      <span class="fw-b fz-sm">New visitors</span>
                    </h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card bg-warning">
              <div class="card-body">
                <div class="media">
                  <div class="media-middle media-left">
                    <span class="bg-warning-inverse circle sq-64">
                      <span class="icon icon-flag"></span>
                    </span>
                  </div>
                  <div class="media-middle media-body">
                    <h3 class="media-heading">
                      <span class="fw-l">256 Issues</span>
                      <span class="fw-b fz-sm">
                        <span class="icon icon-caret-up"></span>
                        15%
                      </span>
                    </h3>
                    <small>13 issues are unassigned</small>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
        </div>

          
@endsection
