<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuardianNotification;
use App\Mail\appointment;
use App\Mail\sendappoiment;
use App\Models\AppointmentVerification;
use App\Models\content;
use App\Models\event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Image;
use App\Models\section;
use App\Models\Staff;
use Spatie\PdfToImage\Pdf;
use stdClass;

class SynergyController extends Controller
{
    public function index() // Renamed method to show the login form
    {
        $images = Image::all();
        $about_us_section=section::find(1);
        // dd($about_us_section->content);
        $history_section=section::find(2);
        $whochoose_section=section::find(3);
        $who_should_section=section::find(4);
        $events=event::all();
        
        return view('index',compact('images','about_us_section','history_section','whochoose_section','who_should_section','events')); // Ensure this view exists in your resources/views directory
    }

    public function modifycontentPage()
    {
        $sections=section::where('status',1)->get();
        return view('modfycontent',compact('sections'));
    }

    public function modifycontent($id,$course=null){
        $section=section::find($id);
        $content=$section->content;
        
        return view('editcontent',compact('section','content','course'));
    }
    public function eventPage()
    {
        $events=event::all();
        return view('event',compact('events'));
    }
    public function add_event(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string|max:50',
            'location' => 'required|string|max:255',
        ]);

        $event = new event();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('assets/images', 'public');
            $event->image = 'storage/'.$path;
        }
        $event->title = $request->input('title');
        $event->date = $request->input('date');
        $event->time = $request->input('time');
        $event->location = $request->input('location');
        $event->save();

        return redirect()->route('eventPage')->with("success","Event added successfully");
    }

    public function edit_event(event $event, Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string|max:50',
            'location' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('assets/images', 'public');
            $event->image = 'storage/'.$path;
        }
        $event->title = $request->input('title');
        $event->date = $request->input('date');
        $event->time = $request->input('time');
        $event->location = $request->input('location');
        $event->save();

        return redirect()->route('eventPage')->with("success","Event updated successfully");
    }
    public function delete_event(event $event)
    {
        $event->delete();
        return redirect()->route('eventPage')->with("success","Event deleted successfully");
    }

    public function updatecontent(Request $request,$id)
    {
        $content=content::find($id);
       
        if($content->content_type=="short_content"){
            $jsonData=json_decode($content->content,true);
            
            foreach($jsonData as $key=>$value){
                if(!is_array($value)){
                    $jsonData[$key]=$request->$key;
                }else{
                    // dd($value);
                    $imagePath=$value;
                    foreach($value as $index=>$image){
                        if($request->hasFile("image$index")){
                            $image = $request->file("image$index");
                            $path = $image->store('assets/images', 'public');
                            $imagePath[$index]='storage/'.$path;
                        }
                    }
                    $jsonData[$key]=$imagePath;
                    // dd($jsonData[$key]);
                }
                
            }
            $content->content=json_encode($jsonData);
        }elseif($content->content_type=="long_content"){
            $jsonData=json_decode($content->content,true);
            foreach($jsonData as $key=>$value){
                
                $jsonData[$key]=$request->$key;
            }
            $content->content=json_encode($jsonData);
        }elseif($content->content_type=="pointform_content"){
            $jsonData=new stdClass();
            $pointforms=$request->content;
            foreach($pointforms as $index=>$value){
                if($value==""){
                    continue;
                }
                $jsonData->paragraph[]=$value;
            }
            $content->content=json_encode($jsonData);
        }elseif($content->content_type=="imagepointform_content"){
            $jsonData = json_decode($content->content) ?? [];
            
            if (!is_array($jsonData)) {
                $jsonData = [];
            }
             
            foreach ($request->paragraph as $index => $value) {
                
                // if (!isset($jsonData[$index]) || !is_array($jsonData[$index])) {
                //     $jsonData[$index] = ['paragraph' => '', 'img' => null];
                // }
               
                
                $jsonData[$index]->paragraph = $value;
            
                if ($request->hasFile("image$index")) {
                    $image = $request->file("image$index");
                    $path = $image->store('assets/images', 'public');
                    $jsonData[$index]->img = 'storage/'.$path;
                }

            }
            
            // dd(json_encode($jsonData));
            $content->content = json_encode($jsonData);
            $content->save();
        }elseif($content->content_type=="imagepointtitleform_content"){
            $jsonData=json_decode($content->content,true)??[];
            
            $jsonData["title"]=$request->title;
            $jsonData["paragraph"]=$request->paragraph;
            if($request->hasFile("image")){
                $image = $request->file("image");
                $path = $image->store('assets/images', 'public');
                $jsonData["img"]='storage/'.$path;
            }
            // dd(json_encode($jsonData));
            
            $content->content=json_encode($jsonData);

        }elseif($content->content_type=="mulimagepointtitleform_content"){
            
            $jsonData=json_decode($content->content,true)??[];
            foreach($request->title as $index=>$value){
                $jsonData[$index]["title"]=$value;
                $jsonData[$index]["paragraph"]=$request->paragraph[$index];
            }
            // dd(json_encode($jsonData));
            $content->content=json_encode($jsonData);
        }elseif($content->content_type=="imageform_content"){
            $jsonData=json_decode($content->content,true)??[];
            
            foreach ($request->input('title', []) as $index => $item) {
                
                $jsonData[$index]['content'] = $item;
                if ($request->hasFile("image$index")) {
                    $image = $request->file("image$index");
                    $path = $image->store('assets/images', 'public');
                    $jsonData[$index]['img'] = 'storage/' . $path;
                }
            }
            // dd(json_encode(["convocation_img"=>$jsonData]));
            $content->content=json_encode($jsonData);

        }elseif($content->content_type=="pdfform_content"){
            $request->validate([
                'student_handbook' => 'required|file|mimes:pdf|max:10000', // Max 10MB
            ]);

            $jsonData = json_decode($content->content, true) ?? [];
            if ($request->hasFile('student_handbook')) {
                $pdfFile = $request->file('student_handbook');
                $pdfPath = $pdfFile->store('pdfs', 'public'); // Store original PDF temporarily
    
                // Convert PDF to images
                $pdf = new Pdf(storage_path('app/public/' . $pdfPath));
                $pageCount = $pdf->getNumberOfPages();
    
                $imagePaths = [];
                for ($page = 1; $page <= $pageCount; $page++) {
                    $outputPath = 'assets/images/pdf_page_' . time() . '_' . $page . '.jpg';
                    $fullOutputPath = storage_path('app/public/' . $outputPath);
    
                    // Ensure the directory exists
                    if (!file_exists(dirname($fullOutputPath))) {
                        mkdir(dirname($fullOutputPath), 0755, true);
                    }
    
                    // Convert page to image
                    $pdf->setPage($page)
                        ->setOutputFormat('jpg')
                        ->saveImage($fullOutputPath);
    
                    $imagePaths[] = 'storage/' . $outputPath; // Path for asset()
                }
    
                // Add image paths to JSON
                $jsonData['images'] = $imagePaths;
    
                // Optional: Delete the original PDF if you don’t need it
                // Storage::disk('public')->delete($pdfPath);
            }
            dd(json_encode($jsonData));
            $content->content = json_encode($jsonData);
        }elseif($content->content_type=="html_content"){
            $jsonData=json_decode($content->content,true);
            $jsonData[$request->course]['content']=$request->content;
            
            if($request->hasFile("image")){
                $image = $request->file("image");
                $path = $image->store('assets/images', 'public');
                $jsonData[$request->course]["image"]='storage/'.$path;
            }
            
            // dd($jsonData);
            $content->content=json_encode($jsonData);
        }elseif($content->content_type=="directory_content"){
            $jsonData=json_decode($content->content,true)??[];
            foreach($request->name as $index=>$value){
                $jsonData[$index]["name"]=$value;
                $jsonData[$index]["position"]=$request->position[$index];
                $jsonData[$index]["phone"]=$request->phone[$index];
                $jsonData[$index]["email"]=$request->email[$index];

            }
            // dd(json_encode($jsonData));
            $content->content=json_encode($jsonData);
        }
        
        $content->save();
        return redirect()->route('modifycontentPage')->with("success","content update successfully");
        
    }

    public function showLoginForm() // Renamed method to show the login form
    {
        return view('login'); // Ensure this view exists in your resources/views directory
    }


    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Use 'name' as the column for username
        $user = User::where('name', $request->name)->first();


        if (!$user) {
            return back()->withErrors(['name' => 'The username does not exist.']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'The password is incorrect.']);
        }

        Auth::login($user);
        return redirect('dashboard')->with('success', 'You have successfully logged in!');
    }



    public function submitForm(Request $request)
{

    // $validator = Validator::make(request()->all(),[
    //     'full_name' => 'required|string|max:255',
    //     'ic_no' => 'required|string|max:20',
    //     'nationality' => 'required|string',
    //     'gender' => 'required|string',
    //     'race' => 'required|string',
    //     'marital_status' => 'required|string',
    //     'address' => 'required|string',
    //     'postcode' => 'required|string|max:10',
    //     'state' => 'required|string',
    //     'contact_no' => 'required|string|max:15',
    //     'guardian_contact_no' => 'required|string|max:15',
    //     'email' => 'required|email|max:255|unique:students,email',
    //     'course' => 'required|string',
    //     'secondary_school' => 'required|string|max:255',
    // ]);

    // // dd($validator->fails());

    // if($validator->fails()){
    //     return redirect()->back()->with('id','subscribe');
    // }

    // Validate the request data
    $validatedData = $request->validate([
        'full_name' => 'required|string|max:255',
        'ic_no' => 'required|string|max:20',
        'nationality' => 'required|string',
        'gender' => 'required|string',
        'race' => 'required|string',
        'marital_status' => 'required|string',
        'address' => 'required|string',
        'postcode' => 'required|string|max:10',
        'state' => 'required|string',
        'contact_no' => 'required|string|max:15',
        'guardian_contact_no' => 'required|string|max:15',
        'email' => 'required|email|max:255|unique:students,email',
        'course' => 'required|string',
        'secondary_school' => 'required|string|max:255',
    ]);

    $validatedData["status"]="ACTIVE";

    // Create a new student record
    Student::create($validatedData);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Registration submitted successfully!')
                            ->with('id','subscribe');
}






