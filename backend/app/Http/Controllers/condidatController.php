<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\solihackathon;


class condidatController extends Controller
{
    public function insert(Request $request)

    {
        $insertData = new solihackathon();
        $insertData->email = $request->email;
        $insertData->idea = $request->idea;
        $insertData->status = $request->status;
        $insertData->save();
        if($insertData)
        {
            return 'your Idea has been added';
        }
        else
        {
            return 'try again';
        }
        return response()->json($insertData);
    }

    public function searsh($key)
    {
        $email = solihackathon::where('email', 'like','%'.$key.'%')->first();
        // return response()->json($email);
        if($email)
        {
            return 'email exist';
        }
        else
        {
            return 'emaail ne exist pas';
        }
    }

    public function selectID(Request $request)
    {
        // $getId = solihackathon::where('email', $request->email)->get();
        // return response()->json($getId->id);


            $getId = solihackathon::where('email', $request->email)->first();
            return $request->email;
            // return response()->json($getId->id, 200);

    }

    public function getIdea($id)
    {
        $getIdea = solihackathon::where('id', $id)->get();
        return response()->json($getIdea);

    }


    public function editIdea(Request $request, $id)
    {
        $editIdea = solihackathon::where('id', $id)->first();
        $editIdea->idea = $request->idea;
        $editIdea->save();
        if($editIdea)
        {
            return 'data has been edited';
        }else
        {
            return 'data not edited try again';
        }

        return response()->json($editIdea);
    }

    public function index()
    {
        $select = solihackathon::all();
        return response()->json($select);
    }

    public function valideIdea(Request $request, $id)
    {
        $editStatus = solihackathon::where('id', $id)->first();
        $editStatus->status = $request->status;
        $editStatus->save();
        if($editStatus->status == 1)
        {
            return 'idea valider';
        }
        elseif($editStatus->status == 0){
            return 'idea no valider';
        }

    }

    public function gatData()
    {
        $getdata = solihackathon::where('status', 1)->get();
        return response()->json($getdata);
    }

    public function selectCount(){
        $getdata = solihackathon::where('status', 1)->get();
        return $getdata->count();

    }

    public function delete()
    {
        $deleteIdea = solihackathon::where('status', 0)->delete();
        if($deleteIdea){
            return 'deleted';
        }
        else{
            return 'try againe';
        }
    }


}
