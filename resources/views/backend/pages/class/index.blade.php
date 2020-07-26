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
      <h1 class="main-title float-left">{{ __('class.class_management') }}</h1>
      <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">{{ __('default.dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('class.class') }}</li>
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
          <div class="col-md-6"><h2><i class="fa fa-bars"> {{ __('class.class') }}</i></h2></div>
          <div class="col-md-6"><button data-toggle="modal" data-target="#add_new" class="float-right btn btn-primary"><i class="fa fa-plus"></i> {{ __('default.add_new') }}</button></div>
          <div class="clearfix"></div>
        </div>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <div class="toggle-table-column">
          <strong>{{ __('default.table_toggle_message') }} </strong>
          <a href="#" class="toggle-vis" data-column="0"><b>{{ __('default.sl') }}</b></a> | 
          <a href="#" class="toggle-vis" data-column="1"><b>{{ __('default.title') }}</b></a> | 
          <a href="#" class="toggle-vis" data-column="2"><b>{{ __('default.payment') }}</b></a> | 
          <a href="#" class="toggle-vis" data-column="3"><b>{{ __('default.photo') }}</b></a> | 
          <a href="#" class="toggle-vis" data-column="4"><b>{{ __('default.status') }}</b></a> | 
          <a href="#" class="toggle-vis" data-column="5"><b>{{ __('default.action') }}</b></a>
        </div>
        
        <div class="table-responsive">
          <table width="100%" id="datatable" class="table table-bordered table-hover display">
            <thead>
              <th width="45">{{ __('default.sl') }}</th>
              <th>{{ __('default.title') }}</th>
              <th>{{ __('default.payment') }}</th>
              <th width="40">{{ __('default.photo') }}</th>
              <th>{{ __('default.status') }}</th>
              <th class="action" width="65">{{ __('default.action') }}</th>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td>Chairman</td>
                <td>1500</td>
                <td><img class="img-fluid" src="{!! asset('public/admin/assets/images/2b8ce5d5-canon-powershot-g3-x-sample-images-1.jpg') !!}" alt=""></td>
                <td>Active</td>
                <td class="action">
                  <button data-toggle="modal" data-target="#edit_page" class="btn btn-outline-primary"><i class="fa fa-edit"></i></button>
                  <button href="#" class="btn btn-outline-danger" role="button"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
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
          <h5 class="modal-title" id="exampleModalLabel">{{ __('class.add_class') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label class="col-form-label" for="title">{{ __('default.title') }}<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="payment">{{ __('default.payment') }}<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control" name="payment" id="payment" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="photo">{{ __('default.photo') }}<span class="text-danger">*</span></label>
                    <div>
                        <input type="file" style="width: 100%;" name="photo[]" id="filer_example2" required>
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

{{-- edit Modal --}}
<div class="modal fade" id="edit_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('class.update_class') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label class="col-form-label" for="designation_title">{{ __('default.title') }}<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="payment">{{ __('default.payment') }}<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control" name="payment" id="payment" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="photo">{{ __('default.photo') }}<span class="text-danger">*</span></label>
                    <div>
                        <input type="file" style="width: 100%;" name="photo[]" id="filer_example" required>
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
                    <button type="submit" class="btn btn-primary">{{ __('default.update') }}</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  function deleteMethod(id){
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

  $('#filer_example2').filer({
    limit: 1,
    maxSize: 3,
    extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
    changeInput: true,
    showThumbs: true,
    addMore: true
  });
  $('#filer_example').filer({
    limit: 1,
    maxSize: 3,
    extensions: ['jpg', 'jpeg', 'png', 'gif', 'psd'],
    changeInput: true,
    showThumbs: true,
    addMore: true
  });
</script>
@endsection
