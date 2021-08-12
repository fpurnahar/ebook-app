<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\EbookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataEbook = Ebook::orderBy('id', 'DESC')->paginate(10);
        return view('pages.ebook.list-ebook', compact('dataEbook'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ebookCategory = EbookCategory::get();
        return view('pages.ebook.add-ebook', compact('ebookCategory'));
    }


    public function search(Request $request)
    {
        if ($request->ajax()) {
            if ($request->search == null) {
                $searchEbooks = Ebook::paginate(10);
            } else {
                $searchEbooks = Ebook::where('title_ebook', 'LIKE', '%' . $request->search . "%")->paginate(10);
            }
            if ($searchEbooks) {
                return response($searchEbooks);
            }
        }
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
            'title_ebook' => 'required|max:50',
            'category_id' => 'required',
            'link_download' => 'required',
            'hashtag' => 'required',
            'description' => 'required|max:200',
            'image' => 'required|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $addEbook = new Ebook();
        $addEbook->category_id = $request->category_id;
        $addEbook->title_ebook = $request->title_ebook;
        $addEbook->link_download = $request->link_download;
        $addEbook->hashtag = $request->hashtag;
        $addEbook->description = $request->description;

        if ($request->hasFile('image')) {
            $fotoProduct = $request->image;
            $filename = time() . '_image.' . $fotoProduct->getClientOriginalExtension();
            $destinationPath = public_path() . '/dist/img/ebook-image/';
            $fotoProduct->move($destinationPath, $filename);
            $addEbook->image = '/dist/img/ebook-image/' . $filename;
        }
        // dd($addEbook);
        $addEbook->save();
        return redirect()->route('ebook.list')->with('success', 'Galery Berhasil Ditambahkan !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editEbook = Ebook::findOrFail($id);
        $editEbookCategory = EbookCategory::get();
        return view('pages.ebook.edit-ebook', compact('editEbook', 'editEbookCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ebook::destroy($id);
        return back()->with('success', 'Ebook Post Has Been Delete');
    }
}
