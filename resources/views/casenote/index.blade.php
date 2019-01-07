
{{-- calling layouts \ app.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2 class="display-6">Case Notes</h2>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">No</th>
        <th>Patient ID</th>
        <th>Employee ID</th>
        <th>Notes</th>
        <th>Status ID</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th class="text-center" width="150px">
          <a href="#" class="create-modal btn btn-success btn-sm">
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      {{ csrf_field() }}
      <?php  $no=1; ?>
      @foreach ($casenotes as $casenote)
        <tr class="post{{$casenote->id}}">
          <td>{{ $no++ }}</td>
          <td>{{ $casenote->patients_id}}</td>
          <td>{{ $casenote->employee_id}}</td>
          <td>{{ $casenote->notes}}</td>
          <td>{{ $casenote->status_id}}</td>
          <td>{{ $casenote->created_at}}</td>
          <td>{{ $casenote->updated_at}}</td>
          <td>
            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$casenote->id}}" data-notes="{{$casenote->notes}}" >
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$casenote->id}}" data-notes="{{$casenote->notes}}" >
              <i class="glyphicon glyphicon-pencil"></i>
            </a>
            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$casenote->id}}" data-notes="{{$casenote->notes}}" >
              <i class="glyphicon glyphicon-trash"></i>
            </a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$casenotes->links()}}
</div>
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group row add">
            <label class="control-label col-sm-2" for="title">CaseNote:</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control" id="notes" name="notes"
                        placeholder="Case Note Here" cols="5" rows="5" required></textarea>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span> Save
            </button>
            <button class="btn btn-danger" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Close
            </button>
          </div>
    </div>
  </div>
</div></div>
{{-- Modal Form Show POST --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="">ID :</label>
                      <b id="i"/>
                    </div>
                    <div class="form-group">
                      <label for="">CaseNote :</label>
                      <b id="ti"/>
                    </div>

                    </div>
                    </div>
                  </div>
                  </div>

{{-- Modal Form Edit and Delete Post --}}
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">

          <div class="form-group">
            <label class="control-label col-sm-2"for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fid" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="title">Notes:</label>
            <div class="col-sm-10">
              <textarea type="name" class="form-control" id="t" cols="5" rows="5"></textarea>
            </div>
          </div>
        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Are You sure want to delete <span class="notes"></span>?
          <span class="hidden id"></span>
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>

      </div>
    </div>
  </div>
</div>
@endsection