public function form()
{
    // Fetch all students
    $students = Student::all(); // This remains unchanged
    $students = Student::paginate(10); // Add pagination here
    
    // Return view with both students and paginated data
    return view('table', compact('students', 'students'));
}



//     public function form(Request $request)
// {
//     $perPage = $request->input('per_page', 10); // Default to 10
//     $students = Student::paginate($perPage);
//     return view('table', compact('students'));
// }



    // Show edit form for a student
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('edit-student', compact('student')); // Create this view for the edit form
    }

    // Update student data
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'ic_no' => 'required|string|max:20',
            'nationality' => 'required|string',
            'gender' => 'required|string',
            'race' => 'required|string',
            'marital_status' => 'required|string',
            'address' => 'required|string',
            'postcode' => 'required|string|max:10',
            'state' => 'required|string',
            'contact_no' => 'required|string|max:15',
            'guardian_contact_no' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:students,email,' . $id,
            'course' => 'required|string',
            'secondary_school' => 'required|string|max:255',
        ]);

        // Update the student's data
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student Updated Successfully!');
    }

    // Delete a student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student Deleted Successfully!');
    }



    public function testimonial() 
    {
        $what_student_say=section::find(10);
        return view('testimonial',compact('what_student_say')); 
    }

    public function course() 
    {
        $our_course=section::find(11);
        return view('course',compact('our_course')); 
    }

    public function service() 
    {
        $study_load=section::find(6);
        $student_affair=section::find(7);
        $convocation=section::find(8);
        $policy=section::find(9);
        return view('service',compact('study_load','student_affair','convocation','policy')); 
    }

    public function directory() 
    {
        // Fetch all staff members from the database
        $staff = section::find(12);

        // Pass the $staff data to the view
        return view('directory', compact('staff')); 
    }
    
    public function contact() 
    {
        return view('contact'); 
    }

    // public function dashboard() 
    // {
    //     $studentStatus = [
    //        'contact' => Student::where('status','Already Contacted')->count(),
    //        'contact1' => Student::where('status','Declined')->count(),
    //        'contact2' => Student::where('status','Pending')->count(),
    //     ];
    
    //     // Monthly counts for 'Already Contacted'
    //     $monthlyContacted = Student::select(
    //         DB::raw("DATE_FORMAT(created_at, '%M') as month"),
    //         DB::raw('COUNT(*) as total')
    //     )
    //     ->where('status', 'Already Contacted')
    //     ->groupBy('month')
    //     ->orderBy(DB::raw("MONTH(created_at)")) // Ensure correct month order
    //     ->get();
    
    //     // Full list of 'Already Contacted' people grouped by month
    //     $contactedPeople = Student::select(
    //         'full_name', 
    //         'created_at',
    //         DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month")
    //     )
    //     ->where('status', 'Already Contacted')
    //     ->orderBy('created_at', 'asc')
    //     ->get()
    //     ->groupBy('month');
    
    //     // New logic: Group appointments by month
    //     $appointments = Student::select(
    //         'full_name', 
    //         'appointment_date',
    //         DB::raw("DATE_FORMAT(appointment_date, '%M %Y') as month")
    //     )
    //     ->whereNotNull('appointment_date') // Only students with set appointments
    //     ->orderBy('appointment_date', 'asc') // Order by appointment date
    //     ->get()
    //     ->groupBy('month'); // Group by month
    
    //     return view('dashboard', [
    //         'studentStatus' => $studentStatus,
    //         'monthlyContacted' => $monthlyContacted,
    //         'contactedPeople' => $contactedPeople, // Pass data for the table
    //         'appointments' => $appointments, // New grouped appointments data
    //     ]);
    // }
    
    public function dashboard() 
    {
        $studentStatus = [
            'contact' => Student::where('status','Already Contacted')->count(),
            'contact1' => Student::where('status','Declined')->count(),
            'contact2' => Student::where('status','Pending')->count(),
        ];
    
        // Monthly registrations (Total students registered each month)
        $monthlyRegistrations = Student::select(
            DB::raw("DATE_FORMAT(created_at, '%M %Y') as month"),
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('month')
        ->orderBy(DB::raw("MIN(created_at)")) // Order by the earliest registration date
        ->get();
    
        // Existing logic for 'Already Contacted' data
        $monthlyContacted = Student::select(
            DB::raw("DATE_FORMAT(created_at, '%M') as month"),
            DB::raw('COUNT(*) as total')
        )
        ->where('status', 'Already Contacted')
        ->groupBy('month')
        ->orderBy(DB::raw("MONTH(created_at)")) // Ensure correct month order
        ->get();
    
        // Full list of 'Already Contacted' people grouped by month
        $contactedPeople = Student::select(
            'full_name', 
            'created_at',
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month")
        )
        ->where('status', 'Already Contacted')
        ->orderBy('created_at', 'asc')
        ->get()
        ->groupBy('month');
    
        // New logic: Group appointments by month
        $appointments = Student::select(
            'full_name', 
            'appointment_date',
            DB::raw("DATE_FORMAT(appointment_date, '%M %Y') as month")
        )
        ->whereNotNull('appointment_date') // Only students with set appointments
        ->orderBy('appointment_date', 'asc') // Order by appointment date
        ->get()
        ->groupBy('month'); // Group by month
    
        return view('dashboard', [
            'studentStatus' => $studentStatus,
            'monthlyRegistrations' => $monthlyRegistrations, // Monthly student registration data
            'monthlyContacted' => $monthlyContacted,
            'contactedPeople' => $contactedPeople, // Pass data for the table
            'appointments' => $appointments, // New grouped appointments data
        ]);
    }
    

//     public function updateStatus(Request $request)
// {
//     $request->validate([
//         'student_id' => 'required|exists:students,id',
//         'status' => 'required|in:Already Contacted,Declined,Pending',
//     ]);

//     // Find the student and update the status
//     $student = Student::findOrFail($request->student_id);
//     $student->status = $request->status;
//     $student->save();

//     // Optionally, you can return the updated student back to the view
//     return redirect()->route('students.index', ['student' => $student->id]);
// }

public function updateStatus(Request $request)
{
    // Validate the input data
    $request->validate([
        'student_id' => 'required|exists:students,id',
        'status' => 'required|in:Already Contacted,Declined,Pending',
    ]);

    // Find the student and update the status
    $student = Student::findOrFail($request->student_id);
    $student->status = $request->status;
    $student->save();

    // Get the updated count for each status
    $pending = Student::where('status', 'Pending')->count();
    $declined = Student::where('status', 'Declined')->count();
    $alreadyContacted = Student::where('status', 'Already Contacted')->count();

    // Return to the dashboard (or the relevant page) with the updated status counts
    return redirect()->route('students.index');
}


public function notice() 
    {
        return view('notice'); 
    }


    public function store(Request $request)
{
    $student = new Student();
    $student->full_name = $request->input('full_name');
    $student->ic_no = $request->input('ic_no');
    // Other fields...

    // Automatically set the registration date
    $student->registration_date = Carbon::now()->toDateString(); // Automatically set to current date

    $student->save();

    return redirect()->route('students.index')->with('success', 'Student registered successfully!');
}





public function showCalendar(Request $request)
{
    // Get current month and year or use the input month and year
    $currentDate = \Carbon\Carbon::createFromFormat('Y-m', $request->input('month', \Carbon\Carbon::now()->format('Y-m')));
    
    // Retrieve students' full names and registration dates for the selected month
    $students = DB::table('students')
        ->select('*')
        ->whereMonth('created_at', $currentDate->month)
        ->whereYear('created_at', $currentDate->year)
        ->get();

    // Group students by the date part of created_at
    $groupedStudents = $students->groupBy(function ($student) {
        return \Carbon\Carbon::parse($student->created_at)->toDateString();
    });

    return view('notice', [
        'groupedStudents' => $groupedStudents,
        'currentMonth' => $currentDate->format('Y-m'), 
    ]);
}

// public function showCalendar(Request $request)
// {
//     // Get current month and year or use the input month and year
//     $currentMonth = \Carbon\Carbon::createFromFormat('Y-m', $request->input('month', \Carbon\Carbon::now()->format('Y-m')));

//     // Retrieve students' full names and registration dates for the selected month
//     $students = DB::table('students')
//         ->select('full_name', 'created_at') // Adjust columns as needed
//         ->whereMonth('created_at', $currentMonth->month)
//         ->whereYear('created_at', $currentMonth->year)
//         ->get();

//     // Group students by the date part of created_at
//     $groupedStudents = $students->groupBy(function ($student) {
//         return \Carbon\Carbon::parse($student->created_at)->toDateString();
//     });

//     // Fetch public holidays from API
//     $year = $currentMonth->year;
//     $holidaysResponse = Http::get("https://date.nager.at/api/v2/PublicHolidays/{$year}/MY");
//     $holidays = $holidaysResponse->json();

//     // Filter holidays for the current month
//     $monthlyHolidays = collect($holidays)->filter(function ($holiday) use ($currentMonth) {
//         return \Carbon\Carbon::parse($holiday['date'])->month == $currentMonth->month;
//     });

//     // Combine student data and holidays into a single dataset
//     $events = [];
//     foreach ($groupedStudents as $date => $students) {
//         $events[$date]['students'] = $students;
//     }
//     foreach ($monthlyHolidays as $holiday) {
//         $date = $holiday['date'];
//         $events[$date]['holiday'] = $holiday['localName']; // Local name of the holiday
//     }

//     // Pass data to the view
//     return view('notice', compact('events', 'currentMonth'));
// }



public function assignAppointment(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'appointment_date' => 'required|date',
    ]);

    // Find the student by ID
    $student = Student::find($id);

    // Assign the appointment date to the student
    $student->appointment_date = $request->appointment_date;
    $student->save();


    // Redirect back to the calendar page with a success message
    return redirect()->route('showCalendar')->with('success', 'Appointment assigned successfully!');
}



