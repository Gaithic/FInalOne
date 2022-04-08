<?php 
namespace Netgen\Scert\Classes;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use Netgen\Scert\Models\Category;
use Netgen\Scert\Models\Ntse;
use Netgen\Scert\Models\ScholarshipExamination;
use Yajra\DataTables\Facades\DataTables;

class ScholarshipExaminationController extends Controller{

    /**
     * 
     *  Index
     * 
     */
    public function index(Request $request,$category){
        if($request->ajax()){
            $category = Category::where('name',$category)->first();
            $query = ScholarshipExamination::query()->where('category_id',$category->id)->orderBy('date','desc');
            return DataTables::of($query)
                    ->editColumn('title', function ($row) {
                        return '<a href="/scholarship-examination-details/'.$row->slug.'" target="_blank">'.$row->title.'</a> ';
                    })
                    ->rawColumns(['title'])

                    ->make(true);
        }
    }
}