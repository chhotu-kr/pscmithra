@extends('admin.base')
@section('content')
<div class="container" style="margin-top: 7%;">
        <div class="row">
            <div class="col-3">
                @include('admin.side')
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header h3">Insert Coupon</div>
                    <div class="card-body">
                        <form action="{{route('coupon.store')}}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="validationCustom01" class="form-label">Code</label>
                                <input type="text" class="form-control" name="code" id="validationCustom01" required>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                              </div>
                              <div class="col-md-12">
                                <label for="validationCustom02" class="form-label">Percent</label>
                                <input type="text" class="form-control" name="percent" id="validationCustom02" required>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                              </div>
                              <div class="mb-3 mt-3">
                                <input type="submit" value="create" class="btn btn-primary w-100">
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>

@endsection