public function deleteAppointment($id)
{
    // Find the student by ID
    $student = Student::find($id);

    if ($student) {
        // Remove the appointment date
        $student->appointment_date = null;
        $student->save();

        // Redirect back with a success message
        return redirect()->route('showCalendar')->with('success', 'Appointment date deleted successfully!');
    }

    // If student not found, redirect back with an error message
    return redirect()->route('showCalendar')->with('error', 'Student not found.');
}



// public function emailGuardian($id)
// {
//     // Retrieve the student data, including the email
//     $student = Student::findOrFail($id);

//     // Ensure the email exists
//     if (!$student->email) {
//         return redirect()->back()->with('error', 'No email address found for this guardian.');
//     }

//     // Define the email parameters
//     $subject = 'Update from Synergy College';
//     $body = "Hello Guardian,\n\nWe would like to update you regarding your child's current status. Please reach out for more details.\n\nBest regards,\nSynergy College";

//     // Encode subject and body for URL
//     $subject = urlencode($subject);
//     $body = urlencode($body);

//     // Create the mailto link using the guardian's email
//     $mailtoLink = "mailto:{$student->email}?subject={$subject}&body={$body}";

//     // Redirect to the generated mailto link
//     return redirect()->away($mailtoLink);
// }

// public function emailGuardian($id)
// {
//     // Retrieve the student data, including the email
//     $student = Student::findOrFail($id);

