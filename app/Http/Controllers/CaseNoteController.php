<?php
namespace App\Http\Controllers;
use App\CaseNotes;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
class CaseNoteController extends Controller
{

    public function index()
    {
        $casenotes = CaseNotes::orderBy('created_at', 'desc')->get();
        return view('casenote.index', compact('casenotes'));
    }


    public function addCaseNote(Request $request)
    {
        $rules = array(
            'notes' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toarray()));

        else
        {
            $casenote = new CaseNotes;
            $casenote->patients_id = 1;
            $casenote->employee_id =1;
            $casenote->notes = $request->notes;
            $casenote->status_id = 1;

            $casenote->save();
            return response()->json($casenote);
        }
    }

    public function editCaseNote(request $request)
    {
        $casenote=CaseNotes::find ($request->id);
        $casenote->notes = $request->notes;
        $casenote->save();
        return response()->json($casenote);
    }

    public function deleteCaseNote(request $request)
    {
        $casenote=CaseNotes::find ($request->id)->delete();
        return response()->json();
    }

}
