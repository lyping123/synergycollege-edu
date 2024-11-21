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
use Illuminate\Support\Facades\DB;




class SynergyController extends Controller
{
    public function index() // Renamed method to show the login form
    {
        return view('index'); // Ensure this view exists in your resources/views directory
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
    return redirect('students')->with('success', 'You have successfully logged in!');
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

    // Create a new student record
    Student::create($validatedData);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Registration submitted successfully!')
                            ->with('id','subscribe');
}






    public function form()
    {
        // Fetch all students
        $students = Student::all();
        // dd($students);
        
        // Return view with students data
        return view('table', compact('students'));
    }



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
        return view('testimonial'); 
    }

    public function course() 
    {
        return view('course'); 
    }

    public function service() 
    {
        return view('service'); 
    }

    public function directory() 
    {
        return view('directory'); 
    }

    public function contact() 
    {
        return view('contact'); 
    }

    public function dashboard() 
    {
        $studentStatus = [
           'contact' => Student::where('status','Already Contacted')->count(),
           'contact1' => Student::where('status','Declined')->count(),
           'contact2' => Student::where('status','Pending')->count(),
        ];
        return view('dashboard',[
            'studentStatus'=>$studentStatus,
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




   



    

    

}