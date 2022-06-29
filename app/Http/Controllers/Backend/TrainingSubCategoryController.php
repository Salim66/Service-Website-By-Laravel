<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\TrainingCategory;
use App\Models\TrainingSubCategory;
use App\Http\Controllers\Controller;

class TrainingSubCategoryController extends Controller
{
    /**
     * Training SubCategory view page
     */
    public function trainingSubCategoryView() {
        $categories = TrainingCategory::all();
        $subcategories = TrainingSubCategory::latest()->get();
        return view( 'backend.training-category.sub_category_view', compact( 'subcategories', 'categories' ) );
    }

    /**
     * Training SubCategory store
     */
    public function trainingSubCategoryStore( Request $request ) {

        // Validation
        $request->validate( [
            'training_subcategory_name' => 'required',
            'training_category_id'         => 'required',
        ],
            [
                'training_subcategory_name.required' => 'The sub category name is required!',
            ] );

        TrainingSubCategory::create( [
            'training_category_id'    => $request->training_category_id,
            'training_subcategory_name' => $request->training_subcategory_name,
            'training_subcategory_slug' => strtolower( str_replace( ' ', '-', $request->training_subcategory_name ) )
        ] );

        $notification = [
            'message'    => 'SubCategory Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with( $notification );

    }

    /**
     * Trainning SubCategory edit
     */
    public function trainingSubCategoryEdit( $id ) {
        $categories = TrainingCategory::orderBy( 'training_category_name', 'ASC' )->get();
        $data = TrainingSubCategory::findOrFail( $id );
        return view( 'backend.training-category.sub_category_edit', compact( 'data', 'categories' ) );
    }

    /**
     * Training SubCategory update
     */
    public function trainingSubCategoryUpdate( Request $request ) {

        $training_subcategory_id = $request->id;

        TrainingSubCategory::findOrFail( $training_subcategory_id )->update( [
            'training_category_id'    => $request->training_category_id,
            'training_subcategory_name' => $request->training_subcategory_name,
            'training_subcategory_slug' => strtolower( str_replace( ' ', '-', $request->training_subcategory_name ) ),
        ] );

        $notification = [
            'message'    => 'Sub Category Updated Successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route( 'all.training.subcategory' )->with( $notification );

    }

    /**
     * Training SubCategory Delete
     */
    public function trainingSubCategoryDelete( $id ) {

        TrainingSubCategory::findOrFail( $id )->delete();

        $notification = [
            'message'    => 'SubCategory Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with( $notification );

    }

}
