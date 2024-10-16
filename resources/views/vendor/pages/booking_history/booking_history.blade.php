@extends('vendor.layouts.main')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row gy-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#" onclick="openTab('All')" data-tab="All">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="openTab('Completed')" data-tab="Completed">Completed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="openTab('Processing')" data-tab="Processing">Processing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="openTab('Confirmed')" data-tab="Confirmed">Confirmed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="openTab('Cancelled')" data-tab="Cancelled">Cancelled</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="openTab('Paid')" data-tab="Paid">Paid</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="openTab('Unpaid')" data-tab="Unpaid">Unpaid</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="openTab('Partial')" data-tab="Partial">Partial Payment</a>
                </li>
            </ul>
            
            <!-- Table -->
            <table id="bookingTable" class="table mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Order Date</th>
                        <th>Execution Time</th>
                        <th>Total</th>
                        <th>Paid</th>
                        <th>Remain</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dummy data for All tab -->
                    <tr id="booking1_All" style="display: table-row;">
                        <td>Single</td>
                        <td>Standard Room</td>
                        <td>2024-03-30</td>
                        <td>2 Nights</td>
                        <td>$200</td>
                        <td>$100</td>
                        <td>$100</td>
                    </tr>
                    <tr id="booking2_All" style="display: table-row;">
                        <td>Double</td>
                        <td>Deluxe Suite</td>
                        <td>2024-03-28</td>
                        <td>3 Nights</td>
                        <td>$400</td>
                        <td>$400</td>
                        <td>$0</td>
                    </tr>
                    <!-- Dummy data for Completed tab -->
                    <tr id="booking3_Completed" style="display: none;">
                        <td>Single</td>
                        <td>Standard Room</td>
                        <td>2024-03-30</td>
                        <td>2 Nights</td>
                        <td>$200</td>
                        <td>$100</td>
                        <td>$100</td>
                    </tr>
                    <!-- Dummy data for Processing tab -->
                    <tr id="booking4_Processing" style="display: none;">
                        <td>Double</td>
                        <td>Deluxe Suite</td>
                        <td>2024-03-28</td>
                        <td>3 Nights</td>
                        <td>$400</td>
                        <td>$400</td>
                        <td>$0</td>
                    </tr>
                    <!-- Dummy data for Confirmed tab -->
                    <tr id="booking5_Confirmed" style="display: none;">
                        <td>Single</td>
                        <td>Standard Room</td>
                        <td>2024-03-30</td>
                        <td>2 Nights</td>
                        <td>$200</td>
                        <td>$100</td>
                        <td>$100</td>
                    </tr>
                    <!-- Dummy data for Cancelled tab -->
                    <tr id="booking6_Cancelled" style="display: none;">
                        <td>Double</td>
                        <td>Deluxe Suite</td>
                        <td>2024-03-28</td>
                        <td>3 Nights</td>
                        <td>$400</td>
                        <td>$400</td>
                        <td>$0</td>
                    </tr>
                    <!-- Dummy data for Paid tab -->
                    <tr id="booking7_Paid" style="display: none;">
                        <td>Single</td>
                        <td>Standard Room</td>
                        <td>2024-03-30</td>
                        <td>2 Nights</td>
                        <td>$200</td>
                        <td>$100</td>
                        <td>$100</td>
                    </tr>
                    <!-- Dummy data for Unpaid tab -->
                    <tr id="booking8_Unpaid" style="display: none;">
                        <td>Double</td>
                        <td>Deluxe Suite</td>
                        <td>2024-03-28</td>
                        <td>3 Nights</td>
                        <td>$400</td>
                        <td>$400</td>
                        <td>$0</td>
                    </tr>
                    <!-- Dummy data for Partial tab -->
                    <tr id="booking9_Partial" style="display: none;">
                        <td>Single</td>
                        <td>Standard Room</td>
                        <td>2024-03-30</td>
                        <td>2 Nights</td>
                        <td>$200</td>
                        <td>$100</td>
                        <td>$100</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Add your JavaScript for tab functionality here -->
<script>
    function openTab(tabName) {
        // Hide all table rows
        var tableRows = document.getElementById("bookingTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr");
        for (var i = 0; i < tableRows.length; i++) {
            tableRows[i].style.display = "none";
        }
        
        // Remove active class from all tabs
        var tablinks = document.getElementsByClassName("nav-link");
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        
        // Show only the table rows corresponding to the selected tab
        if (tabName === 'All') {
            for (var i = 0; i < tableRows.length; i++) {
                tableRows[i].style.display = "table-row";
            }
        } else {
            var tabRows = document.querySelectorAll("[id^='booking']");
            for (var i = 0; i < tabRows.length; i++) {
                if (tabRows[i].id.includes('_' + tabName)) {
                    tabRows[i].style.display = "table-row";
                }
            }
        }
        
        // Add active class to the selected tab
        var selectedTab = document.querySelector("a.nav-link[data-tab='" + tabName + "']");
        if (selectedTab) {
            selectedTab.classList.add("active");
        }
    }

    // Call openTab('All') to display all data initially
    openTab('All');
</script>


@endsection
