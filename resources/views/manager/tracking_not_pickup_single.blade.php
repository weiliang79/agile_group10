@extends('layout.app')

@section('content')

@include('layout.navbars.topnav')

<div class="container-fluid py-5" style="background-color: lightblue;">
      <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                  <div class="card" style="border-radius: 1rem;">
                        <div class="d-flex align-items-center">
                              <div class="card-body p-4 p-lg-5 text-black">

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Parcel Info</h5>
                                    <div class="d-flex justify-content-center">
                                          <table>

                                                <tbody>
                                                      <tr>
                                                            <td style="width: 10rem">Tracking Number: </td>
                                                            <td>{{ $parcel->tracking_number }}</td>
                                                      </tr>
                                                      <tr>
                                                            <td style="width: 10rem">Weight: </td>
                                                            <td>{{ $parcel->weight }} Kg</td>
                                                      </tr>
                                                      <tr>
                                                            <td style="width: 10rem">Sender name: </td>
                                                            <td>{{ $parcel->sender->first_name }} {{ $parcel->sender->last_name }}</td>
                                                      </tr>
                                                      <tr>
                                                            <td style="width: 10rem;">Recipient name: </td>
                                                            <td>{{ $parcel->recipient_firstname }} {{ $parcel->recipient_lastname }}</td>
                                                      </tr>
                                                      <tr>
                                                            <td style="width: 10rem;">Recipient address: </td>
                                                            <td>{{ $parcel->recipient_address }}</td>
                                                      </tr>
                                                      <tr>
                                                            <td style="width: 10rem;">Recipient postcode: </td>
                                                            <td>{{ $parcel->recipient_postcode }}</td>
                                                      </tr>
                                                      <tr>
                                                            <td style="width: 10rem;">Recipient phone: </td>
                                                            <td>{{ $parcel->recipient_phone }}</td>
                                                      </tr>
                                                      <tr>
                                                            <td style="width: 10rem;">Created at: </td>
                                                            <td>{{ $parcel->created_at }}</td>
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

<div class="container-fluid py-5" style="background-color: lightblue;">
      <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                  <div class="card" style="border-radius: 1rem;">
                        <div class="d-flex align-items-center">
                              <div class="card-body p-4 p-lg-5 text-black">

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Assign couier</h5>

                                    <form action="{{ route('manager.tracking_not_pickup_single.process') }}" method="post">
                                    @csrf

                                          <input type="hidden" name="parcel_id" value="{{ $parcel->id }}">

                                          @if($parcel->request()->whereIn('status', [1, 2, 3])->count() == 0)
                                          <div class="form-outline mb-4">
                                                <select class="form-select" name="courier_id">
                                                      <option value="0" selected>Select a courier to assign</option>
                                                      @foreach($couriers as $courier)
                                                      <option value="{{ $courier->id }}">{{ $courier->first_name }} {{ $courier->last_name }}</option>
                                                      @endforeach
                                                </select>
                                          </div>
                                          @elseif($parcel->request()->orderBy('created_at', 'DESC')->first()->status == 3)
                                          <div class="mb-4">
                                                <p>Last Courier Assigned: {{ $parcel->request()->orderBy('created_at', 'DESC')->first()->courier->first_name }} {{ $parcel->request()->orderBy('created_at', 'DESC')->first()->courier->last_name }}</p>
                                                <p>Reason Reject: {{ $parcel->request()->orderBy('created_at', 'DESC')->first()->reason }}</p>
                                          </div>


                                          <div class="form-outline mb-4">
                                                <select class="form-select" name="courier_id">
                                                      <option value="0" selected>Select a courier to assign</option>
                                                      @foreach($couriers as $courier)
                                                      <option value="{{ $courier->id }}">{{ $courier->first_name }} {{ $courier->last_name }}</option>
                                                      @endforeach
                                                </select>
                                          </div>
                                          @else
                                          <div class="form-outline mb-4">
                                                <select class="form-select" name="courier_id" disabled>
                                                      <option value="0">Select a courier to assign</option>
                                                      @foreach($couriers as $courier)
                                                            @if($parcel->request()->orderBy('created_at', 'DESC')->first()->courier_id == $courier->id)
                                                            <option value="{{ $courier->id }}" selected>{{ $courier->first_name }} {{ $courier->last_name }}</option>
                                                            @else
                                                            <option value="{{ $courier->id }}">{{ $courier->first_name }} {{ $courier->last_name }}</option>
                                                            @endif
                                                      @endforeach
                                                </select>
                                          </div>
                                          @endif

                                          <div class="pt-1 mb-4">
                                                <button class="btn btn-dark btn-lg btn-block" type="submit">Submit</button>
                                          </div>

                                    </form>

                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>

@include('layout.navbars.footer')

@endsection