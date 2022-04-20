<?php 
namespace Netgen\Scert\Classes;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Netgen\Scert\Models\Announcement;
use Netgen\Scert\Models\ScholarshipExamination;
use Yajra\DataTables\Facades\DataTables;

class AnnouncementController extends Controller{

    /**
     * 
     *  List of announcement
     * 
     */
    public function index(Request $request){
        if($request->ajax()){
            // $query = Announcement::query();
            $query = ScholarshipExamination::query();
            return DataTables::of($query)
                    ->editColumn('title', function ($row) {
                        return '<a href="/announcement-detail/'.$row->slug.'" target="_blank">'.$row->title.'</a> ';
                    })
                    ->editColumn('date',function($row){
                        return date("d-m-Y",strtotime($row->date));
                    })
                    ->rawColumns(['title'])
                    ->make(true);
        }
    }
}