//     // Ensure the email exists
//     if (!$student->email) {
//         return redirect()->back()->with('error', 'No email address found for this guardian.');
//     }

//     // Define the email parameters
//     $subject = 'Update from Synergy College';
//     $body = "Hello Guardian,\n\nWe would like to update you regarding your child's current status. Please reach out for more details.\n\nBest regards,\nSynergy College";

//     // Encode subject and body for URL
//     $subject = urlencode($subject);
//     $body = urlencode($body);

//     // Replace '+' with '%20' in both subject and body to avoid '+' in the URL
//     $subject = str_replace('+', '%20', $subject);
//     $body = str_replace('+', '%20', $body);

//     // Create the mailto link using the guardian's email
//     $mailtoLink = "mailto:{$student->email}?subject={$subject}&body={$body}";

//     // Return the mailto link as a JSON response
//     return response()->json(['mailtoLink' => $mailtoLink]);
// }




// public function emailGuardian($id)
// {
//     // Retrieve the student data, including the email
//     $student = Student::findOrFail($id);

//     // Ensure the email exists
//     if (!$student->email) {
//         return redirect()->back()->with('error', 'No email address found for this guardian.');
//     }

//     // Define the email parameters
//     $subject = 'Update from Synergy College';
//     $body = "Hello Guardian,\n\nWe would like to update you regarding your child's current status. Please reach out for more details.\n\nBest regards,\nSynergy College";

