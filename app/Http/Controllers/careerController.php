<?php

namespace App\Http\Controllers;

use App\Models\career;
use Illuminate\Http\Request;

class careerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('careerPage');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->e_attachment);
        $request->validate([
            'e_name' => 'required|string|max:255',
            'e_ic' => 'required|string|max:20',
            'e_gender' => 'required|string',
            'e_address' => 'required|string',
            'e_quanlification' => 'required|string|max:255',
            'e_mstatus' => 'required|in:Single,Married',
            'e_email' => 'required|email|unique:careers',
            'e_contact' => 'required|string|max:15',
            'e_position' => 'required|string|max:255',
            'e_course' => 'required|string|max:255',
            'e_attachment' => 'nullable|array',
            'e_attachment.*' => 'nullable|file|mimes:pdf|max:2048',
        ]);
     
        
        $career = $request->except('e_attachment');
        
        if ($request->hasFile('e_attachment')) {
            $filePath=[];
            foreach($request->file('e_attachment') as $file){
                $filePath[] = $file->store('attachments', 'public');
            }
            
            $career['e_attachment'] = json_encode($filePath);
            
        }
        $career['e_status']="ACTIVE";
    
        career::create($career);
        return redirect()->route("careerForm")->with("success","career form submitted successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
