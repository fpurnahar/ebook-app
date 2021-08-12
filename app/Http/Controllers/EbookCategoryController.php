<?php

namespace App\Http\Controllers;

use App\Models\EbookCategory;
use Illuminate\Http\Request;

class EbookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.

     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataEbookCatagory = EbookCategory::get();
        return view('pages.ebook-category.list-ebook-category', compact('dataEbookCatagory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
        ]);

        $addEbookCatagory = new EbookCategory();
        $addEbookCatagory->name = $request->name;
        $addEbookCatagory->save();
        return back()->with('success', 'Ebook Category Has Been Added !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EbookCategory::destroy($id);
        return back()->with('success', 'Ebook Category Has Been Deleted');
    }
}
