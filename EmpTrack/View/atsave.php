<form action="" method="GET">
                        <label for="start">Select date:</label>
                        <input type="date" name="date" value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>"
           onchange="this.form.submit()"  class="border border-slate-300 rounded-md px-3 py-1 bg-white text-sm text-slate-800 font-medium">
                    </form>




                    <tbody class="divide-y divide-slate-100">
                        <?php
                        $query = "SELECT A.full_name , B.attendance_date , B.punch_in, B.punch_out, B.status FROM emp_table AS A JOIN attendance AS B ON A.id = B.employee_id WHERE A.id = " . $_SESSION['user_id'];
                       if(isset($_GET['date'])){
                        $selected_date = $_GET['date'];
                        $query .= " AND B.attendance_date = '$selected_date'";
                       }else{
                        $query .= " AND B.attendance_date = CURDATE()";
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