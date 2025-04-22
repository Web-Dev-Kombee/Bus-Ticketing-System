<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modern Bus Booking System - Side-by-Side</title>

        <!-- Import Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#3b82f6', // Blue primary color
                        'primary-dark': '#1e40af',
                        'secondary': '#6366f1', // Indigo secondary color
                        'bus-body': '#f8fafc', // Light background for bus interior
                        'seat-available': '#10b981', // Emerald green
                        'seat-available-hover': '#059669',
                        'seat-booked': '#ef4444', // Red
                        'seat-selected': '#3b82f6', // Blue
                        'aisle': '#e2e8f0', // Light gray for aisle
                        'driver-area': '#1e293b', // Dark slate
                        'windshield': '#94a3b8', // Slate for windshield
                    }
                },
                fontFamily: {
                    'sans': ['Inter', 'system-ui', 'sans-serif']
                }
            }
        }
    </script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background-color: #f1f5f9;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23cbd5e1' fill-opacity='0.15'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* Bus container styling */
        .bus-container {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            border: 1px solid rgba(203, 213, 225, 0.4);
            background-color: white;
            border-radius: 24px; /* Increased rounding */
            overflow: hidden;
        }

        /* Bus interior styling */
        .bus-interior {
            background-color: theme('colors.bus-body');
            border-radius: 16px;
            background-image:
                radial-gradient(at top left, rgba(255,255,255,0.4) 0%, transparent 70%),
                linear-gradient(to bottom, rgba(248,250,252,0.8), rgba(226,232,240,0.3));
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }

        /* Realistic bus seat styling */
        .seat-btn {
            height: 3.25rem; /* Slightly smaller */
            width: 2.75rem; /* Slightly smaller */
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
            border-bottom-left-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
            box-shadow:
                0 2px 3px rgba(0, 0, 0, 0.15),
                inset 0 1px 2px rgba(255, 255, 255, 0.25);
            transition: all 0.2s ease-in-out;
            position: relative;
            font-weight: 600;
            font-size: 0.875rem; /* Adjusted font size */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-top: 0.375rem; /* Adjusted padding */
            padding-bottom: 0.25rem;
            transform-style: preserve-3d;
            overflow: hidden;
            flex-shrink: 0; /* Prevent shrinking in flex layout */
        }

        .seat-btn::before { /* Seat back highlight */
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 60%;
            background: linear-gradient(to bottom, rgba(255,255,255,0.2), transparent);
            border-top-left-radius: 0.75rem; border-top-right-radius: 0.75rem; z-index: 1;
        }
        .seat-btn::after { /* Seat bottom shadow */
            content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 30%;
            background: linear-gradient(to top, rgba(0,0,0,0.1), transparent);
            border-bottom-left-radius: 0.25rem; border-bottom-right-radius: 0.25rem;
        }

        .seat-btn:not(:disabled):hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2), inset 0 1px 2px rgba(255, 255, 255, 0.3);
        }
        .seat-btn:disabled { opacity: 0.8; cursor: not-allowed; }
        .seat-selected-state {
            background-color: theme('colors.seat-selected') !important; color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(59, 130, 246, 0.4), inset 0 1px 2px rgba(255, 255, 255, 0.2);
        }

        /* Aisle styling */
        .aisle {
            background-color: theme('colors.aisle'); height: 3.5rem; /* Match seat height */
            background-image:
                linear-gradient(90deg, rgba(203, 213, 225, 0.4) 0%, rgba(203, 213, 225, 0) 10%,
                rgba(203, 213, 225, 0) 90%, rgba(203, 213, 225, 0.4) 100%),
                linear-gradient(0deg, rgba(203, 213, 225, 0.6) 0%, rgba(203, 213, 225, 0.1) 100%);
            flex-shrink: 0; /* Prevent shrinking */
        }

        /* Driver area styling */
        .driver-area {
            background-color: theme('colors.driver-area'); box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); position: relative;
        }
        .driver-area::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 40%;
            background: linear-gradient(to bottom, rgba(255,255,255,0.2), transparent);
            border-radius: 0.25rem;
        }

        /* Windshield styling */
        .windshield {
            background-color: theme('colors.windshield'); border-radius: 2rem 2rem 0 0; position: relative; overflow: hidden;
        }
        .windshield::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 60%;
            background: linear-gradient(to bottom, rgba(255,255,255,0.4), transparent);
            border-radius: 2rem 2rem 0 0;
        }

        /* Legend styling */
        .legend-item {
            display: flex; align-items: center; padding: 0.375rem 0.75rem; border-radius: 0.5rem;
            font-weight: 500; font-size: 0.875rem; transition: all 0.2s;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .legend-item span {
            border-radius: 0.25rem; width: 1rem; height: 1rem; margin-right: 0.5rem;
            display: inline-block; box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.1); flex-shrink: 0;
        }

        /* Form styling */
        .form-control { transition: all 0.2s; }
        .form-control:focus { box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3); border-color: #3b82f6; }
        .btn-primary {
            background-image: linear-gradient(to right, #3b82f6, #2563eb);
            transition: all 0.3s; box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
        }
        .btn-primary:hover:not(:disabled) {
            background-image: linear-gradient(to right, #2563eb, #1d4ed8);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3); transform: translateY(-1px);
        }
        .btn-primary:disabled {
            background-image: linear-gradient(to right, #93c5fd, #60a5fa); cursor: not-allowed; opacity: 0.7;
        }

        /* Side-by-side layout specific styles */
        @media (min-width: 1024px) { /* lg breakpoint */
             .main-content-flex {
                display: flex;
             }
             .form-column-card {
                 display: flex;
                 flex-direction: column;
                 height: 100%; /* Make card take full height */
             }
             .form-column-card > form {
                 display: flex;
                 flex-direction: column;
                 flex-grow: 1; /* Make form element grow */
             }
              .form-column-card > form > .form-fields-grow {
                 flex-grow: 1; /* Make the div wrapping fields grow */
              }
        }

</style>
</head>

<body class="p-4 sm:p-6 lg:p-8"> <!-- Adjusted padding -->

    <div class="max-w-6xl mx-auto"> <!-- Adjusted max-width -->

        <!-- Main Card Container -->
        <div class="bus-container">

            <!-- Header -->
            <div class="bg-gradient-to-r from-primary to-secondary p-5 text-white flex justify-between items-center"> <!-- Adjusted padding -->
                <h2 class="text-xl md:text-2xl font-bold flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-7 md:w-7 mr-2 md:mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m-8 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                    Select Seat & Enter Details
                </h2>
            </div>

            <!-- Flex Container for Side-by-Side Layout -->
            <div class="flex flex-col lg:flex-row main-content-flex">

                <!-- Left Column: Bus Layout -->
                <div class="w-full lg:w-7/12 p-4 md:p-6 lg:p-8 bus-interior lg:border-r lg:border-gray-200">

                    @php
                        $seatsPerRow = 4;
                        $seats = collect($seats ?? []); // Ensure $seats is a collection
                        $chunks = $seats->chunk($seatsPerRow);
                        $bookedSeatNumbers = $bookedSeatNumbers ?? []; // Ensure array exists
                    @endphp

                    <!-- Bus Front Representation -->
                    <div class="flex justify-between items-center mb-6 px-2 md:px-4">
                         <!-- Windshield -->
                        <div class="windshield w-2/5 h-12 md:h-14 flex items-center justify-center text-gray-600 text-xs md:text-sm font-medium relative">
                            <span class="relative z-10 bg-white/40 px-2 md:px-3 py-1 rounded-full backdrop-blur-sm">FRONT</span>
                        </div>
                        <!-- Door -->
                        <div class="h-12 md:h-14 w-12 md:w-16 bg-primary-dark/90 rounded-md flex items-center justify-center text-white text-xs font-medium relative flex-shrink-0">
                            <div class="absolute inset-1 bg-gray-800 rounded opacity-60"></div>
                            <span class="relative z-10">DOOR</span>
                        </div>
                        <!-- Driver -->
                        <div class="flex flex-col items-center space-y-1 flex-shrink-0">
                            <div class="driver-area w-12 h-12 md:w-14 md:h-14 rounded-md flex items-center justify-center relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-7 md:w-7 text-white relative z-10" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12 2a8 8 0 00-8 8v1h3v-1a5 5 0 0110 0v1h3v-1a8 8 0 00-8-8zm-4 12a2 2 0 114 0 2 2 0 01-4 0zm8 0a2 2 0 114 0 2 2 0 01-4 0z" clip-rule="evenodd" />
                                    <path d="M4 14v2a8 8 0 0016 0v-2H4z" />
                                </svg>
                            </div>
                            <span class="text-xs text-gray-600 font-medium">Driver</span>
                        </div>
                    </div>

                    <!-- Seat Grid -->
                    <div class="space-y-3 md:space-y-4 relative">
                        <!-- Decorative bus outer shape -->
                        <div class="absolute inset-x-0 top-0 bottom-0 border-2 border-gray-300/30 rounded-2xl pointer-events-none -z-10"></div>

                        @foreach($chunks as $i => $row)
                            <div class="flex items-center justify-center space-x-4 md:space-x-6 relative">
                                <!-- Left Side Seats -->
                                <div class="flex space-x-2 md:space-x-3">
                                    @foreach($row->slice(0, 2) as $seat)
                                        @php
                                            $isBooked = in_array($seat->seat_number, $bookedSeatNumbers);
                                            $seatColor = $isBooked ? 'bg-seat-booked text-white cursor-not-allowed' : 'bg-seat-available text-white hover:bg-seat-available-hover';
                                        @endphp
                                        <button type="button" data-seat-id="{{ $seat->id }}" data-seat-number="{{ $seat->seat_number }}" {{ $isBooked ? 'disabled' : '' }} class="seat-btn {{ $seatColor }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 mb-1 opacity-80 relative z-10" fill="currentColor" viewBox="0 0 24 24"><path d="M7 6v10H5a1 1 0 100 2h14a1 1 0 100-2h-2V6a4 4 0 00-4-4H11a4 4 0 00-4 4z"/></svg>
                                            <span class="relative z-10">{{ $seat->seat_number }}</span>
                                        </button>
                                    @endforeach
                                </div>
                                <!-- Aisle -->
                                <div class="aisle w-8 md:w-10 flex items-center justify-center rounded-sm">
                                    <span class="transform rotate-90 text-gray-400 opacity-70 select-none text-xs">AISLE</span>
                                </div>
                                <!-- Right Side Seats -->
                                <div class="flex space-x-2 md:space-x-3">
                                    @foreach($row->slice(2) as $seat)
                                        @php
                                            $isBooked = in_array($seat->seat_number, $bookedSeatNumbers);
                                            $seatColor = $isBooked ? 'bg-seat-booked text-white cursor-not-allowed' : 'bg-seat-available text-white hover:bg-seat-available-hover';
                                        @endphp
                                        <button type="button" data-seat-id="{{ $seat->id }}" data-seat-number="{{ $seat->seat_number }}" {{ $isBooked ? 'disabled' : '' }} class="seat-btn {{ $seatColor }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 mb-1 opacity-80 relative z-10" fill="currentColor" viewBox="0 0 24 24"><path d="M7 6v10H5a1 1 0 100 2h14a1 1 0 100-2h-2V6a4 4 0 00-4-4H11a4 4 0 00-4 4z"/></svg>
                                            <span class="relative z-10">{{ $seat->seat_number }}</span>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <!-- Back of bus line -->
                        <div class="h-2 w-full bg-gray-300/30 rounded-b-2xl mt-6"></div>
                    </div>

                    <!-- Legend & Info -->
                    <div class="mt-8 p-4 bg-white rounded-xl border border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-sm">
                        <div class="flex items-center space-x-2 text-sm font-medium text-gray-700 bg-blue-50 px-3 py-1.5 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <p id="selectedSeatDisplay">Selected: <span class="text-primary-dark font-bold">None</span></p>
                        </div>
                        <div class="flex items-center flex-wrap justify-center gap-2">
                            <div class="legend-item bg-green-50"><span class="bg-seat-available"></span><span>Available</span></div>
                            <div class="legend-item bg-blue-50"><span class="bg-seat-selected"></span><span>Selected</span></div>
                            <div class="legend-item bg-red-50"><span class="bg-seat-booked"></span><span>Booked</span></div>
                        </div>
                    </div>

                </div><!-- End Left Column -->

                <!-- Right Column: Booking Form -->
                <div class="w-full lg:w-5/12 p-4 md:p-6 lg:p-8 bg-gray-50">
                    <!-- Booking Form Card -->
                     <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 form-column-card">
                        <!-- Card Header -->
                        <div class="bg-gradient-to-r from-primary to-primary-dark px-6 py-4 text-white relative overflow-hidden flex-shrink-0">
                            <div class="absolute inset-0 overflow-hidden opacity-20"><svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 text-white absolute -right-8 -top-8 transform rotate-12" fill="currentColor" viewBox="0 0 24 24"><path d="M13 2.05v3.03c3.39.49 6 3.39 6 6.92 0 .9-.18 1.75-.5 2.54l2.62 1.53c.56-1.24.88-2.62.88-4.07 0-5.18-3.95-9.45-9-9.95M12 19c-3.87 0-7-3.13-7-7 0-3.53 2.61-6.43 6-6.92V2.05c-5.06.5-9 4.76-9 9.95 0 5.52 4.47 10 9.99 10 3.31 0 6.24-1.61 8.06-4.09l-2.6-1.53C16.17 17.98 14.21 19 12 19z"/></svg></div>
                            <h3 class="text-xl font-semibold relative z-10 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                Passenger Details
                            </h3>
                        </div>

                        <!-- Form Content -->
                         <form method="POST" action="{{ route('seats.book') }}" class="p-6 space-y-4">
                             @csrf
                             <div class="form-fields-grow space-y-4"> 
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                    <input type="text" name="name" id="name" placeholder="e.g., John Doe" required class="form-control w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                    <input type="email" name="email" id="email" placeholder="e.g., john.doe@example.com" required class="form-control w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                    <input type="text" name="phone" id="phone" placeholder="e.g., +1 555 123 4567" required class="form-control w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none">
                                </div>
                                <input type="hidden" name="seat_id" id="selectedSeatId">
                             </div>

                             <div class="mt-auto pt-4 flex-shrink-0"> 
                                <button type="submit" id="confirmBookingBtn" disabled class="btn-primary w-full text-white font-medium py-3 px-6 rounded-lg text-center flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                    Confirm Booking
                                </button>
                             </div>
                        </form>
                    </div> <!-- End Form Card -->
                </div><!-- End Right Column -->

            </div> <!-- End Flex Container -->

             <!-- Success Message Area (Moved outside flex container) -->
             @if (session('success'))
                 <div class="p-6 md:p-8">
                    <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl p-6 shadow-md">
                        <div class="flex">
                            <div class="flex-shrink-0 bg-green-100 rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-medium text-green-800">Booking Successful!</h4>
                                <p class="mt-1 text-green-700">{{ session('success') }}</p>
                                @if (session('ticket'))
                                <a href="{{ session('ticket') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                    </svg>
                                    Download Ticket PDF
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                 </div>
             @endif

        </div> <!-- End Main Bus Container -->

         <!-- Back Button -->
        <div class="text-center mt-8 mb-4">
            <a href="{{ route('buses_view.index') }}" class="inline-flex items-center text-primary hover:text-primary-dark font-medium transition duration-150 ease-in-out group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                </svg>
                Back to Bus Listing
            </a>
        </div>

    </div> <!-- End Max Width Container -->

    <!-- JavaScript for seat selection -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seats = document.querySelectorAll('.seat-btn:not([disabled])');
            const selectedSeatDisplaySpan = document.getElementById('selectedSeatDisplay').querySelector('span'); // Target the span directly
            const selectedSeatIdInput = document.getElementById('selectedSeatId');
            const confirmBookingBtn = document.getElementById('confirmBookingBtn');
            let selectedSeatButton = null; // Renamed for clarity

            seats.forEach(seat => {
                seat.addEventListener('click', function() {
                    // Remove selection from previous seat button
                    if (selectedSeatButton && selectedSeatButton !== this) {
                        selectedSeatButton.classList.remove('seat-selected-state');
                        // Re-add available class if needed (handled implicitly by not having selected state)
                    }

                    // If clicking the same seat button, deselect it
                    if (selectedSeatButton === this) {
                        this.classList.remove('seat-selected-state'); // Deselect visually
                        selectedSeatButton = null; // Clear selection variable
                        selectedSeatDisplaySpan.innerText = 'None'; // Update text display
                        selectedSeatIdInput.value = ''; // Clear hidden input
                        confirmBookingBtn.disabled = true; // Disable button
                    } else {
                        // Select new seat button
                        this.classList.add('seat-selected-state'); // Select visually
                        selectedSeatButton = this; // Update selection variable

                        const seatNumber = this.getAttribute('data-seat-number');
                        const seatId = this.getAttribute('data-seat-id');

                        selectedSeatDisplaySpan.innerText = seatNumber; // Update text display
                        selectedSeatIdInput.value = seatId; // Set hidden input
                        confirmBookingBtn.disabled = false; // Enable button
                    }
                });
            });

            // Initial state check: Disable button if no seat ID is present initially
             if (!selectedSeatIdInput.value) {
                 confirmBookingBtn.disabled = true;
             } else {
                 // Optional: If a seat ID is pre-filled (e.g., form validation failed), highlight it
                 const preSelectedBtn = document.querySelector(`.seat-btn[data-seat-id="${selectedSeatIdInput.value}"]`);
                 if(preSelectedBtn && !preSelectedBtn.disabled) {
                     preSelectedBtn.click(); // Simulate a click to select it and enable the button
                 } else {
                     // If pre-selected seat is invalid/booked, clear the input
                     selectedSeatIdInput.value = '';
                     confirmBookingBtn.disabled = true;
                 }
             }


            // Basic Form validation hint (can be expanded)
            const bookingForm = document.querySelector('form');
            bookingForm.addEventListener('submit', function(e) {
                if (!selectedSeatIdInput.value && document.getElementById('confirmBookingBtn').disabled === false) {
                    // This check is mostly redundant now because the button is disabled,
                    // but good practice to keep a submit check.
                    e.preventDefault();
                    // Consider adding a more user-friendly message display instead of alert
                    console.error('Form submitted without a selected seat ID.');
                    alert('An error occurred. Please re-select your seat.');
                }
            });
        });
    </script>

</body>
</html>