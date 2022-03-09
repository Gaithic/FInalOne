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
                    ->addColumn('action', function($row){
                        if($row->is_open_file == 0){
                            $btn = '<a href="/announcement-detail/'.$row->slug.'" target="_blank" class="btn btn-outline-primary btn-sm " title="View"><i class="fa fa-eye"></i></a>';
                        }
                        else{
                            $btn = '<a href="/storage/app/media'.$row->file.'" target="_blank" class="btn btn-outline-primary btn-sm " title="View"><i class="fa fa-eye"></i></a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }
}