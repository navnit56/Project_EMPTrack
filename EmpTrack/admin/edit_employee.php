<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../Module/connection.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: aLogin.php");
    exit();
}
$user_id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$user_id) {
    die("No ID provided.");
}
    $stmt = $conn->prepare("SELECT a.*, e.full_name, e.emp_id as emp_db_id FROM attendance a JOIN emp_table e ON a.employee_id = e.id WHERE a.id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Record not found.");
}

if (isset($_POST["update"])) {

    $full_name = $_POST["name"];
    $emp_id = $_POST["emp_id"];
    $punch_in = $_POST["punch_in"];
    $punch_out = $_POST["punch_out"];
    $status = $_POST["status"];
    $attendance_date = $_POST["attendance_date"];

    $user_id = $_GET['id'];

    $query = "UPDATE attendance a
JOIN emp_table e ON a.employee_id = e.id

SET
    e.full_name = '$full_name',
    a.punch_in = '$punch_in',
    a.punch_out = '$punch_out',
    a.status = '$status',
    e.emp_id = '$emp_id',
    a.attendance_date = '$attendance_date'

WHERE a.id = '$user_id'";

    if (mysqli_query($conn, $query)) {


        $_SESSION['full_name'] = $full_name;
        $_SESSION['emp_id'] = $emp_id;
        $_SESSION['punch_in'] = $punch_in;
        $_SESSION['punch_out'] = $punch_out;
        $_SESSION['status'] = $status;
        $_SESSION['attendance_date'] = $attendance_date;

        header("Location: adashboard.php");
        exit();

    } else {

        echo "Error updating record: " . mysqli_error($conn);

    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Edit Employee Detail</title>
</head>

<body>
    <!-- NavBar -->
    <div class="navbar flex items-center justify-between bg-[#007bff] px-8 py-4 shadow-lg text-white">
        <div class="nav-start px-4 py-1.5 rounded-lg text-[#007bff] font-bold text-xl bg-white shadow-sm">
            Admin Dashboard
        </div>
        <div class="nav-end flex items-center gap-6">
            <div class="username font-medium">Hello, <span class="font-bold"><?php echo $_SESSION['aName'] ?></span>
            </div>
            <form action="aLogout.php" method="POST">
                <button
                    class="bg-white/20 hover:bg-white/30 transition-colors px-4 py-1.5 rounded-md text-sm font-semibold border border-white/30">
                    <a href="aLogout.php"> Log Out</a>
                </button>
            </form>
        </div>
    </div>

    <div class="main max-w-5xl w-full mx-auto p-8">


        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800">
                Edit Employee Detail
            </h1>

            <p class="text-slate-500 mt-1">
                Update employee information
            </p>
        </div>


        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">


            <div class="bg-slate-50 border-b border-slate-200 p-6 flex items-center gap-6">





                <div>
                    <h2 class="text-2xl font-bold text-slate-800">
                        <?php echo $row['full_name'] ?>
                    </h2>

                    <p class="text-slate-500">
                        <?php echo $row['emp_db_id'] ?>
                    </p>
                </div>

            </div>

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-6">


                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-600">
                            Full Name
                        </label>

                        <input type="text" name="name" value="<?php echo $row['full_name'] ?>"
                            class="border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>


                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-600">
                            Employee ID
                        </label>

                        <input type="text" name="emp_id" value="<?php echo $row['emp_db_id'] ?>"
                            class="border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>


                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-600">
                            Punch In
                        </label>

                        <input type="time" name="punch_in" value="<?php echo $row['punch_in'] ?>"
                            class="border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-600">
                            Punch Out
                        </label>

                        <input type="time" name="punch_out" value="<?php echo $row['punch_out'] ?>"
                            class="border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-600">
                            Status
                        </label>

                        <select name="status"
                            class="border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Present" <?php if ($row['status'] == 'Present')
                                echo 'selected'; ?>>
                                Present
                            </option>

                            <option value="Absent" <?php if ($row['status'] == 'Absent')
                                echo 'selected'; ?>>
                                Absent
                            </option>

                            <option value="Late" <?php if ($row['status'] == 'Late')
                                echo 'selected'; ?>>
                                Late
                            </option>
                        </select>
                    </div>


                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-600">
                            Date
                        </label>

                        <input type="date" name="attendance_date" value="<?php echo $row['attendance_date'] ?>"
                            class="border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                </div>


                <div class="bg-slate-50 border-t border-slate-200 px-8 py-5 flex justify-end gap-4">

                    <button type="reset"
                        class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 transition">
                        <a href="Details.php"> Cancel</a>
                    </button>

                    <button type="submit" name="update"
                        class="px-6 py-2.5 rounded-xl bg-blue-500 hover:bg-blue-600 text-white font-semibold shadow-md transition">

                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </div>


</body>

</html>