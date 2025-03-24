<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class contentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $sections = [
            ["section" => "about_us_section", "img_path" => "img1"],
            ["section" => "history_section", "img_path" => "img1"],
            ["section" => "why_choose_section", "img_path" => "img1"],
            ["section" => "who_should_section", "img_path" => "img1"],
            ["section" => "registration_section", "img_path" => "img1"],
            ["section" => "study_load", "img_path" => "img1"],
            ["section" => "student_affair", "img_path" => "img1"],
            ["section" => "convocation", "img_path" => "img1"],
            ["section" => "policy", "img_path" => "img1"],
            ["section" => "what_student_say", "img_path" => "img1"],
            ["section" => "our_course", "img_path" => "img1"]
        ];



        foreach ($sections as $section) {
            $sectionId = DB::table("sections")->insertGetId($section);

            
            if($sectionId==1){
                DB::table("contents")->insert([
                    [
                        "section_id"=>$sectionId,
                        'content_type'=>'short_content',
                        'content_title'=>'our vision',
                        'content'=>json_encode([
                            "paragraph"=>"Kolej Synergy aims to be a global leader in education by integrating excellence in teaching, learning, research, and community services."
                        ])
                    ],
                    [
                        "section_id"=>$sectionId,
                        'content_type'=>'short_content',
                        'content_title'=>'our mission',
                        'content'=>json_encode([
                            "paragraph"=>"The Mission of Kolej Synergy is to provide career-focused quality education that caters to the intellectual, social and cultural needs of learns.",
                        ])
                    ],
                    [
                        "section_id"=>$sectionId,
                        'content_type'=>'short_content',
                        'content_title'=>'about us',
                        'content'=>json_encode([
                            "paragraph"=>'At Synergy College, we believe in creating a collaborative environment that nurtures creativity, fosters personal growth, and equips students with the skills they need to thrive in a dynamic world. Our diverse programs are designed to blend theoretical knowledge with practical experience, ensuring our graduates are well-prepared for their future careers. Join us on a journey of discovery and empowerment, where your aspirations become reality.'
                        ])
                    ],
                    [
                        "section_id"=>$sectionId,
                        'content_type'=>'image_content',
                        'content_title'=>'about us',
                        'content'=>json_encode([
                            "image"=>[
                                'assets/images/section2.jpg',
                                'assets/images/section2a.jpg'
                            ]
                        ])
                    ]

                    
                    ]);
            }elseif($sectionId==2){
                DB::table("contents")->insert([
                    [
                        "section_id"=>$sectionId,
                        'content_type'=>'long_content',
                        'content_title'=>'synergy college history',
                        'content'=>json_encode([
                            "paragraph"=>"Established in 2001, Synergy College is a significant contributor to the field of professional and skill education in Malaysia.
Currently, the college is offering TVET Diploma and International Professional Qualifications to local and international students. We are an accredited International College from JPK, Malaysia.
Students are eligible to apply government study loan through college. While delivering the government accredited TVET Diploma program, we do prepare the students to sit for international professional examination. Most of our student are capable to obtain double qualifications.
All these programs are in the areas of high demand and are well recognized by local and international industries. Our students are undergo a learning system that is holistic and equipping them with the skills and relevant knowledge that can keep them in good stead as they join the workforce.
The Malaysian Qualifications Agency (MQA), Ministry of Education and the Department of Skills Development (JPK), Ministry of Human Resources are working together to operate TVET Diploma."
                        ]),
                    ]
                ]);
            }elseif($sectionId==3){
                DB::table("contents")->insert([
                    [
                        "section_id"=>$sectionId,
                        'content_type'=>'pointform_content',
                        'content_title'=>'who should take this TVET program',
                        'content'=>json_encode([
                            "paragraph"=>[
                                 "✔ Students seeking industry-relevant practical skills.",
                                 "✔ Job Seekers looking for hands-on training to enhance employability.",
                                 "✔ Working Professionals who want to upskill and advance their careers."

                            ]
                        ])
                    ],
                ]);
            }elseif($sectionId==4){
                DB::table("contents")->insert([
                    [
                        "section_id"=>$sectionId,
                        'content_type'=>'imagepointform_content',
                        'content_title'=>'why choose synergy college',
                        'content'=>json_encode([
                                [
                                    "img"=>"assets/images/school.png",
                                    "paragraph"=>"HIGHER VOCATIONAL EDUCATION"
                                ],
                                [
                                    "img"=>"assets/images/course.png",
                                    "paragraph"=>"EXPERIENTIAL HAND-ON PRACTICAL"
                                ],
                                [
                                    "img"=>"assets/images/internship.png",
                                    "paragraph"=>"INTERNSHIP / INDUSTRIAL PLACEMENT"
                                ],
                                [
                                    "img"=>"assets/images/award.png",
                                    "paragraph"=>"DIPLOMA / OVERSEAS CERTIFICATE"
                                ]
                        
                        ])
                    ],
                    
                ]);
            }elseif($sectionId==6){
                DB::table("contents")->insert([
                    [
                        "section_id"=>$sectionId,
                        'content_type'=>'imageform_content',
                        'content_title'=>'study load',
                        'content'=>json_encode([
                            "img"=>"assets/images/studyloan.png",
                            "title"=>"SYNERGY COLLEGE FINANCIAL ASSISTANCE",
                            "paragraph"=>"Our College Financial Assistance offers comprehensive financial aid services to students, such as study loans and scholarships. It has always been the intention of Synergy College to help our students in all aspects of their education. Our Study Loan & Scholarship programs have been established in a variety of ways and for several different reasons."
                        ])
                    ],
                    
                ]);
            }elseif($sectionId==7){
                DB::table("contents")->insert([
                    [
                        "section_id"=>$sectionId,
                        'content_type'=>'imagepointtitleform_content',
                        'content_title'=>'student affair',
                        'content'=>json_encode([
                            [
                                "img"=>"assets/images/s.png",
                                "title"=>"Student Leadership & Civic Engagement",
                                "paragraph"=>"Offers a variety of programs and services."
                            ],
                            [
                                "img"=>"assets/images/support.png",
                                "title"=>"Career Services",
                                "paragraph"=>"Offers career consulting and job search assistance to students."
                            ],
                            [
                                "img"=>"assets/images/speaker.png",
                                "title"=>"Student Engagement & Special Events",
                                "paragraph"=>"Provides overall direction and support for student development, linking students to real-world industries."
                            ],
                            [
                                "img"=>"assets/images/tutorial.png",
                                "title"=>"Free Tutorial",
                                "paragraph"=>"Online Tutorial to help students solve study problems. Pre-exam special tutorial."
                            ],
                            [
                                "img"=>"assets/images/accommodation.png",
                                "title"=>"Accommodation",
                                "paragraph"=>"Hostel for outstation students."
                            ]
                           
                        ])
                    ],
                    
                ]);
            }elseif($sectionId==8){
                DB::table("contents")->insert([
                    [
                        "section_id"=>$sectionId,
                        'content_type'=>'imageform',
                        'content_title'=>'convocation',
                        'content'=>json_encode([
                            "convocation_img"=>[
                                [
                                    "img"=>"assets/images/head.jpeg",
                                    "content"=>"GROUP PHOTO"
                                ],
                                [
                                    "img"=>"assets/images/12.jpeg",
                                    "content"=>"COMPUTER NETWORKING"
                                ],
                                [
                                    "img"=>"assets/images/13.jpeg",
                                    "content"=>"ELECTRONIC & ENGINEERING"
                                ],
                                [
                                    "img"=>"assets/images/14.jpeg",
                                    "content"=>"GRAPHIC MULTIMEDIA"
                                ],
                                [
                                    "img"=>"assets/images/15.jpeg",
                                    "content"=>"PROGRAMMING & APPLICATION DEVELOPMENT"
                                ],
                                [
                                    "img"=>"assets/images/16.jpeg",
                                    "content"=>"ACCOUNTING"
                                ],

                            ]
                        ])
                    ],
                    
                ]);
            }elseif($sectionId==9){
                DB::table("contents")->insert([
                    "section_id"=>$sectionId,
                    'content_type'=>'pdfform',
                    'content_title'=>'policy',
                    'content'=>json_encode([
                        "refund_policy"=>"assets/images/refund.jpg",
                        "student_handbook"=>[
                            "assets/images/book1.jpg",
                            "assets/images/book2.jpg",
                            "assets/images/book3.jpg",
                            "assets/images/book4.jpg",
                            "assets/images/book5.jpg",
                            "assets/images/book6.jpg",
                            "assets/images/book7.jpg",
                            "assets/images/book8.jpg",
                            "assets/images/book9.jpg",
                            "assets/images/book10.jpg",
                            "assets/images/book11.jpg",
                            "assets/images/book12.jpg"
                        ]
                    ])
                ]);
            }elseif($sectionId==10){
                DB::table("contents")->insert([
                    "section_id"=>$sectionId,
                    'content_type'=>'testimonial',
                    'content_title'=>'what student say',
                    'content'=>json_encode([
                        "testimonials"=>[
                            [
                                "image"=>"assets/images/talk1.jpeg",
                            ],
                            [
                                "image"=>"assets/images/talk2.jpeg",
                            ],
                            [
                                "image"=>"assets/images/talk3.jpeg",
                            ],
                            [
                                "image"=>"assets/images/talk4.jpeg",
                            ],
                            [
                                "image"=>"assets/images/talk5.jpeg",
                            ],
                            [
                                "image"=>"assets/images/talk6.jpeg",
                            ]
                        ]
                    ])
                ]);              
            }elseif($sectionId==11){
                DB::table("contents")->insert([
                    "section_id"=>$sectionId,
                    'content_type'=>'our_course',
                    'content_title'=>'our course',
                    'content'=>json_encode([
                        "accounting"=>[
                            "image"=>'assets/images/1.jpg',
                            "title"=>"Accounting",
                            "content"=>'<h4>ACCOUNTING</h4>
                            <p style="color: white;" align="justify">The Kolej Synergy Diploma in Accounting is a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Accounting.</p>
                                <br>
                            <h5>COURSE MODULES</h5>
                            
                            <p style="color: white;"><b>SEMESTER 1</b><br>
                                ▷ AKS101 Account Payable<br>
                                ▷ AKS102 Account Receicable<br>
                                ▷ AKS103 Payroll
                                <br><br>
                                <b> SEMESTER 2</b><br>
                                ▷ AKS201 Cash and Bank Transactions<br>
                                ▷ AKS202 Property Plant and Equipment Register<br>
                                ▷ AKS203 Month End Financial Statement<br>
                                <br><br>
                                <b>SEMESTER 3</b><br>
                                ▷ AKS301 Property ,Plant And Equipment<br>
                                ▷ AKS302 Financial Report<br>
                                ▷ AKS303 Hire Purchanse<br>
                                <br><br>
                                <b>SEMESTER 4</b><br>
                                ▷ AKS401 Business Entities Reporting<br>
                                ▷ AKS402 Costing<br>
                                ▷ AKS403 On Job Training<br>
                                <br><br>
                                <b>SEMESTER 5</b><br>
                                ▷ AKS501 Final Year Project<br>
                                </p>'
                        ],
                        "multimedia"=>[
                            "image"=>'assets/images/2.jpg',
                            "content"=>'<h4>GRAPHIC MULTIMEDIA</h4>
        <p style="color: white;" align="justify">The Kolej Synergy Diploma in Graphic Multimedia is a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of digital multimedia.</p>
          <br><br>
        <h5>COURSE MODULES</h5>
        
        <p style="color: white;"><b>SEMESTER 1</b><br>
          ▷ MKS101 PGraphic Interface Production<br>
          ▷ MKS102 Audio & Video Production<br>
          <br><br>
          <b>SEMESTER 2</b><br>
          ▷ MKS201 Interactive Application Development<br>
          ▷ MKS202 Interactive Multimedia Technical Support<br>
          ▷ MKS203 Interactive Multimedia Design Supervision<br>
          <br><br>
          <b>SEMESTER 3</b><br>
          ▷ MKS301 Multimedia Production Management<br>
          ▷ MKS302 Multimedia Instructional Design<br>
          ▷ MKS303 Multimedia Art Directing<br>
          <br><br>
          <b>SEMESTER 4</b><br>
          ▷ MKS401 Multimedia Audio Visual (AV) Directing<br>
          ▷ MKS402 Multimedia Quality Control<br>
          ▷ MKS403 Multimedia Research and Innovation<br>

        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ MKS501 On Job Training<br>
        ▷ MKS502 Final Year Project<br>'
                        ],
                        "electronic"=>[
                            "image"=>'assets/images/3.jpg',
                            'content'=>'<h4>ELECTRONIC & ENGINEERING</h4>
      <p style="color: white;" align="justify">The Kolej Synergy Diploma in Electronics Industrial is a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Electronics Industries.</p>
          <br><br>
        <h5>COURSE MODULES</h5>
        
        <p style="color: white;"><b>SEMESTER 1</b><br>
          ▷ EKS101 Electronic Schematic Drawing<br>
          ▷ EKS102 Instrument And Test Equipment Setup & Handing<br>
          ▷ EKS103 Industrial Electronic Equipment Installation<br>
          ▷ EKS104 Instrument And Test Equipment Troubleshooting<br>
          ▷ EKS105 Industrial Electronic Equipment Troubleshooting<br>
          <br><br>
          <b>SEMESTER 2</b><br>
          ▷ EKS201 Electronic Product Quality Control<br>
          ▷ EKS202 Programmable Logic Controller (PLC) Configuration<br>
          ▷ EKS203 Electrical & Electronic Principle<br>
          ▷ EKS204 Digital Electronic<br>
          ▷ EKS205 Practice On Electronic Principle<br>
          <br><br>
          <b>SEMESTER 3</b><br>
          ▷ EKS301 Electronic Equipment Precentive Maintenance<br>
          ▷ EKS302 Electronic Equipment Corrective Maintenance<br>
          ▷ EKS303 Electronic Appliance Repair & Maintenance<br>
          ▷ EKS304 Project
          <br><br>
          <b>SEMESTER 4</b><br>
          ▷ EKS401 Electronic Equipment Adminstration<br>
          ▷ EKS402 Electronic Product & Technology Improvement<br>
          ▷ EKS403 Electronic Product Quality Assurance<br>
          ▷ EKS404 Microcontroller Configuration<br>
        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ EKS501 On Job Training<br>
        ▷ EKS502 Final Year Project<br>'
                        ],
                        "programming"=>[
                            "image"=>'assets/images/4.jpg',
                            'content'=>'<h4>PROGRAMMING & APPLICATION DEVELOPMENT</h4>
      <p style="color: white;" align="justify">The Kolej Synergy Diploma in Application Development & Programmingis a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Application Development & Programming.</p>
          <br><br>
        <h5>COURSE MODULES</h5>
      
        <p style="color: white;"><b>SEMESTER 1</b><br>
          ▷ PKS101 Application Prototype Development<br>
          ▷ PKS102 Application Module Development<br>
          ▷ PKS103 Application Module Integration<br>
          <br><br>
          <b>SEMESTER 2</b><br>
          ▷ PKS201 Development Environment Deployment<br>
          ▷ PKS202 Application Bug Fixing<br>
          ▷ PKS203 Application System Documentation Compilation<br>
          ▷ PKS204 Application Development Supervision<br>
          <br><br>
          <b>SEMESTER 3</b><br>
          ▷ PKS301 Application Systems Programming<br>
          ▷ PKS302 Application Database Programming<br>
          ▷ PKS303 Application Data Entry Administration<br>
          ▷ PKS304  Application Systems Development Administration<br>
          <br><br>
          <b>SEMESTER 4</b><br>
          ▷ PKS401 Infra Systems Interface Designing<br>
          ▷ PKS402 Application Systems Functional Testingbr>
          ▷ PKS403 Application Systems Technical Support<br>
          ▷ PKS404 On Job Training<br>
        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ PKS501 Final Year Project<br>'
                        ],
                        "networking"=>[
                            "image"=>'assets/images/5.jpg',
                            'content'=>'<h4>COMPUTER NETWORKING</h4>
      <p style="color: white;" align="justify">The Kolej Synergy Diploma in Computer Networking is a highly focused and in-depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Computer Networking and Server Management.</p>
          <br><br>
        <h5>COURSE MODULES</h5>
       
        <p style="color: white;"><b>SEMESTER 1</b><br>
          ▷ NKS101 Computer System Installation<br>
          ▷ NKS102 Computer Networking Structured Cabling System Installation<br>
          ▷ NKS103 Computer Networking Equipment Installation<br>
          <br><br>
          <b>SEMESTER 2</b><br>
          ▷ NKS201 Computer Networking Equipment Configuration<br>
          ▷ NKS202 Computer Networking Application Services Configuration<br>
          ▷ NKS203 Computer Networking Security Hardening<br>
          <br><br>
          <b>SEMESTER 3</b><br>
          ▷ NKS301 Server Configuration<br>
          ▷ NKS302 Server Maintenace Adminstration<br>
          ▷ NKS303 Computer Network Security Development<br>
          <br><br>
          <b>SEMESTER 4</b><br>
          ▷ NKS401 Computer Network Maintenace Management<br>
          ▷ NKS402 Computer system And Network Procerementk<br>
          ▷ NKS403 Computer System Maintenance Management<br>
        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ NKS501 On Job Training<br>
        ▷ NKS502 Final Year Project<br>'
                        ]

                    ])
                ]);
            }
            
           
        }
        
    }
}
