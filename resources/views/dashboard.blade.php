<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
</head>

<style>
    /* Your existing styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #18153d;
        display: flex;
        color: white;
        height: auto;
    }

    .container {
        display: flex;
        width: 100%;
    }

    .sidebar {
        width: 110px;
        background: white;
        color: black;
        padding-left: 30px;
        padding-right: 30px;
        padding-top: 10px;
        height: 320vh;
    }

    .sidebar h2 {
        text-align: center;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        text-align: center;
    }

    .sidebar ul li {
        margin: 20px 0;
    }

    .sidebar ul li a {
        color: black;
        text-decoration: none;
    }

    .sidebar ul li a:hover {
        color: #ea2328;
    }

    .main-content {
        flex: 1;
        padding: 20px;

    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    h1 {
        margin-left: 100px;
    }

    .student-registration {
        margin-top: 20px;
    }

    .chart-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    max-width: 600px; /* Adjust max width as needed */
    max-height: 600px;
}

#studentChart {
    width: 100% !important;
    height: 100% !important;
}

.submit{
    background-color: white;
    border: 1px solid black;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
    border-radius: 5px;
    font-weight: 700;
    font-size: 15px;
}

.submit:hover{
    background-color: black;
    color: white;
    cursor: pointer;
}

.logo {
    margin-right:1200px ; /* Pushes the logo to the left */
    position: absolute;
   
}

.logo img {
    height: 80px;
}

.chart{
    width: 45%;
    position: absolute;
    margin-left: 630px;
   
}

.chart-container{
    position: absolute;
}

.contacted-people-list{
    position: absolute;
    margin-top: 400px;
    margin-left: 680px;
}

th,td{
    border: 1px solid white;
    padding: 20px;
    width: 180px;
    height: 10px;
    text-align: center;
}

.student-appointments{
    position: absolute;
    margin-top: 680px;
    margin-left: ;
}

.head{
    background-color: #CF9FFF;
    color: black;
}

.head1{
    background-color: paleturquoise;
    color: black;
}

.head2{
    background-color: white;
    color: black;
}

.head3{
    background-color: white;
    color: black;
}

h3{
    font-size: 20px;
}

table{
    width: 90%;
}
</style>

<body>
    <div class="container">
        <aside class="sidebar">
            <h2>ADMIN MENU</h2>
            <ul>
                <li><a href="/dashboard" <?php echo $_SERVER['REQUEST_URI'] == '/dashboard' ? 'style="color:#ea2328;"' : ''; ?>>DASHBOARD</a></li>
                <li><a href="/modifycontentPage" <?php echo $_SERVER['REQUEST_URI'] == '/modifycontentPage' ? 'style="color:#ea2328;"' : ''; ?>>MODIFY CONTENT</a></li>
                <li><a href="/eventPage" <?php echo $_SERVER['REQUEST_URI'] == '/event' ? 'style="color:#ea2328;"' : ''; ?>>UPDATE EVENT</a></li>
                <li><a href="/image" <?php echo $_SERVER['REQUEST_URI'] == '/image' ? 'style="color:#ea2328;"' : ''; ?>>UPDATE IMAGE</a></li>
                
            </ul>
            </ul>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
            
                <button type="submit" id="logout" style="margin-top: 60px;" class="submit">LOG OUT</button>
           
            </form>
        </aside>

        <div class="main-content">
            <header>
                <div class="logo">
                    <a href="/dashboard"><img src="assets/images/school3.png" alt="Logo"></a>
                </div>
                <h1>STUDENT'S REGISTRATION STATUS DASHBOARD</h1>
            </header>

            <section class="student-registration">
                {{-- <h2>Student Registration</h2> --}}
                <div class="chart-container">
                    <canvas id="studentChart"></canvas>
                </div>
                
            </section>


            <section class="monthly-contacted">
                <div class="chart">
                    <canvas id="monthlyBarChart"></canvas>
                </div>
            </section>


            <section class="contacted-people-list">
                <h3 style="color: white;">LIST OF ALREADY CONTACTED PEOPLE BY MONTH</h3>
                @foreach ($contactedPeople as $month => $people)
                    <h4 style="color: white;">{{ Carbon\Carbon::parse($month . '-01')->format('F Y') }}</h4>
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr class="head1">
                                <th scope="col"></th>
                                <th scope="col">FULL NAME</th>
                                <th scope="col">CONTACTED DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($people as $index => $person)
                                <tr class="head2">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $person->full_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($person->created_at)->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </section>

            <section class="student-appointments">
                <h3 style="color: white;">STUDENT APPOINTMENTS BY MONTH</h3>
                @foreach ($appointments as $month => $students)
                    <h4 style="color: white;">{{ $month }}</h4>
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr class="head">
                                <th scope="col" ></th>
                                <th scope="col" >FULL NAME</th>
                                <th scope="col">APPOINTMENT DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $index => $student)
                                <tr class="head3">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $student->full_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($student->appointment_date)->format('d-m-Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </section>
            
            
            
            
        </div>
    </div>

   <script>
    document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('studentChart').getContext('2d');

    // Pass the PHP data to JavaScript (this data comes from your controller)
    const studentStatus = @json($studentStatus); // studentStatus is now a JavaScript object

    // Extract counts from the studentStatus array
    const pendingCount = studentStatus.contact2; // Pending count
    const declinedCount = studentStatus.contact1; // Declined count
    const alreadyContactedCount = studentStatus.contact; // Already Contacted count

    const studentData = {
        labels: ['PENDING', 'DECLINED', 'ALREADY CONTACTED'],
        datasets: [{
            data: [pendingCount, declinedCount, alreadyContactedCount],
            backgroundColor: ['#FF5722', '#FFC107', '#69F0AE'],
        }]
    };

    const config = {
        type: 'pie',
        data: studentData,
        options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 1,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: 'white', // Set label color to white
                        font: {
                            size: 15
                        }
                    }
                },
                datalabels: {
                    display: true,
                    color: 'white',
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    formatter: function(value, context) {
                        let percentage = (value / context.dataset._meta[Object.keys(context.dataset._meta)[0]].total * 100).toFixed(1);
                        return `${percentage}%`;
                    }
                },
                title: {
                    display: true,
                    text: 'PIE CHART OF STUDENT REGISTRATION STATUS',
                    color: 'white',
                    font: {
                        size: 25,
                    }
                },
                tooltip: {
                    position: 'nearest',
                    bodyFont: {
                        size: 20
                    },
                    padding: 10, // Add padding for readability
                    boxPadding: 10, // Ensures tooltip box is fully visible
                    overflow: 'clamp' // Keeps tooltip inside chart bounds
                }
            },
            hover: {
                mode: 'nearest',
                intersect: false,
                animationDuration: 500
            }
        }
    };

    // Create the chart
    new Chart(ctx, config);
});

