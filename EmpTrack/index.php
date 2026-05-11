<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Employee Management System</title>
</head>

<body class="bg-gray-50 font-['Inter'] text-slate-800">

    <div class="main-dashboard min-h-screen flex flex-col">

        <div class="navbar flex items-center justify-between bg-[#007bff] px-8 py-4 shadow-lg text-white">

            <div class="nav-start px-4 py-1.5 rounded-lg text-[#007bff] font-bold text-xl bg-white shadow-sm">
                EMS Portal
            </div>

            <div class="nav-end flex items-center gap-4">
                <a href="./View/Login.php"
                    class="bg-white/20 hover:bg-white/30 transition-colors px-4 py-2 rounded-md text-sm font-semibold border border-white/30">
                    Employee Login
                </a>

                <a href="./admin/aLogin.php"
                    class="bg-white hover:bg-slate-100 transition-colors px-4 py-2 rounded-md text-sm font-semibold text-[#007bff]">
                    Admin Login
                </a>
            </div>

        </div>

        <div class="hero-main flex-1 flex items-center justify-center px-6 py-12">

            <div
                class="max-w-6xl w-full bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden grid grid-cols-1 lg:grid-cols-2">

                <div class="p-10 flex flex-col justify-center">

                    <span
                        class="w-fit px-4 py-1 rounded-full bg-blue-100 text-[#007bff] text-sm font-semibold mb-5">
                        Employee Attendance System
                    </span>

                    <h1 class="text-5xl font-extrabold leading-tight text-slate-900">
                        Smart & Simple Workforce Management
                    </h1>

                    <p class="text-slate-500 mt-6 text-lg leading-relaxed">
                        Manage employee attendance, working hours, and daily activity
                        with a modern and efficient dashboard system. Employees can
                        easily punch in and punch out, while administrators can monitor
                        attendance records, employee details, and productivity in real time.
                    </p>

                
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">

                        <div class="bg-slate-50 border border-slate-100 rounded-xl p-4">
                            <h3 class="font-bold text-slate-800">Attendance Tracking</h3>
                            <p class="text-sm text-slate-500 mt-1">
                                Track punch-in and punch-out timings accurately.
                            </p>
                        </div>

                        <div class="bg-slate-50 border border-slate-100 rounded-xl p-4">
                            <h3 class="font-bold text-slate-800">Admin Dashboard</h3>
                            <p class="text-sm text-slate-500 mt-1">
                                Manage employee data and attendance reports easily.
                            </p>
                        </div>

                        <div class="bg-slate-50 border border-slate-100 rounded-xl p-4">
                            <h3 class="font-bold text-slate-800">Secure Login</h3>
                            <p class="text-sm text-slate-500 mt-1">
                                Separate secure access for employees and administrators.
                            </p>
                        </div>

                        <div class="bg-slate-50 border border-slate-100 rounded-xl p-4">
                            <h3 class="font-bold text-slate-800">Modern Interface</h3>
                            <p class="text-sm text-slate-500 mt-1">
                                Clean responsive UI built using Tailwind CSS.
                            </p>
                        </div>

                    </div>

                  
                    <div class="flex flex-wrap gap-4 mt-10">

                        <a href="./View/Login.php"
                            class="bg-[#007bff] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold shadow-md transition-all">
                            Employee Login
                        </a>

                        <a href="./admin/aLogin.php"
                            class="border border-[#007bff] text-[#007bff] hover:bg-blue-50 px-8 py-3 rounded-xl font-semibold transition-all">
                            Admin Login
                        </a>

                    </div>

                </div>

                <div
                    class="bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center p-10 text-white">

                    <div class="text-center max-w-md">

                        <h2 class="text-4xl font-extrabold mb-6">
                            Efficient Employee Monitoring
                        </h2>

                        <p class="text-lg text-blue-100 leading-relaxed">
                            A centralized platform to simplify attendance management,
                            improve transparency, and boost workplace productivity.
                        </p>

                    
                        <div class="grid grid-cols-2 gap-5 mt-10">

                            <div class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm">
                                <h3 class="text-3xl font-bold">24/7</h3>
                                <p class="text-sm text-blue-100 mt-1">System Access</p>
                            </div>

                            <div class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm">
                                <h3 class="text-3xl font-bold">100%</h3>
                                <p class="text-sm text-blue-100 mt-1">Attendance Records</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    
        <div class="footer py-6 text-center text-slate-400 text-sm">
            &copy; <?php echo date("Y"); ?> Employee Management System. All Rights Reserved.
        </div>

    </div>

</body>

</html>