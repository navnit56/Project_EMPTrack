<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../Module/connection.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://googleapis.com" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title> Attendace Details</title>
</head>

<body class="bg-gray-50 font-['Inter'] text-slate-800">
    <div class="main-dashboard min-h-screen flex flex-col">
        <!-- Navbar -->
        <div class="navbar flex items-center justify-between bg-[#007bff] px-8 py-4 shadow-lg text-white">
            <div class="nav-start px-4 py-1.5 rounded-lg text-[#007bff] font-bold text-xl bg-white shadow-sm">
                 Attendace Details
            </div>
            <div class="nav-end flex items-center gap-6">
                  <img
                        src="<?php echo (empty($_SESSION['profile_img'])) ? $_SESSION['deafalt_profile_img'] : htmlspecialchars($_SESSION['profile_img']); ?>"
                         alt="Profile Photo"
                        class="w-20 h-20 rounded-full object-cover border-4 border-blue-500">
                <form action="Logout.php" method="POST">
                    <button
                        class="bg-white/20 hover:bg-white/30 transition-colors px-4 py-1.5 rounded-md text-sm font-semibold border border-white/30">
                        Log Out
                    </button>
                </form>
            </div>
        </div>

        <!-- Greet Section -->
         <div class="main hero-main max-w-5xl w-full mx-auto p-8 flex justify-between">
            <div class="greetings mb-8">
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">Hello,
                    <?php echo $_SESSION['username'] ?>!
                </h2>
                <p class="text-slate-500 mt-1">Here is your attendance details.</p>
            </div>
           <div class="filter background-white rounded-lg shadow-sm border border-slate-200 px-4 py-2 m-[3%] flex items-center bg-[#007bff] text-white font-medium">
                   
                    <form action="" method="GET">
                        <label for="start">Select Month:</label>
                        <input type="month" name="month" value="<?php echo isset($_GET['month']) ? $_GET['month'] : ''; ?>"
           onchange="this.form.submit()"  class="border border-slate-300 rounded-md px-3 py-1 bg-white text-sm text-slate-800 font-medium">
                    </form>
                </div>
        </div>

        <!-- table -->
        <div class="overflow-x-auto rounded-2xl border border-slate-100 p-4 mx-auto max-w-5xl w-full">

                <table class="min-w-full text-sm text-left">

                   
                    <thead class="bg-slate-100 text-slate-600 uppercase text-xs tracking-wider">

                        <tr>

                            <th class="py-4 px-6 font-bold">
                                Employee
                            </th>

                            <th class="py-4 px-6 font-bold">
                                Date
                            </th>

                            <th class="py-4 px-6 font-bold">
                                Punch In
                            </th>

                            <th class="py-4 px-6 font-bold">
                                Punch Out
                            </th>

                            <th class="py-4 px-6 font-bold">
                                Status
                            </th>

                           

                        </tr>

                    </thead>

                   
                    
                    <tbody class="divide-y divide-slate-100">
                        <?php

                        

                        $query = "SELECT A.full_name , B.attendance_date , B.punch_in, B.punch_out, B.status FROM emp_table AS A JOIN attendance AS B ON A.id = B.employee_id WHERE A.id = " . $_SESSION['user_id'];
                       if(isset($_GET['month'])){
                        $selected_month = $_GET['month'];
                        $query .= " AND DATE_FORMAT(B.attendance_date, '%Y-%m') = '$selected_month'";
                       }else{
                        $query .= " AND DATE_FORMAT(B.attendance_date, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')";
                       }
                       $result = mysqli_query($conn, $query);
                       if ($result && mysqli_num_rows($result) > 0) {
    

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td class='py-4 px-6'>" . htmlspecialchars($_SESSION['username']) . "</td>";
                            echo "<td class='py-4 px-6'>" . htmlspecialchars($row['attendance_date']) . "</td>";
                            echo "<td class='py-4 px-6'>" . htmlspecialchars($row['punch_in']) . "</td>";
                            echo "<td class='py-4 px-6'>" . htmlspecialchars($row['punch_out']) . "</td>";
                            echo "<td class='py-4 px-6'>" . htmlspecialchars($row['status']) . "</td>";
                            
                            echo "</tr>";
                        }
                       }
                        ?>
                    </tbody>

      </div>  
</body>
</html>      