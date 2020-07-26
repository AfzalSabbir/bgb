@extends('backend.layouts.master')
@section('styles')
<style>
.action{
  min-width: 70px;
}
</style>
@endsection

@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="breadcrumb-holder">
      <h1 class="main-title float-left">{{ __('designation.designation_management') }}</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('default.dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('designation.designation') }}</li>
      </ol>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6">
            <h2><i class="fa fa-bars"> {{ __('designation.designation') }}</i></h2>
          </div>
          <div class="col-md-6"><a href="{{ route('admin.designation.index') }}" class="float-right btn btn-primary"><i class="fa fa-arrow-left"></i> {{ __('designation.designation') }}</a></div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="card-body">
        @include('backend.partials.message')
        <div class="toggle-table-column">
          <strong>{{ __('default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>{{ __('default.sl') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="1"><b>{{ __('default.title') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="2"><b>{{ __('default.status') }}</b></a> |
          <a href="#" class="toggle-vis" data-column="3"><b>{{ __('default.action') }}</b></a>
        </div>

        <div class="table-responsive">

          @php
            // Pagination Serial
            if (request()->filled('page')){
              $PreviousPageLastSN = $items*(request()->page-1); //PreviousPageLastSerialNumber
              $PageNumber = request()->page;
            }
            else{
              $PreviousPageLastSN = 0; //PreviousPageLastSerialNumber
              $PageNumber = 1;
            }

            //Last Page Items Change Restriction
            if ($PageNumber*$items > $total + $items){
              header('Location: ' . $_SERVER['HTTP_REFERER']);
              die();
            }
          @endphp


          <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="row">
                    <div class="col-sm-12"  style="float: left">
                      <label style="display: inline-block;">Show</label>
                      <select style="display: inline-block; width: 75px;" select class="form-control" onchange="location = this.value;">
                        <option value="{{ route('admin.designation.search') }}?key={{ $key }}&items=10&page=1" {{ $items == 10 ? 'selected' : '' }}>10</option>
                        <option value="{{ route('admin.designation.search') }}?key={{ $key }}&items=5&page=1" {{ $items == 5 ? 'selected' : '' }}>5</option>
                        <option value="{{ route('admin.designation.search') }}?key={{ $key }}&items=3&page=1" {{ $items == 3 ? 'selected' : '' }}>3</option>
                        <option value="{{ route('admin.designation.search') }}?key={{ $key }}&items=1&page=1" {{ $items == 1 ? 'selected' : '' }}>1</option>
                      </select>
                      <label style="display: inline-block;">&nbsp;&nbsp;entries</label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 pull-right">
                  <form class="form-horizontal" style="overflow: auto; margin: 8px 0;" action="{{ route('admin.designation.search') }}" method="get">
                    <button class="fa fa-search btn btn-primary" style="float: right; height: 38px;" type="submit" ></button>
                    <lavel style="float: right"><input id='search' value="{{ $key }}" name="key" type="search" class="form-control" placeholder="{{ $key }}"></lavel>
                  </form>
                </div>
            </div>
          </div>
          <table width="100%" id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th width="45">{{ __('default.sl') }}</th>
              <th>{{ __('default.title') }}</th>
              <th>{{ __('default.status') }}</th>
              <th class="action" width="65">{{ __('default.action') }}</th>
            </thead>
            <tbody>

              @foreach($designations as $designation)
              <tr>
                <td>{{ $loop->index + $PreviousPageLastSN + 1 }}</td>
                <td>{{ $designation->title }}</td>
                <td>{{ $designation->status == 1 ? 'Active' : 'Deactive' }}</td>
                <td class="action">
                  <button data-toggle="modal" data-target="#edit_page{{ $designation->id }}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></button>

                  {{-- edit Modal --}}
                  <div class="modal fade" id="edit_page{{ $designation->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">{{ __('designation.update_designation') }}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('admin.designation.update', $designation->slug) }}" method="POST">
                            @csrf
                            <input type="hidden" name="old_title" value="{{ $designation->title }}">
                            <div class="form-group">
                              <label class="col-form-label" for="title">{{ __('default.title') }}<span class="text-danger">*</span></label>
                              <div>
                                <input type="text" class="form-control" name="title" value="{{ $designation->title }}" id="title" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-form-label" for="status">{{ __('default.status') }} <span class="text-danger">*</span></label>
                              <div>
                                <select class="form-control" name="status" id="status" required>
                                  <option value="1" {{ $designation->status == 1 ? 'selected' : '' }}>Active</option>
                                  <option value="0" {{ $designation->status == 0 ? 'selected' : '' }}>Deactive</option>
                                </select>
                              </div>
                            </div>
                            <div class="button-group pull-right">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('default.close') }}</button>
                              <button type="submit" class="btn btn-primary">{{ __('default.update') }}</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button href="{{ route('admin.designation.delete', $designation->slug) }}" class="btn btn-outline-danger" role="button"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 pull-left">
                    <label style="float: left">{{ $designations->appends(['key' => $key,'items' => $items])->links() }}</label>
                    <br>
                </div>
                <div class="col-sm-12 col-md-6 pull-right">
                  <lavel  style="float: right">{{ 'Showing '.($PreviousPageLastSN+1).' to '}} {{ ($PreviousPageLastSN+$items) >= $total ? $total : $PreviousPageLastSN+$items }}{{' of '.$total.' entries' }}</lavel>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Add Modal --}}
<div class="modal fade" id="add_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('designation.add_designation') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.designation.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label class="col-form-label" for="title">{{ __('default.title') }}<span class="text-danger">*</span></label>
            <div>
              <input type="text" class="form-control" name="title" id="title" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-form-label" for="status">{{ __('default.status') }} <span class="text-danger">*</span></label>
            <div>
              <select class="form-control" name="status" id="status" required>
                <option value="1">Active</option>
                <option value="0">Deactive</option>
              </select>
            </div>
          </div>
          <div class="button-group pull-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('default.close') }}</button>
            <button type="submit" class="btn btn-primary">{{ __('default.save') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>

  function deleteMethod(id) {
    var deleteAttribute = '';
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        deleteAttribute = id;
        $.ajax({
          url: "{{ URL::route('admin.menu.delete') }}",
          type: 'POST',
          data: {
            id: id
          },
          dataType: 'json',
          success: function(data) {
            console.log(data);
          }
        });
      }
    });
  };

</script>
@endsection