//     // Encode subject and body for URL
//     $subject = urlencode($subject);
//     $body = urlencode($body);

//     // Replace '+' with '%20' in both subject and body to avoid '+' in the URL
//     $subject = str_replace('+', '%20', $subject);
//     $body = str_replace('+', '%20', $body);

//     // Create the mailto link using the guardian's email
//     $mailtoLink = "mailto:{$student->email}?subject={$subject}&body={$body}";

//     // Return the mailto link as a JSON response
//     return response()->json(['mailtoLink' => $mailtoLink]);
// }



public function emailGuardian($id)
{
    // Retrieve the student data, including the email
    $student = Student::findOrFail($id);

    // Ensure the email exists
    if (!$student->email) {
        return response()->json(['error' => 'No email address found for this guardian.']);
    }

    // Send the email to the guardian
    Mail::to($student->email)->send(new GuardianNotification($student));

    // Return success response
    return redirect()->route("students.index")->with('success', 'Email Sending Success!');
}



// public function image() 
//     {
//         return view('image'); 
//     }
   


public function image()
{
    $images = Image::all(); // Fetch all images from the database
    return view('image', ['images' => $images]);
}


public function updateImage(Request $request, $id)
{
    $image = Image::findOrFail($id); // Find the image record
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/images'), $filename);

        // Update the database record
        $image->update(['image_url' => $filename]);
    }

    return redirect()->route('image')->with('success', 'Image updated successfully');
}
   
