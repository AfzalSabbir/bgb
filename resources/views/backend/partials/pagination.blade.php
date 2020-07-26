<div class="row">
  @if ($total>0)
  <div class="col-sm-12 col-md-6 pull-right">
    <lavel  style="float: left">{{ 'Showing '.($PreviousPageLastSN+1).' to '}} {{ ($PreviousPageLastSN+$items) >= $total ? $total : $PreviousPageLastSN+$items }}{{' of '.$total.' entries' }}</lavel>
  </div>
  @else
  <div class="col-sm-12 col-md-12 pull-right">
    <h3 class="alert alert-warning text-center" style="float: left; color: red; width: 100%;">{{ __('default.no_data') }}</h3>
  </div>
  @endif

  <div class="col-sm-12 col-md-6 pull-left">
    @if(isset($where))
      <label style="float: right">{{ $table->appends(\Request::query())->render() }}</label>
    @else
       <label style="float: right">{{ $table->appends(['items' => $items])->links() }}</label>
    @endif
    
  </div>
</div>