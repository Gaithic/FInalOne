<?php

namespace Netgen\Examinations\Classes;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Netgen\Examinations\Models\ExamForm;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller{
    /**
     * 
     * User Dashboard 
     *  
     */    
    public function index(Request $request,$id){
        if($request->ajax()){
            $user = ExamForm::query()->where('user_id',$id);
            return DataTables::of($user)
                    ->addColumn('action', function($row){
                        $btn = '<a href="/view-exam-form/'.$row->id.'" target="_blank" class="btn btn-outline-primary btn-sm " title="View"><i class="fa fa-eye"></i></a>';
                        return $btn;
                    })
                    ->editColumn('is_approved', function ($user) {
                        if ($user->is_approved == 0) return 'Pending';
                        if ($user->is_approved == 1) return 'Accept';
                    })
                    ->editColumn('examination_id', function ($user) {
                        return $user->examination->name;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

}