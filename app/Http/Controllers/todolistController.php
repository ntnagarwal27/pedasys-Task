<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\User;
use App\Mail\statusmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class todolistController extends Controller
{
    function createItem(Request $req){
    
     
      $item = New item;
      $item->title       = $req->title;
      $item->attachment  = $req->attachment;
      $item->due_date    = $req->due_date;
      $item->reminder    = $req->reminder;
      $item->user_id     = $req->user_id;
      $item->status      = 0;
      $resp = $item->save();
       if($resp){
              return ["Success"=>"Item Saved"];
          }
        else{
              return ["Error"=>"Unable to save"];
        }
    }

    function fileupload(Request $req){
         
            $result = $req->file('file')->store('ApiDocs');  
            return ["result"=>$result];
    }

    function todoList(){

            $list = item::orderBy('due_date', 'ASC')->get();
            return $list;
    }

    function fetchItems($condition = null){

         $status = ($condition == 'complete' ? 1 : 0); 
         $list = item::where('status',$status)->get();
         return $list;

    }


    function update(Request $req){

      $item = item::find($req->id);
      $item->title       = $req->title;
      $item->attachment  = $req->attachment;
      $item->due_date    = $req->due_date;
      $item->reminder    = $req->reminder;
      $item->user_id     = $req->user_id;
      $item->status      = $req->status;
      $resp = $item->save();
      if($resp){
              return ["Success"=>"Item Updated"];
          }
        else{
              return ["Error"=>"Unable to Update"];
        }
    }


    function deleteItem($id){
         $item = item::find($id);
         $resp = $item->delete(); 
         if($resp){
              return ["Success"=>"Item Deleted"];
          }
        else{
              return ["Error"=>"Unable to Delete"];
        }

    }

    function updateitemstatus($id){

      $item = item::find($id);
      $item->status      = 1;
      $resp = $item->save();
      if($resp){
              return ["Success"=>"Item status Updated"];
          }
        else{
              return ["Error"=>"Unable to Update"];
        }
    }

    public function sendEmail(){

       $users = DB::table('items')
            ->join('users', 'items.user_id', '=', 'users.id')
            ->select('users.email', 'items.title','items.due_date','items.reminder')
            ->where('items.status',0)
            ->get();
            
            foreach($users as $key => $user){
            if(Carbon::now()->addDays($user->reminder)->format('Y-m-d') == $user->due_date){
            $details = [
            'title'=>'Item Reminder: '.$user->title,
            'body'=>"Please complete your task by ".date("M jS, Y", strtotime($user->due_date))
        ];
        Mail::to($user->email)->send(new statusmail($details));
        }
    }
    return ["success"=>"email Sent"];
  }
}
