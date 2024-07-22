<div>
    
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm deleting brand...</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="destroyCategory">
          <div class="modal-body">
            <h6>
                 @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                 @else
                    Are you sure you want to delete?
                 @endif
                </h6>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Delete</button>
          </div>
      </form>
      

    </div>
  </div>
</div>





<div class="row">
            <div class="col-md-12 grid-margin">


                    @if(session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif

                <div class="card">
                    
                    <div class="d-flex justify-content-center text-center card-header">
                        <h3 class="m-1">Categories</h1>
                        <a href="{{url('admin/category/create')}}" class="btn btn-primary float-end btn-sm">Add Category</a>
                    </div>


                    <div class="card-body">



                            <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="p-2 btn btn-success">Edit</a>
                                        <a href="" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="p-2 btn btn-danger">Delete</a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table> 
                    </div>

                </div>

            </div>

</div>
</div>

@push('scripts')
<script type="text/javascript">
    window.addEventListener('close-modal', event => {
        $('#deleteModal').modal('hide');
    })
</script>
@endpush