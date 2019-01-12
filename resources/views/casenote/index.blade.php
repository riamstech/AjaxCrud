
{{-- calling layouts \ app.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h2 class="display-6">Case Notes</h2>
  </div>
</div>

<div class="row m-2" >
  <a href="#" class="create-modal btn btn-success btn-sm" align="left">
    <i class="fa fa-plus"></i>
  </a>
</div>
{{ csrf_field() }}
@if($casenotes)


      @foreach ($casenotes as $casenote)
        <div class="row" id="casenotes">
        <div class="col-sm-12 post{{$casenote->id}}">
          <div class="card  border-warning mb-3">
            <div class="card-body">
              <h5 class="card-title">{{$casenote->created_at}} {{($casenote->employee_id)}} {{($casenote->employee_id)}}  {{($casenote->employee_id)}}</h5>
              <p> {{$casenote->updated_at}}</p>
              <p class="card-text">{{$casenote->notes}}</p>
            </div>
            <div class="card-footer">
              <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$casenote->id}}" data-notes="{{$casenote->notes}}" >
                <i class="fa fa-eye"></i>
              </a>
              <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$casenote->id}}" data-notes="{{$casenote->notes}}" >
                <i class="fa fa-pencil"></i>
              </a>
              <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$casenote->id}}" data-notes="{{$casenote->notes}}" >
                <i class="fa fa-trash"></i>
              </a>
            </div>
          </div>
        </div>
        </div>
      @endforeach

  @endif

{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title"></h4>
        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group row add">
            <label class="control-label col-sm-2 text-primary" for="title">CaseNote:</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control" id="notes" name="notes" placeholder="Case Note Here" cols="10" rows="5" required></textarea>
              {{--<p class="error text-center alert alert-danger" ></p>--}}
            </div>
          </div>
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="submit" id="add">
              <span class="fa fa-plus"></span> Save
            </button>
            <button class="btn btn-danger" type="button" data-dismiss="modal">
              <span class="fa fa-remove"></span> Close
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
          <h4 class="modal-title"></h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="" class="text-primary">ID :</label>
                      <b id="i"/>
                    </div>
                    <div class="form-group">
                      <label for="" class="text-primary">CaseNote :</label>
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
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
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
        <div class="deleteContent text-secondary">
          Are You sure want to delete note ? <span class="notes text-danger"></span>
          <span class="hidden id" hidden></span>
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="fa"></span>
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="fa fa"></span>close
        </button>

      </div>
    </div>
  </div>
</div>
@endsection
