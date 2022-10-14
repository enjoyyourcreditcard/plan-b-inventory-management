
@section('title', 'Transaksi IC')
@extends('layouts.main') @section('content')

<div class="row">

  <div class="col-md-4">
    <div class="card">
      <div class="ribbon ribbon-top bg-green">
        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packge-export" width="24"
          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"></path>
          <path d="M12 12l8 -4.5"></path>
          <path d="M12 12v9"></path>
          <path d="M12 12l-8 -4.5"></path>
          <path d="M15 18h7"></path>
          <path d="M19 15l3 3l-3 3"></path>
        </svg>
      </div>

      <div class="card-header border-0">
        <div class="card-title">Outbound</div>
      </div>

      <div class="card-table table-responsive">
        <table class="table table-vcenter">
          <thead>
            <tr>
              <th>Status</th>
              <th>GRF</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            {{-- {{ ? "null": "sss"}} --}}
            @if (count($requestForms) === 0)
            <tr>
              <td colspan="100%" style="text-align: center">Tidak ada data</td>
            </tr>
            @else
            @foreach ($requestForms as $item)
            <tr>
              <td class="w-1">
                @switch($item->status)
                @case("submited")
                <span class="badge badge-pill badge-danger" style="background-color:red"><b>New</b></span>
                @break

                @case("ic_approved")
                <span class="badge badge-pill badge-danger" style="background-color:rgb(54, 228, 24)"><b>IC
                    Approved</b></span>
                @break

                @case("wh_approved")
                <span class="badge badge-pill badge-danger" style="background-color:rgb(33, 221, 190)"><b>WH
                    Approved</b></span>
                @break

                @case("delivery_approved")
                <span class="badge badge-pill badge-danger"
                  style="background-color:rgb(0, 55, 255)"><b>Delivery</b></span>
                @break

                @case("return")
                <span class="badge badge-pill badge-danger"
                  style="background-color:rgb(149, 0, 255)"><b>Return</b></span>
                @break

                @default
                <span class="badge badge-pill badge-danger" style="background-color:red"><b>Closed</b></span>
                @endswitch

              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
               
                  <a
                    href="{{ Route('get.detail.grf',str_replace('/', '~', strtolower($item->grf_code)))}}">{{$item->grf_code}}</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">28 Nov 2019</td>
            </tr>
            @endforeach
            @endif


          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="ribbon ribbon-top bg-primary">
        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-packge-import" width="24"
          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"></path>
          <path d="M12 12l8 -4.5"></path>
          <path d="M12 12v9"></path>
          <path d="M12 12l-8 -4.5"></path>
          <path d="M22 18h-7"></path>
          <path d="M18 15l-3 3l3 3"></path>
        </svg>
      </div>
      <div class="card-header border-0">
        <div class="card-title"><span>Inbound</span></div>
      </div>
      {{-- <div class="position-relative">
        <div class="position-absolute top-0 left-0 px-3 mt-1 w-75">
          <div class="row g-2">
            <div class="col-auto">
              <div class="chart-sparkline chart-sparkline-square" id="sparkline-activity" style="min-height: 41px;">
                <div id="apexchartsi4xbqdet" class="apexcharts-canvas apexchartsi4xbqdet apexcharts-theme-light"
                  style="width: 40px; height: 41px;"><svg id="SvgjsSvg1844" width="40" height="41"
                    xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                    transform="translate(0, 0)" style="background: transparent;">
                    <g id="SvgjsG1846" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                      <defs id="SvgjsDefs1845">
                        <clipPath id="gridRectMaski4xbqdet">
                          <rect id="SvgjsRect1848" width="46" height="42" x="-3" y="-1" rx="0" ry="0" opacity="1"
                            stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                        </clipPath>
                        <clipPath id="forecastMaski4xbqdet"></clipPath>
                        <clipPath id="nonForecastMaski4xbqdet"></clipPath>
                        <clipPath id="gridRectMarkerMaski4xbqdet">
                          <rect id="SvgjsRect1849" width="44" height="44" x="-2" y="-2" rx="0" ry="0" opacity="1"
                            stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                        </clipPath>
                      </defs>
                      <g id="SvgjsG1850" class="apexcharts-radialbar">
                        <g id="SvgjsG1851">
                          <g id="SvgjsG1852" class="apexcharts-tracks">
                            <g id="SvgjsG1853" class="apexcharts-radialbar-track apexcharts-track" rel="1">
                              <path id="apexcharts-radialbarTrack-0"
                                d="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 1 1 19.99723301461454 4.1463417048796565"
                                fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1"
                                stroke-linecap="butt" stroke-width="2.3658536585365857" stroke-dasharray="0"
                                class="apexcharts-radialbar-area"
                                data:pathOrig="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 1 1 19.99723301461454 4.1463417048796565">
                              </path>
                            </g>
                          </g>
                          <g id="SvgjsG1855">
                            <g id="SvgjsG1857" class="apexcharts-series apexcharts-radial-series" seriesName="series-1"
                              rel="1" data:realIndex="0">
                              <path id="SvgjsPath1858"
                                d="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 0 1 32.82587917911502 29.31854668268555"
                                fill="none" fill-opacity="0.85" stroke="rgba(32,107,196,0.85)" stroke-opacity="1"
                                stroke-linecap="butt" stroke-width="2.439024390243903" stroke-dasharray="0"
                                class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="126"
                                data:value="35" index="0" j="0"
                                data:pathOrig="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 0 1 32.82587917911502 29.31854668268555">
                              </path>
                            </g>
                            <circle id="SvgjsCircle1856" r="14.670731707317076" cx="20" cy="20"
                              class="apexcharts-radialbar-hollow" fill="transparent"></circle>
                          </g>
                        </g>
                      </g>
                      <line id="SvgjsLine1859" x1="0" y1="0" x2="40" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                        stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                      <line id="SvgjsLine1860" x1="0" y1="0" x2="40" y2="0" stroke-dasharray="0" stroke-width="0"
                        stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                    </g>
                    <g id="SvgjsG1847" class="apexcharts-annotations"></g>
                  </svg>
                  <div class="apexcharts-legend"></div>
                </div>
              </div>
            </div>
            <div class="col">
              <div>Today's Earning: $4,262.40</div>
              <div class="text-muted">
                <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline text-green" width="24" height="24"
                  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <polyline points="3 17 9 11 13 15 21 7"></polyline>
                  <polyline points="14 7 21 7 21 14"></polyline>
                </svg>
                +5% more than yesterday
              </div>
            </div>
          </div>
        </div>
        <div id="chart-development-activity" style="min-height: 192px;">
          <div id="apexchartserfi7caz" class="apexcharts-canvas apexchartserfi7caz apexcharts-theme-light"
            style="width: 650px; height: 192px;"><svg id="SvgjsSvg2574" width="650" height="192"
              xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
              xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS"
              transform="translate(0, 0)" style="background: transparent;">
              <g id="SvgjsG2576" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                <defs id="SvgjsDefs2575">
                  <clipPath id="gridRectMaskerfi7caz">
                    <rect id="SvgjsRect2612" width="656" height="194" x="-3" y="-1" rx="0" ry="0" opacity="1"
                      stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                  </clipPath>
                  <clipPath id="forecastMaskerfi7caz"></clipPath>
                  <clipPath id="nonForecastMaskerfi7caz"></clipPath>
                  <clipPath id="gridRectMarkerMaskerfi7caz">
                    <rect id="SvgjsRect2613" width="654" height="196" x="-2" y="-2" rx="0" ry="0" opacity="1"
                      stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                  </clipPath>
                </defs>
                <line id="SvgjsLine2581" x1="537.4310344827586" y1="0" x2="537.4310344827586" y2="192" stroke="#b6b6b6"
                  stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="537.4310344827586" y="0"
                  width="1" height="192" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                <g id="SvgjsG2620" class="apexcharts-xaxis" transform="translate(0, 0)">
                  <g id="SvgjsG2621" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g>
                </g>
                <g id="SvgjsG2637" class="apexcharts-grid">
                  <g id="SvgjsG2638" class="apexcharts-gridlines-horizontal" style="display: none;">
                    <line id="SvgjsLine2640" x1="0" y1="0" x2="650" y2="0" stroke="#e0e0e0" stroke-dasharray="4"
                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                    <line id="SvgjsLine2641" x1="0" y1="48" x2="650" y2="48" stroke="#e0e0e0" stroke-dasharray="4"
                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                    <line id="SvgjsLine2642" x1="0" y1="96" x2="650" y2="96" stroke="#e0e0e0" stroke-dasharray="4"
                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                    <line id="SvgjsLine2643" x1="0" y1="144" x2="650" y2="144" stroke="#e0e0e0" stroke-dasharray="4"
                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                    <line id="SvgjsLine2644" x1="0" y1="192" x2="650" y2="192" stroke="#e0e0e0" stroke-dasharray="4"
                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                  </g>
                  <g id="SvgjsG2639" class="apexcharts-gridlines-vertical" style="display: none;"></g>
                  <line id="SvgjsLine2646" x1="0" y1="192" x2="650" y2="192" stroke="transparent" stroke-dasharray="0"
                    stroke-linecap="butt"></line>
                  <line id="SvgjsLine2645" x1="0" y1="1" x2="0" y2="192" stroke="transparent" stroke-dasharray="0"
                    stroke-linecap="butt"></line>
                </g>
                <g id="SvgjsG2614" class="apexcharts-area-series apexcharts-plot-series">
                  <g id="SvgjsG2615" class="apexcharts-series" seriesName="Purchases" data:longestSeries="true" rel="1"
                    data:realIndex="0">
                    <path id="SvgjsPath2618"
                      d="M 0 192L 0 184.8C 7.844827586206895 184.8 14.568965517241379 180 22.413793103448274 180C 30.258620689655167 180 36.98275862068965 182.4 44.82758620689655 182.4C 52.672413793103445 182.4 59.39655172413793 177.6 67.24137931034483 177.6C 75.08620689655172 177.6 81.8103448275862 175.2 89.6551724137931 175.2C 97.49999999999999 175.2 104.22413793103448 180 112.06896551724137 180C 119.91379310344827 180 126.63793103448275 177.6 134.48275862068965 177.6C 142.32758620689654 177.6 149.05172413793105 172.8 156.89655172413794 172.8C 164.74137931034483 172.8 171.4655172413793 134.4 179.3103448275862 134.4C 187.15517241379308 134.4 193.8793103448276 175.2 201.72413793103448 175.2C 209.56896551724137 175.2 216.29310344827584 163.2 224.13793103448273 163.2C 231.98275862068962 163.2 238.70689655172413 180 246.55172413793102 180C 254.3965517241379 180 261.1206896551724 177.6 268.9655172413793 177.6C 276.81034482758616 177.6 283.5344827586207 184.8 291.37931034482756 184.8C 299.2241379310345 184.8 305.94827586206895 172.8 313.7931034482759 172.8C 321.63793103448273 172.8 328.36206896551727 182.4 336.2068965517241 182.4C 344.051724137931 182.4 350.7758620689655 158.4 358.6206896551724 158.4C 366.46551724137925 158.4 373.1896551724138 120 381.03448275862064 120C 388.87931034482756 120 395.60344827586204 151.2 403.44827586206895 151.2C 411.2931034482758 151.2 418.01724137931035 146.4 425.8620689655172 146.4C 433.70689655172407 146.4 440.4310344827586 156 448.27586206896547 156C 456.1206896551724 156 462.84482758620686 158.4 470.6896551724138 158.4C 478.53448275862064 158.4 485.2586206896552 132 493.10344827586204 132C 500.94827586206895 132 507.67241379310343 115.2 515.5172413793103 115.2C 523.3620689655172 115.2 530.0862068965517 96 537.9310344827586 96C 545.7758620689655 96 552.5 60 560.3448275862069 60C 568.1896551724137 60 574.9137931034483 48 582.7586206896551 48C 590.603448275862 48 597.3275862068965 76.80000000000001 605.1724137931034 76.80000000000001C 613.0172413793103 76.80000000000001 619.7413793103448 67.2 627.5862068965517 67.2C 635.4310344827586 67.2 642.1551724137931 24 650 24C 650 24 650 24 650 192M 650 24z"
                      fill="rgba(32,107,196,0.16)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round"
                      stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0"
                      clip-path="url(#gridRectMaskerfi7caz)"
                      pathTo="M 0 192L 0 184.8C 7.844827586206895 184.8 14.568965517241379 180 22.413793103448274 180C 30.258620689655167 180 36.98275862068965 182.4 44.82758620689655 182.4C 52.672413793103445 182.4 59.39655172413793 177.6 67.24137931034483 177.6C 75.08620689655172 177.6 81.8103448275862 175.2 89.6551724137931 175.2C 97.49999999999999 175.2 104.22413793103448 180 112.06896551724137 180C 119.91379310344827 180 126.63793103448275 177.6 134.48275862068965 177.6C 142.32758620689654 177.6 149.05172413793105 172.8 156.89655172413794 172.8C 164.74137931034483 172.8 171.4655172413793 134.4 179.3103448275862 134.4C 187.15517241379308 134.4 193.8793103448276 175.2 201.72413793103448 175.2C 209.56896551724137 175.2 216.29310344827584 163.2 224.13793103448273 163.2C 231.98275862068962 163.2 238.70689655172413 180 246.55172413793102 180C 254.3965517241379 180 261.1206896551724 177.6 268.9655172413793 177.6C 276.81034482758616 177.6 283.5344827586207 184.8 291.37931034482756 184.8C 299.2241379310345 184.8 305.94827586206895 172.8 313.7931034482759 172.8C 321.63793103448273 172.8 328.36206896551727 182.4 336.2068965517241 182.4C 344.051724137931 182.4 350.7758620689655 158.4 358.6206896551724 158.4C 366.46551724137925 158.4 373.1896551724138 120 381.03448275862064 120C 388.87931034482756 120 395.60344827586204 151.2 403.44827586206895 151.2C 411.2931034482758 151.2 418.01724137931035 146.4 425.8620689655172 146.4C 433.70689655172407 146.4 440.4310344827586 156 448.27586206896547 156C 456.1206896551724 156 462.84482758620686 158.4 470.6896551724138 158.4C 478.53448275862064 158.4 485.2586206896552 132 493.10344827586204 132C 500.94827586206895 132 507.67241379310343 115.2 515.5172413793103 115.2C 523.3620689655172 115.2 530.0862068965517 96 537.9310344827586 96C 545.7758620689655 96 552.5 60 560.3448275862069 60C 568.1896551724137 60 574.9137931034483 48 582.7586206896551 48C 590.603448275862 48 597.3275862068965 76.80000000000001 605.1724137931034 76.80000000000001C 613.0172413793103 76.80000000000001 619.7413793103448 67.2 627.5862068965517 67.2C 635.4310344827586 67.2 642.1551724137931 24 650 24C 650 24 650 24 650 192M 650 24z"
                      pathFrom="M -1 192L -1 192L 22.413793103448274 192L 44.82758620689655 192L 67.24137931034483 192L 89.6551724137931 192L 112.06896551724137 192L 134.48275862068965 192L 156.89655172413794 192L 179.3103448275862 192L 201.72413793103448 192L 224.13793103448273 192L 246.55172413793102 192L 268.9655172413793 192L 291.37931034482756 192L 313.7931034482759 192L 336.2068965517241 192L 358.6206896551724 192L 381.03448275862064 192L 403.44827586206895 192L 425.8620689655172 192L 448.27586206896547 192L 470.6896551724138 192L 493.10344827586204 192L 515.5172413793103 192L 537.9310344827586 192L 560.3448275862069 192L 582.7586206896551 192L 605.1724137931034 192L 627.5862068965517 192L 650 192">
                    </path>
                    <path id="SvgjsPath2619"
                      d="M 0 184.8C 7.844827586206895 184.8 14.568965517241379 180 22.413793103448274 180C 30.258620689655167 180 36.98275862068965 182.4 44.82758620689655 182.4C 52.672413793103445 182.4 59.39655172413793 177.6 67.24137931034483 177.6C 75.08620689655172 177.6 81.8103448275862 175.2 89.6551724137931 175.2C 97.49999999999999 175.2 104.22413793103448 180 112.06896551724137 180C 119.91379310344827 180 126.63793103448275 177.6 134.48275862068965 177.6C 142.32758620689654 177.6 149.05172413793105 172.8 156.89655172413794 172.8C 164.74137931034483 172.8 171.4655172413793 134.4 179.3103448275862 134.4C 187.15517241379308 134.4 193.8793103448276 175.2 201.72413793103448 175.2C 209.56896551724137 175.2 216.29310344827584 163.2 224.13793103448273 163.2C 231.98275862068962 163.2 238.70689655172413 180 246.55172413793102 180C 254.3965517241379 180 261.1206896551724 177.6 268.9655172413793 177.6C 276.81034482758616 177.6 283.5344827586207 184.8 291.37931034482756 184.8C 299.2241379310345 184.8 305.94827586206895 172.8 313.7931034482759 172.8C 321.63793103448273 172.8 328.36206896551727 182.4 336.2068965517241 182.4C 344.051724137931 182.4 350.7758620689655 158.4 358.6206896551724 158.4C 366.46551724137925 158.4 373.1896551724138 120 381.03448275862064 120C 388.87931034482756 120 395.60344827586204 151.2 403.44827586206895 151.2C 411.2931034482758 151.2 418.01724137931035 146.4 425.8620689655172 146.4C 433.70689655172407 146.4 440.4310344827586 156 448.27586206896547 156C 456.1206896551724 156 462.84482758620686 158.4 470.6896551724138 158.4C 478.53448275862064 158.4 485.2586206896552 132 493.10344827586204 132C 500.94827586206895 132 507.67241379310343 115.2 515.5172413793103 115.2C 523.3620689655172 115.2 530.0862068965517 96 537.9310344827586 96C 545.7758620689655 96 552.5 60 560.3448275862069 60C 568.1896551724137 60 574.9137931034483 48 582.7586206896551 48C 590.603448275862 48 597.3275862068965 76.80000000000001 605.1724137931034 76.80000000000001C 613.0172413793103 76.80000000000001 619.7413793103448 67.2 627.5862068965517 67.2C 635.4310344827586 67.2 642.1551724137931 24 650 24"
                      fill="none" fill-opacity="1" stroke="#206bc4" stroke-opacity="1" stroke-linecap="round"
                      stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0"
                      clip-path="url(#gridRectMaskerfi7caz)"
                      pathTo="M 0 184.8C 7.844827586206895 184.8 14.568965517241379 180 22.413793103448274 180C 30.258620689655167 180 36.98275862068965 182.4 44.82758620689655 182.4C 52.672413793103445 182.4 59.39655172413793 177.6 67.24137931034483 177.6C 75.08620689655172 177.6 81.8103448275862 175.2 89.6551724137931 175.2C 97.49999999999999 175.2 104.22413793103448 180 112.06896551724137 180C 119.91379310344827 180 126.63793103448275 177.6 134.48275862068965 177.6C 142.32758620689654 177.6 149.05172413793105 172.8 156.89655172413794 172.8C 164.74137931034483 172.8 171.4655172413793 134.4 179.3103448275862 134.4C 187.15517241379308 134.4 193.8793103448276 175.2 201.72413793103448 175.2C 209.56896551724137 175.2 216.29310344827584 163.2 224.13793103448273 163.2C 231.98275862068962 163.2 238.70689655172413 180 246.55172413793102 180C 254.3965517241379 180 261.1206896551724 177.6 268.9655172413793 177.6C 276.81034482758616 177.6 283.5344827586207 184.8 291.37931034482756 184.8C 299.2241379310345 184.8 305.94827586206895 172.8 313.7931034482759 172.8C 321.63793103448273 172.8 328.36206896551727 182.4 336.2068965517241 182.4C 344.051724137931 182.4 350.7758620689655 158.4 358.6206896551724 158.4C 366.46551724137925 158.4 373.1896551724138 120 381.03448275862064 120C 388.87931034482756 120 395.60344827586204 151.2 403.44827586206895 151.2C 411.2931034482758 151.2 418.01724137931035 146.4 425.8620689655172 146.4C 433.70689655172407 146.4 440.4310344827586 156 448.27586206896547 156C 456.1206896551724 156 462.84482758620686 158.4 470.6896551724138 158.4C 478.53448275862064 158.4 485.2586206896552 132 493.10344827586204 132C 500.94827586206895 132 507.67241379310343 115.2 515.5172413793103 115.2C 523.3620689655172 115.2 530.0862068965517 96 537.9310344827586 96C 545.7758620689655 96 552.5 60 560.3448275862069 60C 568.1896551724137 60 574.9137931034483 48 582.7586206896551 48C 590.603448275862 48 597.3275862068965 76.80000000000001 605.1724137931034 76.80000000000001C 613.0172413793103 76.80000000000001 619.7413793103448 67.2 627.5862068965517 67.2C 635.4310344827586 67.2 642.1551724137931 24 650 24"
                      pathFrom="M -1 192L -1 192L 22.413793103448274 192L 44.82758620689655 192L 67.24137931034483 192L 89.6551724137931 192L 112.06896551724137 192L 134.48275862068965 192L 156.89655172413794 192L 179.3103448275862 192L 201.72413793103448 192L 224.13793103448273 192L 246.55172413793102 192L 268.9655172413793 192L 291.37931034482756 192L 313.7931034482759 192L 336.2068965517241 192L 358.6206896551724 192L 381.03448275862064 192L 403.44827586206895 192L 425.8620689655172 192L 448.27586206896547 192L 470.6896551724138 192L 493.10344827586204 192L 515.5172413793103 192L 537.9310344827586 192L 560.3448275862069 192L 582.7586206896551 192L 605.1724137931034 192L 627.5862068965517 192L 650 192">
                    </path>
                    <g id="SvgjsG2616" class="apexcharts-series-markers-wrap" data:realIndex="0">
                      <g class="apexcharts-series-markers">
                        <circle id="SvgjsCircle2652" r="0" cx="537.9310344827586" cy="96"
                          class="apexcharts-marker wyu3ymihj no-pointer-events" stroke="#ffffff" fill="#206bc4"
                          fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                      </g>
                    </g>
                  </g>
                  <g id="SvgjsG2617" class="apexcharts-datalabels" data:realIndex="0"></g>
                </g>
                <line id="SvgjsLine2647" x1="0" y1="0" x2="650" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                  stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                <line id="SvgjsLine2648" x1="0" y1="0" x2="650" y2="0" stroke-dasharray="0" stroke-width="0"
                  stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                <g id="SvgjsG2649" class="apexcharts-yaxis-annotations"></g>
                <g id="SvgjsG2650" class="apexcharts-xaxis-annotations"></g>
                <g id="SvgjsG2651" class="apexcharts-point-annotations"></g>
              </g>
              <rect id="SvgjsRect2580" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
              <g id="SvgjsG2636" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
              <g id="SvgjsG2577" class="apexcharts-annotations"></g>
            </svg>
            <div class="apexcharts-legend" style="max-height: 96px;"></div>
            <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 402.306px; top: 99px;">
              <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">15 Jul</div>
              <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span
                  class="apexcharts-tooltip-marker" style="background-color: rgb(32, 107, 196);"></span>
                <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;">
                  <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Purchases:
                    </span><span class="apexcharts-tooltip-text-y-value">40</span></div>
                  <div class="apexcharts-tooltip-goals-group"><span
                      class="apexcharts-tooltip-text-goals-label"></span><span
                      class="apexcharts-tooltip-text-goals-value"></span></div>
                  <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span
                      class="apexcharts-tooltip-text-z-value"></span></div>
                </div>
              </div>
            </div>
            <div
              class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
              <div class="apexcharts-yaxistooltip-text"></div>
            </div>
          </div>
        </div>
      </div> --}}
      <div class="card-table table-responsive">
        <table class="table table-vcenter">
          <thead>
            <tr>
              <th>User</th>
              <th>GRF</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase ">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>


                </div>
              </td>
              <td class="text-nowrap text-muted">28 Nov 2019</td>
            </tr>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">27 Nov 2019</td>
            </tr>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">26 Nov 2019</td>
            </tr>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">26 Nov 2019</td>
            </tr>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">25 Nov 2019</td>
            </tr>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">24 Nov 2019</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="ribbon ribbon-top bg-yellow">
        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck" width="24" height="24"
          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <circle cx="7" cy="17" r="2"></circle>
          <circle cx="17" cy="17" r="2"></circle>
          <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
        </svg>
      </div>
      <div class="card-header border-0">
        <div class="card-title">Warehouse Transfer </div>
      </div>
      {{-- <div class="position-relative">
        <div class="position-absolute top-0 left-0 px-3 mt-1 w-75">
          <div class="row g-2">
            <div class="col-auto">
              <div class="chart-sparkline chart-sparkline-square" id="sparkline-activity" style="min-height: 41px;">
                <div id="apexchartsi4xbqdet" class="apexcharts-canvas apexchartsi4xbqdet apexcharts-theme-light"
                  style="width: 40px; height: 41px;"><svg id="SvgjsSvg1844" width="40" height="41"
                    xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                    transform="translate(0, 0)" style="background: transparent;">
                    <g id="SvgjsG1846" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                      <defs id="SvgjsDefs1845">
                        <clipPath id="gridRectMaski4xbqdet">
                          <rect id="SvgjsRect1848" width="46" height="42" x="-3" y="-1" rx="0" ry="0" opacity="1"
                            stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                        </clipPath>
                        <clipPath id="forecastMaski4xbqdet"></clipPath>
                        <clipPath id="nonForecastMaski4xbqdet"></clipPath>
                        <clipPath id="gridRectMarkerMaski4xbqdet">
                          <rect id="SvgjsRect1849" width="44" height="44" x="-2" y="-2" rx="0" ry="0" opacity="1"
                            stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                        </clipPath>
                      </defs>
                      <g id="SvgjsG1850" class="apexcharts-radialbar">
                        <g id="SvgjsG1851">
                          <g id="SvgjsG1852" class="apexcharts-tracks">
                            <g id="SvgjsG1853" class="apexcharts-radialbar-track apexcharts-track" rel="1">
                              <path id="apexcharts-radialbarTrack-0"
                                d="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 1 1 19.99723301461454 4.1463417048796565"
                                fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)" stroke-opacity="1"
                                stroke-linecap="butt" stroke-width="2.3658536585365857" stroke-dasharray="0"
                                class="apexcharts-radialbar-area"
                                data:pathOrig="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 1 1 19.99723301461454 4.1463417048796565">
                              </path>
                            </g>
                          </g>
                          <g id="SvgjsG1855">
                            <g id="SvgjsG1857" class="apexcharts-series apexcharts-radial-series" seriesName="series-1"
                              rel="1" data:realIndex="0">
                              <path id="SvgjsPath1858"
                                d="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 0 1 32.82587917911502 29.31854668268555"
                                fill="none" fill-opacity="0.85" stroke="rgba(32,107,196,0.85)" stroke-opacity="1"
                                stroke-linecap="butt" stroke-width="2.439024390243903" stroke-dasharray="0"
                                class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="126"
                                data:value="35" index="0" j="0"
                                data:pathOrig="M 20 4.146341463414631 A 15.85365853658537 15.85365853658537 0 0 1 32.82587917911502 29.31854668268555">
                              </path>
                            </g>
                            <circle id="SvgjsCircle1856" r="14.670731707317076" cx="20" cy="20"
                              class="apexcharts-radialbar-hollow" fill="transparent"></circle>
                          </g>
                        </g>
                      </g>
                      <line id="SvgjsLine1859" x1="0" y1="0" x2="40" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                        stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                      <line id="SvgjsLine1860" x1="0" y1="0" x2="40" y2="0" stroke-dasharray="0" stroke-width="0"
                        stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                    </g>
                    <g id="SvgjsG1847" class="apexcharts-annotations"></g>
                  </svg>
                  <div class="apexcharts-legend"></div>
                </div>
              </div>
            </div>
            <div class="col">
              <div>Today's Earning: $4,262.40</div>
              <div class="text-muted">
                <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline text-green" width="24" height="24"
                  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <polyline points="3 17 9 11 13 15 21 7"></polyline>
                  <polyline points="14 7 21 7 21 14"></polyline>
                </svg>
                +5% more than yesterday
              </div>
            </div>
          </div>
        </div>
        <div id="chart-development-activity" style="min-height: 192px;">
          <div id="apexchartserfi7caz" class="apexcharts-canvas apexchartserfi7caz apexcharts-theme-light"
            style="width: 650px; height: 192px;"><svg id="SvgjsSvg2574" width="650" height="192"
              xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
              xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS"
              transform="translate(0, 0)" style="background: transparent;">
              <g id="SvgjsG2576" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                <defs id="SvgjsDefs2575">
                  <clipPath id="gridRectMaskerfi7caz">
                    <rect id="SvgjsRect2612" width="656" height="194" x="-3" y="-1" rx="0" ry="0" opacity="1"
                      stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                  </clipPath>
                  <clipPath id="forecastMaskerfi7caz"></clipPath>
                  <clipPath id="nonForecastMaskerfi7caz"></clipPath>
                  <clipPath id="gridRectMarkerMaskerfi7caz">
                    <rect id="SvgjsRect2613" width="654" height="196" x="-2" y="-2" rx="0" ry="0" opacity="1"
                      stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                  </clipPath>
                </defs>
                <line id="SvgjsLine2581" x1="537.4310344827586" y1="0" x2="537.4310344827586" y2="192" stroke="#b6b6b6"
                  stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="537.4310344827586" y="0"
                  width="1" height="192" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                <g id="SvgjsG2620" class="apexcharts-xaxis" transform="translate(0, 0)">
                  <g id="SvgjsG2621" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g>
                </g>
                <g id="SvgjsG2637" class="apexcharts-grid">
                  <g id="SvgjsG2638" class="apexcharts-gridlines-horizontal" style="display: none;">
                    <line id="SvgjsLine2640" x1="0" y1="0" x2="650" y2="0" stroke="#e0e0e0" stroke-dasharray="4"
                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                    <line id="SvgjsLine2641" x1="0" y1="48" x2="650" y2="48" stroke="#e0e0e0" stroke-dasharray="4"
                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                    <line id="SvgjsLine2642" x1="0" y1="96" x2="650" y2="96" stroke="#e0e0e0" stroke-dasharray="4"
                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                    <line id="SvgjsLine2643" x1="0" y1="144" x2="650" y2="144" stroke="#e0e0e0" stroke-dasharray="4"
                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                    <line id="SvgjsLine2644" x1="0" y1="192" x2="650" y2="192" stroke="#e0e0e0" stroke-dasharray="4"
                      stroke-linecap="butt" class="apexcharts-gridline"></line>
                  </g>
                  <g id="SvgjsG2639" class="apexcharts-gridlines-vertical" style="display: none;"></g>
                  <line id="SvgjsLine2646" x1="0" y1="192" x2="650" y2="192" stroke="transparent" stroke-dasharray="0"
                    stroke-linecap="butt"></line>
                  <line id="SvgjsLine2645" x1="0" y1="1" x2="0" y2="192" stroke="transparent" stroke-dasharray="0"
                    stroke-linecap="butt"></line>
                </g>
                <g id="SvgjsG2614" class="apexcharts-area-series apexcharts-plot-series">
                  <g id="SvgjsG2615" class="apexcharts-series" seriesName="Purchases" data:longestSeries="true" rel="1"
                    data:realIndex="0">
                    <path id="SvgjsPath2618"
                      d="M 0 192L 0 184.8C 7.844827586206895 184.8 14.568965517241379 180 22.413793103448274 180C 30.258620689655167 180 36.98275862068965 182.4 44.82758620689655 182.4C 52.672413793103445 182.4 59.39655172413793 177.6 67.24137931034483 177.6C 75.08620689655172 177.6 81.8103448275862 175.2 89.6551724137931 175.2C 97.49999999999999 175.2 104.22413793103448 180 112.06896551724137 180C 119.91379310344827 180 126.63793103448275 177.6 134.48275862068965 177.6C 142.32758620689654 177.6 149.05172413793105 172.8 156.89655172413794 172.8C 164.74137931034483 172.8 171.4655172413793 134.4 179.3103448275862 134.4C 187.15517241379308 134.4 193.8793103448276 175.2 201.72413793103448 175.2C 209.56896551724137 175.2 216.29310344827584 163.2 224.13793103448273 163.2C 231.98275862068962 163.2 238.70689655172413 180 246.55172413793102 180C 254.3965517241379 180 261.1206896551724 177.6 268.9655172413793 177.6C 276.81034482758616 177.6 283.5344827586207 184.8 291.37931034482756 184.8C 299.2241379310345 184.8 305.94827586206895 172.8 313.7931034482759 172.8C 321.63793103448273 172.8 328.36206896551727 182.4 336.2068965517241 182.4C 344.051724137931 182.4 350.7758620689655 158.4 358.6206896551724 158.4C 366.46551724137925 158.4 373.1896551724138 120 381.03448275862064 120C 388.87931034482756 120 395.60344827586204 151.2 403.44827586206895 151.2C 411.2931034482758 151.2 418.01724137931035 146.4 425.8620689655172 146.4C 433.70689655172407 146.4 440.4310344827586 156 448.27586206896547 156C 456.1206896551724 156 462.84482758620686 158.4 470.6896551724138 158.4C 478.53448275862064 158.4 485.2586206896552 132 493.10344827586204 132C 500.94827586206895 132 507.67241379310343 115.2 515.5172413793103 115.2C 523.3620689655172 115.2 530.0862068965517 96 537.9310344827586 96C 545.7758620689655 96 552.5 60 560.3448275862069 60C 568.1896551724137 60 574.9137931034483 48 582.7586206896551 48C 590.603448275862 48 597.3275862068965 76.80000000000001 605.1724137931034 76.80000000000001C 613.0172413793103 76.80000000000001 619.7413793103448 67.2 627.5862068965517 67.2C 635.4310344827586 67.2 642.1551724137931 24 650 24C 650 24 650 24 650 192M 650 24z"
                      fill="rgba(32,107,196,0.16)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round"
                      stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0"
                      clip-path="url(#gridRectMaskerfi7caz)"
                      pathTo="M 0 192L 0 184.8C 7.844827586206895 184.8 14.568965517241379 180 22.413793103448274 180C 30.258620689655167 180 36.98275862068965 182.4 44.82758620689655 182.4C 52.672413793103445 182.4 59.39655172413793 177.6 67.24137931034483 177.6C 75.08620689655172 177.6 81.8103448275862 175.2 89.6551724137931 175.2C 97.49999999999999 175.2 104.22413793103448 180 112.06896551724137 180C 119.91379310344827 180 126.63793103448275 177.6 134.48275862068965 177.6C 142.32758620689654 177.6 149.05172413793105 172.8 156.89655172413794 172.8C 164.74137931034483 172.8 171.4655172413793 134.4 179.3103448275862 134.4C 187.15517241379308 134.4 193.8793103448276 175.2 201.72413793103448 175.2C 209.56896551724137 175.2 216.29310344827584 163.2 224.13793103448273 163.2C 231.98275862068962 163.2 238.70689655172413 180 246.55172413793102 180C 254.3965517241379 180 261.1206896551724 177.6 268.9655172413793 177.6C 276.81034482758616 177.6 283.5344827586207 184.8 291.37931034482756 184.8C 299.2241379310345 184.8 305.94827586206895 172.8 313.7931034482759 172.8C 321.63793103448273 172.8 328.36206896551727 182.4 336.2068965517241 182.4C 344.051724137931 182.4 350.7758620689655 158.4 358.6206896551724 158.4C 366.46551724137925 158.4 373.1896551724138 120 381.03448275862064 120C 388.87931034482756 120 395.60344827586204 151.2 403.44827586206895 151.2C 411.2931034482758 151.2 418.01724137931035 146.4 425.8620689655172 146.4C 433.70689655172407 146.4 440.4310344827586 156 448.27586206896547 156C 456.1206896551724 156 462.84482758620686 158.4 470.6896551724138 158.4C 478.53448275862064 158.4 485.2586206896552 132 493.10344827586204 132C 500.94827586206895 132 507.67241379310343 115.2 515.5172413793103 115.2C 523.3620689655172 115.2 530.0862068965517 96 537.9310344827586 96C 545.7758620689655 96 552.5 60 560.3448275862069 60C 568.1896551724137 60 574.9137931034483 48 582.7586206896551 48C 590.603448275862 48 597.3275862068965 76.80000000000001 605.1724137931034 76.80000000000001C 613.0172413793103 76.80000000000001 619.7413793103448 67.2 627.5862068965517 67.2C 635.4310344827586 67.2 642.1551724137931 24 650 24C 650 24 650 24 650 192M 650 24z"
                      pathFrom="M -1 192L -1 192L 22.413793103448274 192L 44.82758620689655 192L 67.24137931034483 192L 89.6551724137931 192L 112.06896551724137 192L 134.48275862068965 192L 156.89655172413794 192L 179.3103448275862 192L 201.72413793103448 192L 224.13793103448273 192L 246.55172413793102 192L 268.9655172413793 192L 291.37931034482756 192L 313.7931034482759 192L 336.2068965517241 192L 358.6206896551724 192L 381.03448275862064 192L 403.44827586206895 192L 425.8620689655172 192L 448.27586206896547 192L 470.6896551724138 192L 493.10344827586204 192L 515.5172413793103 192L 537.9310344827586 192L 560.3448275862069 192L 582.7586206896551 192L 605.1724137931034 192L 627.5862068965517 192L 650 192">
                    </path>
                    <path id="SvgjsPath2619"
                      d="M 0 184.8C 7.844827586206895 184.8 14.568965517241379 180 22.413793103448274 180C 30.258620689655167 180 36.98275862068965 182.4 44.82758620689655 182.4C 52.672413793103445 182.4 59.39655172413793 177.6 67.24137931034483 177.6C 75.08620689655172 177.6 81.8103448275862 175.2 89.6551724137931 175.2C 97.49999999999999 175.2 104.22413793103448 180 112.06896551724137 180C 119.91379310344827 180 126.63793103448275 177.6 134.48275862068965 177.6C 142.32758620689654 177.6 149.05172413793105 172.8 156.89655172413794 172.8C 164.74137931034483 172.8 171.4655172413793 134.4 179.3103448275862 134.4C 187.15517241379308 134.4 193.8793103448276 175.2 201.72413793103448 175.2C 209.56896551724137 175.2 216.29310344827584 163.2 224.13793103448273 163.2C 231.98275862068962 163.2 238.70689655172413 180 246.55172413793102 180C 254.3965517241379 180 261.1206896551724 177.6 268.9655172413793 177.6C 276.81034482758616 177.6 283.5344827586207 184.8 291.37931034482756 184.8C 299.2241379310345 184.8 305.94827586206895 172.8 313.7931034482759 172.8C 321.63793103448273 172.8 328.36206896551727 182.4 336.2068965517241 182.4C 344.051724137931 182.4 350.7758620689655 158.4 358.6206896551724 158.4C 366.46551724137925 158.4 373.1896551724138 120 381.03448275862064 120C 388.87931034482756 120 395.60344827586204 151.2 403.44827586206895 151.2C 411.2931034482758 151.2 418.01724137931035 146.4 425.8620689655172 146.4C 433.70689655172407 146.4 440.4310344827586 156 448.27586206896547 156C 456.1206896551724 156 462.84482758620686 158.4 470.6896551724138 158.4C 478.53448275862064 158.4 485.2586206896552 132 493.10344827586204 132C 500.94827586206895 132 507.67241379310343 115.2 515.5172413793103 115.2C 523.3620689655172 115.2 530.0862068965517 96 537.9310344827586 96C 545.7758620689655 96 552.5 60 560.3448275862069 60C 568.1896551724137 60 574.9137931034483 48 582.7586206896551 48C 590.603448275862 48 597.3275862068965 76.80000000000001 605.1724137931034 76.80000000000001C 613.0172413793103 76.80000000000001 619.7413793103448 67.2 627.5862068965517 67.2C 635.4310344827586 67.2 642.1551724137931 24 650 24"
                      fill="none" fill-opacity="1" stroke="#206bc4" stroke-opacity="1" stroke-linecap="round"
                      stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0"
                      clip-path="url(#gridRectMaskerfi7caz)"
                      pathTo="M 0 184.8C 7.844827586206895 184.8 14.568965517241379 180 22.413793103448274 180C 30.258620689655167 180 36.98275862068965 182.4 44.82758620689655 182.4C 52.672413793103445 182.4 59.39655172413793 177.6 67.24137931034483 177.6C 75.08620689655172 177.6 81.8103448275862 175.2 89.6551724137931 175.2C 97.49999999999999 175.2 104.22413793103448 180 112.06896551724137 180C 119.91379310344827 180 126.63793103448275 177.6 134.48275862068965 177.6C 142.32758620689654 177.6 149.05172413793105 172.8 156.89655172413794 172.8C 164.74137931034483 172.8 171.4655172413793 134.4 179.3103448275862 134.4C 187.15517241379308 134.4 193.8793103448276 175.2 201.72413793103448 175.2C 209.56896551724137 175.2 216.29310344827584 163.2 224.13793103448273 163.2C 231.98275862068962 163.2 238.70689655172413 180 246.55172413793102 180C 254.3965517241379 180 261.1206896551724 177.6 268.9655172413793 177.6C 276.81034482758616 177.6 283.5344827586207 184.8 291.37931034482756 184.8C 299.2241379310345 184.8 305.94827586206895 172.8 313.7931034482759 172.8C 321.63793103448273 172.8 328.36206896551727 182.4 336.2068965517241 182.4C 344.051724137931 182.4 350.7758620689655 158.4 358.6206896551724 158.4C 366.46551724137925 158.4 373.1896551724138 120 381.03448275862064 120C 388.87931034482756 120 395.60344827586204 151.2 403.44827586206895 151.2C 411.2931034482758 151.2 418.01724137931035 146.4 425.8620689655172 146.4C 433.70689655172407 146.4 440.4310344827586 156 448.27586206896547 156C 456.1206896551724 156 462.84482758620686 158.4 470.6896551724138 158.4C 478.53448275862064 158.4 485.2586206896552 132 493.10344827586204 132C 500.94827586206895 132 507.67241379310343 115.2 515.5172413793103 115.2C 523.3620689655172 115.2 530.0862068965517 96 537.9310344827586 96C 545.7758620689655 96 552.5 60 560.3448275862069 60C 568.1896551724137 60 574.9137931034483 48 582.7586206896551 48C 590.603448275862 48 597.3275862068965 76.80000000000001 605.1724137931034 76.80000000000001C 613.0172413793103 76.80000000000001 619.7413793103448 67.2 627.5862068965517 67.2C 635.4310344827586 67.2 642.1551724137931 24 650 24"
                      pathFrom="M -1 192L -1 192L 22.413793103448274 192L 44.82758620689655 192L 67.24137931034483 192L 89.6551724137931 192L 112.06896551724137 192L 134.48275862068965 192L 156.89655172413794 192L 179.3103448275862 192L 201.72413793103448 192L 224.13793103448273 192L 246.55172413793102 192L 268.9655172413793 192L 291.37931034482756 192L 313.7931034482759 192L 336.2068965517241 192L 358.6206896551724 192L 381.03448275862064 192L 403.44827586206895 192L 425.8620689655172 192L 448.27586206896547 192L 470.6896551724138 192L 493.10344827586204 192L 515.5172413793103 192L 537.9310344827586 192L 560.3448275862069 192L 582.7586206896551 192L 605.1724137931034 192L 627.5862068965517 192L 650 192">
                    </path>
                    <g id="SvgjsG2616" class="apexcharts-series-markers-wrap" data:realIndex="0">
                      <g class="apexcharts-series-markers">
                        <circle id="SvgjsCircle2652" r="0" cx="537.9310344827586" cy="96"
                          class="apexcharts-marker wyu3ymihj no-pointer-events" stroke="#ffffff" fill="#206bc4"
                          fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                      </g>
                    </g>
                  </g>
                  <g id="SvgjsG2617" class="apexcharts-datalabels" data:realIndex="0"></g>
                </g>
                <line id="SvgjsLine2647" x1="0" y1="0" x2="650" y2="0" stroke="#b6b6b6" stroke-dasharray="0"
                  stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                <line id="SvgjsLine2648" x1="0" y1="0" x2="650" y2="0" stroke-dasharray="0" stroke-width="0"
                  stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                <g id="SvgjsG2649" class="apexcharts-yaxis-annotations"></g>
                <g id="SvgjsG2650" class="apexcharts-xaxis-annotations"></g>
                <g id="SvgjsG2651" class="apexcharts-point-annotations"></g>
              </g>
              <rect id="SvgjsRect2580" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0"
                stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
              <g id="SvgjsG2636" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
              <g id="SvgjsG2577" class="apexcharts-annotations"></g>
            </svg>
            <div class="apexcharts-legend" style="max-height: 96px;"></div>
            <div class="apexcharts-tooltip apexcharts-theme-light" style="left: 402.306px; top: 99px;">
              <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">15 Jul</div>
              <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span
                  class="apexcharts-tooltip-marker" style="background-color: rgb(32, 107, 196);"></span>
                <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;">
                  <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Purchases:
                    </span><span class="apexcharts-tooltip-text-y-value">40</span></div>
                  <div class="apexcharts-tooltip-goals-group"><span
                      class="apexcharts-tooltip-text-goals-label"></span><span
                      class="apexcharts-tooltip-text-goals-value"></span></div>
                  <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span
                      class="apexcharts-tooltip-text-z-value"></span></div>
                </div>
              </div>
            </div>
            <div
              class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
              <div class="apexcharts-yaxistooltip-text"></div>
            </div>
          </div>
        </div>
      </div> --}}
      <div class="card-table table-responsive">
        <table class="table table-vcenter">
          <thead>
            <tr>
              <th>User</th>
              <th>GRF</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">28 Nov 2019</td>
            </tr>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">27 Nov 2019</td>
            </tr>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">26 Nov 2019</td>
            </tr>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">26 Nov 2019</td>
            </tr>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">25 Nov 2019</td>
            </tr>
            <tr>
              <td class="w-1">
                <span class="avatar avatar-sm"
                  style="background-image: url(https://avatars.dicebear.com/api/initials/Hajid.svg?backgroundColors=blueGrey)"></span>
              </td>
              <td class="td-truncate">
                <div class=" text-uppercase text-truncate">
                  <a href="#" target="_blank">033llNE0-GRr/lB/xl/2020</a>
                </div>
              </td>
              <td class="text-nowrap text-muted">24 Nov 2019</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal modal-blur fade" id="generate_sj" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        @endif
        <div>
          <div class="modal-body">
            <div class="modal-title">Generate Surat Jalan</div>
            <div>Apakah anda yakin ingin mengenerate surat Jalan</div>
          </div>
          <div class="pb-3 px-3">
            <div class="row">
              <div class="col-md-6">
                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
              </div>

              <div class="col-md-6">
                <form action="{{Route('post.approve.SJ')}}" method="post">
                  @csrf
                  <input type="hidden" name="id" id="grf_id">
                  <button type="submit" class="btn btn-success w-100">Generate SJ</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection