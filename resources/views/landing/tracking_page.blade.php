@extends('layout.app')

@section('content')

@include('landing.navbars.topnav')

<style>
      #content {
            background: url("{{ asset('assets') }}/images/bg-masthead.jpg") no-repeat center center;
      }

      .timeline-with-icons {
            border-left: 1px solid hsl(0, 0%, 90%);
            position: relative;
            list-style: none;
      }

      .timeline-with-icons .timeline-item {
            position: relative;
      }

      .timeline-with-icons .timeline-item:after {
            position: absolute;
            display: block;
            top: 0;
      }

      .timeline-with-icons .timeline-icon {
            position: absolute;
            left: -48px;
            background-color: hsl(217, 88.2%, 90%);
            color: hsl(217, 88.8%, 35.1%);
            border-radius: 50%;
            height: 31px;
            width: 31px;
            display: flex;
            align-items: center;
            justify-content: center;
      }
</style>

<div class="container-fluid py-5" id="content">
      <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                  <div class="card" style="border-radius: 1rem;">
                        <div class="d-flex align-items-center">
                              <div class="card-body p-4 p-lg-5 text-black">

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Parcel Tracking Number {{ $parcel->tracking_number }}</h5>

                                    <ul class="timeline-with-icons">

                                          @foreach($parcelDetails as $detail)
                                          @if($detail->status == 3)
                                          <li class="timeline-item mb-5">
                                                <span class="timeline-icon">
                                                      <i class="fa-solid fa-person-circle-check"></i>
                                                </span>

                                                <h5 class="fw-bold">{{ $detail->message }}</h5>
                                                <p class="text-muted mb-2 fw-bold">{{ $detail->created_at->format("d\/m\/y") }}</p>
                                                <p class="text-muted">
                                                      Recivier Name: {{ $parcel->receiver_name }}
                                                </p>
                                          </li>
                                          @endif

                                          @if($detail->status == 2)
                                          <li class="timeline-item mb-5">

                                                <span class="timeline-icon">
                                                      <i class="fa-solid fa-truck-fast"></i>
                                                </span>
                                                <h5 class="fw-bold">{{ $detail->message }}</h5>
                                                <p class="text-muted mb-2 fw-bold">{{ $detail->created_at->format("d\/m\/y") }}</p>
                                          </li>
                                          @endif

                                          @if($detail->status == 1)
                                          <li class="timeline-item mb-5">

                                                <span class="timeline-icon">
                                                      <i class="fa-solid fa-dolly"></i>
                                                </span>
                                                <h5 class="fw-bold">{{ $detail->message }}</h5>
                                                <p class="text-muted mb-2 fw-bold">{{ $detail->created_at->format("d\/m\/y") }}</p>
                                          </li>
                                          @endif
                                          @endforeach
                                    </ul>

                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>

@include('landing.navbars.footer')

@endsection