public function update_new()
{
   

    $staff = Staff::all();

    return view('update_new', [
        'staff'=>$staff,
    ]);
}


public function updateContact(Request $request, $id)
{
    // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:255',
       
    ]);

   

    // Find the staff member by ID
    $staffMember = Staff::find($id);

    if ($staffMember) {
        // Update the staff member's contact information
        $staffMember->name = $request->input('name');
        $staffMember->email = $request->input('email');
        $staffMember->phone = $request->input('phone');
        // $staffMember->position = $request->input('position');
        $staffMember->save();

        // After saving, redirect back with a success message
        return redirect()->back()->with('success', 'Contact updated successfully!');
    } else {
        return redirect()->back()->with('error', 'Staff member not found.');
    }
}


public function appointment()
{
    // Get students with appointment dates
    $students = DB::table('students')->whereNotNull('appointment_date')->get();

    // Pass the students to the view
    return view('appointment', ['students' => $students]); 
}


public function sendReminder(Request $request)
{
    
  
        
        $student_id = $request->student_id;
        $verificationNumber = rand(100000, 999999);
        
        
        $student=student::find($student_id);
        
        $appointment=AppointmentVerification::create([
            "student_id"=>$student->id,
            "verification_code"=>$verificationNumber,
            "is_verified"=>0
        ]);

        $email=$student->email;
        // return $appointment;
        // Send email (you can customize this)
        
        $sendmail=Mail::to($email)->send(new sendappoiment($appointment,$student));
        if($sendmail){
            return response()->json(['success' => true, 'message' => 'Reminder sent successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'mail seeding fail!']);
    
}


public function verifyCode(Request $request)
{
    $code = $request->input('code');
    
    // Check if the code exists in the table
    $verification = DB::table('appointment_verifications')
        ->where('verification_code', $code)
        ->first();

    if ($verification) {
        // Update the is_verified column to 1 (true)
        DB::table('appointment_verifications')
            ->where('verification_code', $code)
            ->update(['is_verified' => 1]);

        return response()->json(['success' => true, 'message' => 'Verification successful!']);
    } else {
        return response()->json(['success' => false, 'message' => 'Invalid verification code.']);
    }
}

public function getStudentDetails(Request $request)
{
    $code = $request->query('code');

    // Find the verification entry and corresponding student
    $verification = DB::table('appointment_verifications')
        ->where('verification_code', $code)
        ->first();

    if ($verification) {
        $student = DB::table('students')->where('id', $verification->student_id)->first();

        if ($student) {
            return response()->json(['success' => true, 'student' => $student]);
        }
    }

    return response()->json(['success' => false, 'message' => 'Student details not found.']);
}



}