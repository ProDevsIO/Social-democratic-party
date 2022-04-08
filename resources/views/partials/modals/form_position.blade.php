@section('style')
<link href="../assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
@endsection



                                        <div id="addform" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <form action="{{ url('/admin/form/position/add/'.$form->id) }}" method="post">
                                                 @csrf
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel">Add Form Subcategories </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class=" row">
                                                           <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                  <label for="first_name" class="form-label">Categories*</label>
                                                                   <select name="category_id" id="" class="form-control" required>
                                                                       <option value="">Please select a category</option>
                                                                        @foreach($categories as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                        @endforeach
                                                                   </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                <label for="first_name" class="form-label">Subcategories*</label>
                                                                   <select name="positon_id" id="" class="form-control" required>
                                                                   <option value="">Please select a subcatgory</option>
                                                                        @foreach($positions as $position)
                                                                        <option value="{{$position->id}}">{{$position->name}}</option>
                                                                        @endforeach
                                                                   </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                <label for="first_name" class="form-label">Requirements*</label>
                                                                <br>
                                                                
                                                                <textarea name="requirements" id="" class="form-control" cols="30" rows="10"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                <label for="first_name" class="form-label">Fee*</label>
                                                                <br>
                                                                <span class="text-danger">Mininum amount of 200</span>
                                                                <input required name="fee" type="number" min="200"
                                                                        class="form-control" placeholder="Enter position fee" required>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                                </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->