<style media="screen">
  .error{
    color:red;
  }
</style>

<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($current_user['user_id'] !== null)
        @if($errors->has('type'))
            <div class="error">{{ $errors->first('type') }}</div>
        @endif
        @if($errors->has('product_id'))
            <div class="error">{{ $errors->first('product_id') }}</div>
        @endif
        <form class="" action="{{ route('report') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group my-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Report Title" required value="{{ old('title') }}">
            @if($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div>
            @endif
          </div>
          <div class="form-group my-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="8" cols="80" required placeholder="Report Description">{{ old('description') }}</textarea>
            @if($errors->has('description'))
                <div class="error">{{ $errors->first('description') }}</div>
            @endif
          </div>
          <div class="form-group my-3">
            <label for="description">Screenshots Proof (required)</label>
            <input type="file" name="screenshots[]" multiple="multiple" required>
            @if($errors->has('screenshots'))
                <div class="error">{{ $errors->first('screenshots') }}</div>
            @endif
          </div>
          <input type="hidden" name="type" id="reportType" value="{{ old('type') }}">
          <input type="hidden" name="product_id" value="{{ request('id') }}">
          <div class="form-group my-3">
            <input type="submit" value="Report" class="btn brand-outline-btn">
          </div>
        </form>
        @else
        <div class="text-center">
          <a href="{{ url('/login') }}" class="btn btn-primary">Login To Report</a>
        </div>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@push('js')
  <script type="text/javascript">
    $(document).ready(function(){
      let modalShow = '{{ $errors->any() }}';
      if(modalShow == '1') {
        console.log('thsi isi workisdns')
        $('#reportModal').modal('show')
      }
    })
    function modalOpen(type) {
      console.log('thsi isi workisdns')
      if(type == 'supplier') {
        document.querySelector('#reportType').value = 'supplier';
      }
      if(type == 'product') {
        document.querySelector('#reportType').value = 'product';
      }
    }
  </script>
@endpush