</script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const barCtx = document.getElementById('monthlyBarChart').getContext('2d');

        // Monthly registrations data passed from backend
        const monthlyRegistrations = @json($monthlyRegistrations);

        // Extract months and totals from the backend data
        const months = monthlyRegistrations.map(data => data.month); // Extract month names
        const totals = monthlyRegistrations.map(data => data.total); // Extract student counts

        // 12 vibrant and contrasting colors to match dark blue background
        const barColors = [
            '#FF6347', // Tomato Red
            '#FFD700', // Gold
            '#90EE90', // Light Green
            '#FF1493', // Deep Pink
            '#00CED1', // Dark Turquoise
            '#FF4500', // Orange Red
            '#98FB98', // Pale Green
            '#32CD32', // Lime Green
            '#00BFFF', // Deep Sky Blue
            '#FF8C00', // Dark Orange
            '#DA70D6', // Orchid
            '#87CEFA'  // Light Sky Blue
        ];

        const barData = {
            labels: months, // X-axis labels (Months)
            datasets: [{
                label: 'TOTAL REGISTERED STUDENTS',
                data: totals, // Y-axis data (Counts)
                backgroundColor: barColors, // Apply the new color palette for bars
            }]
        };

        const barConfig = {
            type: 'bar',
            data: barData,
            options: {
                responsive: true,
                maintainAspectRatio: true,
                scales: {
                    x: {
                        ticks: {
                            color: 'white', // Set X-axis labels color to white
                            font: {
                                size: 16, // Set the font size for X-axis labels
                            },
                        },
                        grid: {
                            color: '#FFFFFF99', // Lighter grid line color for better contrast
                        }
                    },
                    y: {
                        beginAtZero: true, // Start Y-axis at 0
                        ticks: {
                            color: 'white', // Set Y-axis labels color to white
                            stepSize: 10, // Adjust step size based on data
                            callback: function (value) {
                                return value; // Return raw value for Y-axis ticks
                            }
                        },
                        grid: {
                            color: '#FFFFFF99', // Lighter grid line color for better contrast
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true, // Show legend
                        labels: {
                            color: 'white' // Set legend labels color to white
                        }
                    },
                    title: {
                        display: true, // Display chart title
                        text: 'TOTAL REGISTERED STUDENTS BY MONTH',
                        color: 'white', // Set title color to white
                        font: {
                            size: 20 // Set title font size
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return `${context.raw} students`; // Tooltip shows total students
                            }
                        },
                        backgroundColor: '#000000', // Dark background for tooltips for better contrast
                        titleColor: 'white', // Title color for tooltips
                        bodyColor: 'white', // Body color for tooltips
                    }
                }
            }
        };

        // Render the bar chart
        new Chart(barCtx, barConfig);
    });
</script>





</body>
</html>
