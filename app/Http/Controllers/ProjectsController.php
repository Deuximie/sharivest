<?php

namespace App\Http\Controllers;

use Session;
use App\Project;
use App\Category;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.project.index')->with('projects', Project::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0)
        {
            Session::flash('info', 'Untuk membuat project, kategori dibutuhkan minimal 1');
            return redirect()->back();
        }

        return view('admin.project.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'judul'           =>  'required',
          'lokasi'          =>  'required',
          'dana_need'       =>  'required',
          'profit'          =>  'required',
          'resiko'          =>  'required',
          'mulai_proyek'    =>  'required',
          'selesai_proyek'  =>  'required',
          'deskripsi'       =>  'required|mimes:pdf,doc,docx|max:3000',
          'gambar'          =>  'required|image|max:1000',
          'category_id'     =>  'required'
        ]);

        //simpan gambar dan deskripsi pdf
        $featured = $request->deskripsi;
        $featured_new_name =   time().$featured->getClientOriginalName();
        $featured->move('uploads/projects/deskripsi', $featured_new_name);

        $featured1          =   $request->gambar;
        $featured1_new_name =   time().$featured1->getClientOriginalName();
        $featured1->move('uploads/projects/gambar', $featured1_new_name);


        $project  = Project::create([
            'judul'           =>  $request->judul,
            'lokasi'          =>  $request->lokasi,
            'dana_need'       =>  $request->dana_need,
            'profit'          =>  $request->profit,
            'resiko'          =>  $request->resiko,
            'mulai_proyek'    =>  $request->mulai_proyek,
            'selesai_proyek'  =>  $request->selesai_proyek,
            'deskripsi'       =>  'uploads/projects/deskripsi/'. $featured_new_name,
            'gambar'          =>  'uploads/projects/gambar/'. $featured1_new_name,
            'category_id'     =>  $request->category_id,
            'slug'            =>  str_slug($request->judul),
            'status'          =>  0,
            'dana_collect'    =>  0
        ]);

        Session::flash('success', 'Berhasil membuat project baru');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        return view('admin.project.edit')->with('project', $project)
                                         ->with('categories',  Category::all());
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
        $this->validate($request, [
          'judul'           =>  'required',
          'lokasi'          =>  'required',
          'dana_need'       =>  'required',
          'profit'          =>  'required',
          'resiko'          =>  'required',
          'mulai_proyek'    =>  'required',
          'selesai_proyek'  =>  'required',
          'category_id'     =>  'required'
        ]);

        $project = Project::find($id);

        if($request->hasFile('deskripsi'))
        {
            $featured = $request->deskripsi;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/projects/deskripsi', $featured_new_name);
            $project->deskripsi = 'uploads/projects/deskripsi/'.$featured_new_name;
        }

        $gambar_name = $project->gambar;
        if($request->hasFile('gambar'))
        {
          $featured1 = $request->gambar;
          $featured1_new_name = time() . $featured1->getClientOriginalName();
          $featured1->move('uploads/projects/gambar', $featured1_new_name);
          $project->gambar = 'uploads/projects/gambar/'.$featured1_new_name;
        }

        $project->judul             = $request->judul;
        $project->lokasi            = $request->lokasi;
        $project->dana_need         = $request->dana_need;
        $project->profit            = $request->profit;
        $project->resiko            = $request->resiko;
        $project->mulai_proyek      = $request->mulai_proyek;
        $project->selesai_proyek    = $request->selesai_proyek;
        $project->category_id       = $request->category_id;

        $project->save();

        Session::flash('success', 'Berhasil mengupdate Project '. $project->judul);
        return redirect()->route('projects');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();

        Session::flash('success', 'Berhasil menghapus project');
        return redirect()->back();

    }
}
