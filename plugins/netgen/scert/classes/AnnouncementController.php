<?php 
namespace Netgen\Scert\Classes;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Netgen\Scert\Models\Announcement;
use Yajra\DataTables\Facades\DataTables;

class AnnouncementController extends Controller{

    /**
     * 
     *  Index
     * 
     */
    public function index(Request $request){
        if($request->ajax()){
            $query = Announcement::query();
            return DataTables::of($query)
                    ->editColumn('title', function ($row) {
                           return '<a href="/announcement-detail/'.$row->slug.'" target="_blank">'.$row->title.'</a> ';
                    })
                    ->rawColumns(['title'])
                    ->make(true);
        }
    }
}