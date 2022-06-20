<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller {
    /**
     * SubCategory view page
     */
    public function subCategoryView() {
        $categories = Category::all();
        $subcategories = SubCategory::latest()->get();
        return view( 'backend.category.sub_category_view', compact( 'subcategories', 'categories' ) );
    }

    /**
     * SubCategory store
     */
    public function subCategoryStore( Request $request ) {

        // Validation
        $request->validate( [
            'subcategory_name' => 'required',
            'category_id'         => 'required',
        ],
            [
                'subcategory_name.required' => 'The sub category name is required!',
            ] );

        SubCategory::create( [
            'category_id'    => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower( str_replace( ' ', '-', $request->subcategory_name ) )
        ] );

        $notification = [
            'message'    => 'SubCategory Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with( $notification );

    }

    /**
     * SubCategory edit
     */
    public function subCategoryEdit( $id ) {
        $categories = Category::orderBy( 'category_name', 'ASC' )->get();
        $data = SubCategory::findOrFail( $id );
        return view( 'backend.category.sub_category_edit', compact( 'data', 'categories' ) );
    }

    /**
     * SubCategory update
     */
    public function subCategoryUpdate( Request $request ) {

        $subcategory_id = $request->id;

        SubCategory::findOrFail( $subcategory_id )->update( [
            'category_id'    => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower( str_replace( ' ', '-', $request->subcategory_name ) ),
        ] );

        $notification = [
            'message'    => 'Sub Category Updated Successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route( 'all.subcategory' )->with( $notification );

    }

    /**
     * SubCategory Delete
     */
    public function subCategoryDelete( $id ) {

        SubCategory::findOrFail( $id )->delete();

        $notification = [
            'message'    => 'SubCategory Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with( $notification );

    }



    //////////////////////////// ALL SUB->SUBCATEGORY METHOD //////////////////////////////

    /**
     * SubSubCategory view page
     */
    public function subSubCategoryView() {
        $categories = Category::all();
        $subsubcategories = SubSubCategory::latest()->get();
        return view( 'backend.category.sub_sub_category_view', compact( 'subsubcategories', 'categories' ) );
    }

    /**
     * Get SubCategory by ajax request
     */
    public function getSubCategory($category_id){
        $data = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();
        return json_encode($data);
    }

    /**
     * Get Sub->SubCategory by ajax request
     */
    public function getSubSubCategory($subcategory_id){
        $data = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name', 'ASC')->get();
        return json_encode($data);
    }

    /**
     * Sub-SubCategory store
     */
    public function subSubCategoryStore( Request $request ) {

        // Validation
        $request->validate( [
            'subsubcategory_name' => 'required',
            'category_id'         => 'required',
            'subcategory_id'         => 'required'
        ],
            [
                'subsubcategory_name_en.required' => 'The sub sub category name is required!'
            ] );

        SubSubCategory::create( [
            'category_id'    => $request->category_id,
            'subcategory_id'    => $request->subcategory_id,
            'subsubcategory_name' => $request->subsubcategory_name,
            'subsubcategory_slug' => strtolower( str_replace( ' ', '-', $request->subsubcategory_name ) ),
        ] );

        $notification = [
            'message'    => 'Sub-SubCategory Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with( $notification );

    }

    /**
     * Sub->SubCategory edit
     */
    public function subSubCategoryEdit( $id ) {
        $categories = Category::orderBy( 'category_name', 'ASC' )->get();
        $subcategories = SubCategory::orderBy( 'subcategory_name', 'ASC' )->get();
        $data = SubSubCategory::findOrFail( $id );
        return view( 'backend.category.sub_sub_category_edit', compact( 'data', 'categories', 'subcategories' ) );
    }

    /**
     * Sub->SubCategory update
     */
    public function subSubCategoryUpdate( Request $request ) {

        $subsubcategory_id = $request->id;

        SubSubCategory::findOrFail( $subsubcategory_id )->update( [
            'category_id'    => $request->category_id,
            'subcategory_id'    => $request->subcategory_id,
            'subsubcategory_name' => $request->subsubcategory_name,
            'subsubcategory_slug' => strtolower( str_replace( ' ', '-', $request->subsubcategory_name ) )
        ] );

        $notification = [
            'message'    => 'Sub Sub Category Updated Successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route( 'all.subsubcategory' )->with( $notification );

    }

    /**
     * Sub->SubCategory Delete
     */
    public function subSubCategoryDelete( $id ) {

        SubSubCategory::findOrFail( $id )->delete();

        $notification = [
            'message'    => 'Sub SubCategory Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with( $notification );

    }


}
