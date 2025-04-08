<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMR_event- Admindashbord</title>
    <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }
        body {
            background-color: #f8f8f8;
            color: #39364f;
            display: flex;
        }
        /* Main navigation */
        .main-nav {
            background-color: white;
            border-bottom: 1px solid #e7e7e7;
            padding: 12px 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            height: 24px;
            font-weight: bold;
            font-size: 20px;
            color: #3d64ff;
        }
        .nav-right {
            display: flex;
            align-items: center;
        }
        .create-btn {
            background-color: #f05537;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            margin-right: 15px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .create-btn.admin {
            background-color: #3d64ff;
        }
        .user-menu {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
            gap: 8px;
        }
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #4b4d63;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .dropdown-menu {
            position: absolute;
            top: 40px;
            right: 0;
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            padding: 8px 0;
            min-width: 180px;
            z-index: 100;
            display: none;
        }
        .dropdown-menu.active {
            display: block;
        }
        .dropdown-item {
            padding: 8px 16px;
            color: #39364f;
            text-decoration: none;
            display: block;
        }
        .dropdown-item:hover {
            background-color: #f8f7fa;
        }
        /* Side Navigation */
        .side-nav {
            position: fixed;
            left: 0;
            top: 0;
            width: 70px;
            height: 100vh;
            background-color: white;
            border-right: 1px solid #e7e7e7;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 70px;
            z-index: 90;
        }
        .side-nav a {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            color: #6f7287;
            text-decoration: none;
        }
        .side-nav a:hover,
        .side-nav a.active {
            background-color: #f8f7fa;
            color: #3d64ff;
        }
        .main-content {
            margin-left: 70px;
            margin-top: 60px;
            padding: 30px;
            width: calc(100% - 70px);
        }
        .welcome-header {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #39364f;
        }

        /* Dashboard cards */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        .stats-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .stats-title {
            font-size: 16px;
            font-weight: 600;
            color: #6f7287;
            margin-bottom: 10px;
        }
        .stats-value {
            font-size: 24px;
            font-weight: 700;
            color: #3d64ff;
            margin-bottom: 10px;
        }
        .stats-subtitle {
            font-size: 14px;
            color: #6f7287;
        }

        /* Calendar view */
        .calendar-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .section-header {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #39364f;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .section-header .btn {
            background-color: #3d64ff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }
        .calendar-day {
            border: 1px solid #e7e7e7;
            border-radius: 4px;
            padding: 10px;
            min-height: 100px;
        }
        .calendar-day-header {
            text-align: center;
            font-weight: 600;
            margin-bottom: 10px;
            color: #6f7287;
        }
        .calendar-date {
            text-align: center;
            font-size: 14px;
            color: #39364f;
            margin-bottom: 10px;
        }
        .calendar-event {
            background-color: #e6f7ee;
            border-left: 3px solid #00a65a;
            padding: 5px;
            font-size: 12px;
            margin-bottom: 5px;
            border-radius: 2px;
        }
        .calendar-event.pending {
            background-color: #fff9e6;
            border-left: 3px solid #ffa500;
        }
        .calendar-event.urgent {
            background-color: #ffeaea;
            border-left: 3px solid #ff4d4f;
        }

        /* Tasks list */
        .tasks-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .task-list {
            margin-top: 20px;
        }
        .task-item {
            padding: 15px;
            border-bottom: 1px solid #e7e7e7;
            display: flex;
            align-items: center;
        }
        .task-checkbox {
            margin-right: 15px;
        }
        .task-content {
            flex: 1;
        }
        .task-title {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .task-details {
            font-size: 14px;
            color: #6f7287;
        }
        .task-priority {
            background-color: #e6f7ee;
            color: #00a65a;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            margin-left: 10px;
        }
        .task-priority.medium {
            background-color: #fff9e6;
            color: #ffa500;
        }
        .task-priority.high {
            background-color: #ffeaea;
            color: #ff4d4f;
        }

        /* Client list */
        .clients-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .clients-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .clients-table th,
        .clients-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e7e7e7;
        }
        .clients-table th {
            color: #6f7287;
            font-weight: 600;
            background-color: #f8f7fa;
        }
        .clients-table tbody tr:hover {
            background-color: #f8f7fa;
        }
        .client-status {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            display: inline-block;
        }
        .client-status.confirmed {
            background-color: #e6f7ee;
            color: #00a65a;
        }
        .client-status.pending {
            background-color: #fff9e6;
            color: #ffa500;
        }
        
        /* Vendor Management */
        .vendors-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .vendor-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }
        .vendor-card {
            background-color: #f8f7fa;
            border-radius: 8px;
            padding: 15px;
            width: calc(33.333% - 10px);
        }
        .vendor-name {
            font-weight: 600;
            margin-bottom: 10px;
            color: #39364f;
        }
        .vendor-category {
            font-size: 12px;
            color: #6f7287;
            margin-bottom: 10px;
        }
        .vendor-contact {
            display: flex;
            align-items: center;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .vendor-icon {
            margin-right: 8px;
            color: #3d64ff;
        }
        
        /* Budget section */
        .budget-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .budget-overview {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .budget-chart {
            flex: 2;
            background-color: #f8f7fa;
            border-radius: 8px;
            padding: 20px;
            height: 300px;
            position: relative;
        }
        .budget-details {
            flex: 1;
        }
        .budget-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e7e7e7;
        }
        .budget-category {
            font-weight: 600;
        }
        .budget-amount {
            color: #3d64ff;
        }
        .budget-progress {
            margin-top: 10px;
            background-color: #e7e7e7;
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
        }
        .budget-bar {
            height: 100%;
            background-color: #3d64ff;
            width: 65%;
        }
        
        /* Notifications */
        .notifications-section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .notification-list {
            margin-top: 20px;
        }
        .notification-item {
            display: flex;
            align-items: flex-start;
            padding: 15px 0;
            border-bottom: 1px solid #e7e7e7;
        }
        .notification-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #e6f7ee;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #00a65a;
        }
        .notification-icon.warning {
            background-color: #fff9e6;
            color: #ffa500;
        }
        .notification-icon.alert {
            background-color: #ffeaea;
            color: #ff4d4f;
        }
        .notification-content {
            flex: 1;
        }
        .notification-text {
            margin-bottom: 5px;
        }
        .notification-time {
            font-size: 12px;
            color: #6f7287;
        }
        
        /* Quick actions */
        .quick-actions {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        .action-button {
            flex: 1;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
        }
        .action-button:hover {
            transform: translateY(-5px);
        }
        .action-icon {
            width: 40px;
            height: 40px;
            margin: 0 auto 15px;
            background-color: #f0f3ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3d64ff;
        }
        .action-title {
            font-weight: 600;
            margin-bottom: 10px;
        }
        .action-description {
            font-size: 14px;
            color: #6f7287;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .dashboard-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .vendor-card {
                width: calc(50% - 10px);
            }
            .budget-overview {
                flex-direction: column;
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            .calendar-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            .vendor-card {
                width: 100%;
            }
            .quick-actions {
                flex-direction: column;
            }
            .main-content {
                margin-left: 0;
                padding: 15px;
                width: 100%;
            }
            .side-nav {
                width: 100%;
                height: auto;
                position: fixed;
                top: 48px;
                flex-direction: row;
                padding: 10px 0;
                justify-content: center;
                border-right: none;
                border-bottom: 1px solid #e7e7e7;
                z-index: 95;
            }
            .side-nav a {
                margin: 0 10px;
            }
            .main-content {
                margin-top: 100px;
            }
        }
    </style>
</head>
<body>
    <!-- Main Navigation -->
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <div class="logo">C_event</div>
                <div class="nav-right">
                    <button class="create-btn admin">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        New Event
                    </button>
                    <div class="user-menu">
                        <div class="user-avatar">A</div>
                        <span>Admin User</span>
                        <div class="dropdown-menu" id="userDropdown">
                            <a href="#" class="dropdown-item">Your Profile</a>
                            <a href="#" class="dropdown-item">Account Settings</a>
                            <a href="#" class="dropdown-item">Your Events</a>
                            <a href="#" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Side Navigation -->
    <div class="side-nav">
        <a href="#" class="active">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
        </a>
        <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
        </a>
        <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
        </a>
        <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="20" x2="18" y2="10"></line>
                <line x1="12" y1="20" x2="12" y2="4"></line>
                <line x1="6" y1="20" x2="6" y2="14"></line>
            </svg>
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="welcome-header">Admin Dashboard</h1>
        
        <!-- Dashboard Overview Stats -->
        <div class="dashboard-grid">
            <div class="stats-card">
                <div class="stats-title">Upcoming Events</div>
                <div class="stats-value">12</div>
                <div class="stats-subtitle">Next event in 3 days</div>
            </div>
            <div class="stats-card">
                <div class="stats-title">Registered Attendees</div>
                <div class="stats-value">487</div>
                <div class="stats-subtitle">+27 this week</div>
            </div>
            <div class="stats-card">
                <div class="stats-title">Total Revenue</div>
                <div class="stats-value">$24,850</div>
                <div class="stats-subtitle">For current month</div>
            </div>
        </div>
        
        <!-- Quick Action Buttons -->
        <div class="quick-actions">
            <div class="action-button">
                <div class="action-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                </div>
                <div class="action-title">Create Event</div>
                <div class="action-description">Set up a new event from scratch</div>
            </div>
            <div class="action-button">
                <div class="action-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                    </svg>
                </div>
                <div class="action-title">Generate Report</div>
                <div class="action-description">Create performance reports</div>
            </div>
            <div class="action-button">
                <div class="action-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <div class="action-title">Send Messages</div>
                <div class="action-description">Contact clients or vendors</div>
            </div>
        </div>
        
        <!-- Calendar View -->
        <div class="calendar-section">
            <div class="section-header">
                <span>Event Calendar</span>
                <button class="btn">Add Event</button>
            </div>
            <div class="calendar-grid">
                <div class="calendar-day">
                    <div class="calendar-day-header">Mon</div>
                    <div class="calendar-date">Apr 8</div>
                    <div class="calendar-event">Conference Setup</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Tue</div>
                    <div class="calendar-date">Apr 9</div>
                    <div class="calendar-event">Tech Meetup</div>
                    <div class="calendar-event pending">Venue Inspection</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Wed</div>
                    <div class="calendar-date">Apr 10</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Thu</div>
                    <div class="calendar-date">Apr 11</div>
                    <div class="calendar-event urgent">Final Deadline</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Fri</div>
                    <div class="calendar-date">Apr 12</div>
                    <div class="calendar-event">Team Meeting</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Sat</div>
                    <div class="calendar-date">Apr 13</div>
                    <div class="calendar-event">Wedding Event</div>
                    <div class="calendar-event">Birthday Party</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Sun</div>
                    <div class="calendar-date">Apr 14</div>
                </div>
            </div>
        </div>
        
        <!-- Task Management -->
        <div class="tasks-section">
            <div class="section-header">
                <span>Task Management</span>
                <button class="btn">Add Task</button>
            </div>
            <div class="task-list">
                <div class="task-item">
                    <input type="checkbox" class="task-checkbox">
                    <div class="task-content">
                        <div class="task-title">Confirm catering order for Tech Conference</div>
                        <div class="task-details">Due: Apr 10, 2025 • Assigned to: Mark Johnson</div>
                    </div>
                    <div class="task-priority high">High</div>
                </div>
                <div class="task-item">
                    <input type="checkbox" class="task-checkbox">
                    <div class="task-content">
                        <div class="task-title">Send reminders to all speakers</div>
                        <div class="task-details">Due: Apr 11, 2025 • Assigned to: Sarah Williams</div>
                    </div>
                    <div class="task-priority medium">Medium</div>
                </div>
                <div class="task-item">
                    <input type="checkbox" class="task-checkbox">
                    <div class="task-content">
                        <div class="task-title">Review venue security plans</div>
                        <div class="task-details">Due: Apr 12, 2025 • Assigned to: You</div>
                    </div>
                    <div class="task-priority">Low</div>
                </div>
                <div class="task-item">
                    <input type="checkbox" class="task-checkbox">
                    <div class="task-content">
                        <div class="task-title">Finalize A/V equipment rental</div>
                        <div class="task-details">Due: Apr 14, 2025 • Assigned to: Mike Davis</div>
                    </div>
                    <div class="task-priority medium">Medium</div>
                </div>
            </div>
        </div>
        
        <!-- Client Information -->
        <div class="clients-section">
            <div class="section-header">
                <span>Client & Attendee Information</span>
                <button class="btn">View All</button>
            </div>
            <table class="clients-table">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Attendees</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Acme Corporation</td>
                        <td>Annual Tech Conference</td>
                        <td>Apr 15, 2025</td>
                        <td>250</td>
                        <td><span class="client-status confirmed">Confirmed</span></td>
                    </tr>
                    <tr>
                        <td>Global Industries</td>
                        <td>Product Launch</td>
                        <td>Apr 22, 2025</td>
                        <td>120</td>
                        <td><span class="client-status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td><!-- Continuing the clients-table tbody from where it left off -->
                    <tr>
                        <td>StarTech Solutions</td>
                        <td>Team Building Workshop</td>
                        <td>Apr 28, 2025</td>
                        <td>45</td>
                        <td><span class="client-status confirmed">Confirmed</span></td>
                    </tr>
                    <tr>
                        <td>Johnson Family</td>
                        <td>Wedding Reception</td>
                        <td>May 3, 2025</td>
                        <td>150</td>
                        <td><span class="client-status confirmed">Confirmed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Vendor Management -->
        <div class="vendors-section">
            <div class="section-header">
                <span>Vendor Management</span>
                <button class="btn">Add Vendor</button>
            </div>
            <div class="vendor-list">
                <div class="vendor-card">
                    <div class="vendor-name">Gourmet Catering Co.</div>
                    <div class="vendor-category">Catering</div>
                    <div class="vendor-contact">
                        <span class="vendor-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </span>
                        (555) 123-4567
                    </div>
                    <div class="vendor-contact">
                        <span class="vendor-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </span>
                        contact@gourmetcatering.com
                    </div>
                </div>
                <div class="vendor-card">
                    <div class="vendor-name">SoundMasters Pro</div>
                    <div class="vendor-category">Audio/Visual</div>
                    <div class="vendor-contact">
                        <span class="vendor-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </span>
                        (555) 234-5678
                    </div>
                    <div class="vendor-contact">
                        <span class="vendor-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </span>
                        info@soundmasterspro.com
                    </div>
                </div>
                <div class="vendor-card">
                    <div class="vendor-name">Elegant Decor</div>
                    <div class="vendor-category">Decoration & Flowers</div>
                    <div class="vendor-contact">
                        <span class="vendor-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </span>
                        (555) 345-6789
                    </div>
                    <div class="vendor-contact">
                        <span class="vendor-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </span>
                        contact@elegantdecor.com
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Budget Section -->
        <div class="budget-section">
            <div class="section-header">
                <span>Budget Tracking</span>
                <button class="btn">View Details</button>
            </div>
            <div class="budget-overview">
                <div class="budget-chart">
                    <!-- Budget chart will be rendered here with JavaScript -->
                    <canvas id="budgetChart"></canvas>
                </div>
                <div class="budget-details">
                    <div class="budget-item">
                        <div class="budget-category">Venue</div>
                        <div class="budget-amount">$8,500 / $10,000</div>
                        <div class="budget-progress">
                            <div class="budget-bar" style="width: 85%;"></div>
                        </div>
                    </div>
                    <div class="budget-item">
                        <div class="budget-category">Catering</div>
                        <div class="budget-amount">$5,200 / $7,500</div>
                        <div class="budget-progress">
                            <div class="budget-bar" style="width: 70%;"></div>
                        </div>
                    </div>
                    <div class="budget-item">
                        <div class="budget-category">A/V Equipment</div>
                        <div class="budget-amount">$3,700 / $4,000</div>
                        <div class="budget-progress">
                            <div class="budget-bar" style="width: 92%;"></div>
                        </div>
                    </div>
                    <div class="budget-item">
                        <div class="budget-category">Decor</div>
                        <div class="budget-amount">$2,100 / $3,000</div>
                        <div class="budget-progress">
                            <div class="budget-bar" style="width: 70%;"></div>
                        </div>
                    </div>
                    <div class="budget-item">
                        <div class="budget-category">Marketing</div>
                        <div class="budget-amount">$1,800 / $2,500</div>
                        <div class="budget-progress">
                            <div class="budget-bar" style="width: 72%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Venue Information -->
        <div class="clients-section">
            <div class="section-header">
                <span>Venue Information</span>
                <button class="btn">Add Venue</button>
            </div>
            <table class="clients-table">
                <thead>
                    <tr>
                        <th>Venue Name</th>
                        <th>Location</th>
                        <th>Capacity</th>
                        <th>Upcoming Events</th>
                        <th>Availability</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Grand Plaza Hotel</td>
                        <td>Downtown</td>
                        <td>500</td>
                        <td>2</td>
                        <td><span class="client-status confirmed">Available</span></td>
                    </tr>
                    <tr>
                        <td>Riverside Conference Center</td>
                        <td>Westside</td>
                        <td>750</td>
                        <td>1</td>
                        <td><span class="client-status confirmed">Available</span></td>
                    </tr>
                    <tr>
                        <td>The Loft Garden</td>
                        <td>Northside</td>
                        <td>200</td>
                        <td>3</td>
                        <td><span class="client-status pending">Limited</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Team Communication -->
        <div class="notifications-section">
            <div class="section-header">
                <span>Team Communication</span>
                <button class="btn">Send Message</button>
            </div>
            <div class="notification-list">
                <div class="notification-item">
                    <div class="notification-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>Sarah Williams:</strong> I've confirmed all the speakers for the Tech Conference. All set for next week!</div>
                        <div class="notification-time">Today, 2:45 PM</div>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="notification-icon warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>Mark Johnson:</strong> The catering company needs a final headcount by tomorrow noon. Can we confirm?</div>
                        <div class="notification-time">Today, 12:30 PM</div>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="notification-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>Mike Davis:</strong> A/V equipment is ready for delivery on Friday. Need someone to be there for sign-off.</div>
                        <div class="notification-time">Yesterday, 4:15 PM</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Documents & Resources -->
        <div class="clients-section">
            <div class="section-header">
                <span>Documents & Resources</span>
                <button class="btn">Upload Document</button>
            </div>
            <table class="clients-table">
                <thead>
                    <tr>
                        <th>Document Name</th>
                        <th>Type</th>
                        <th>Related Event</th>
                        <th>Last Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tech Conference Contract</td>
                        <td>Contract</td>
                        <td>Annual Tech Conference</td>
                        <td>Apr 5, 2025</td>
                        <td>
                            <button class="btn" style="padding: 4px 8px; font-size: 12px;">Download</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Vendor Agreement Template</td>
                        <td>Template</td>
                        <td>All Events</td>
                        <td>Mar 22, 2025</td>
                        <td>
                            <button class="btn" style="padding: 4px 8px; font-size: 12px;">Download</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Wedding Planning Checklist</td>
                        <td>Checklist</td>
                        <td>Wedding Reception</td>
                        <td>Apr 2, 2025</td>
                        <td>
                            <button class="btn" style="padding: 4px 8px; font-size: 12px;">Download</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
       <!-- Notifications Area -->
       <div class="notifications-section">
            <div class="section-header">
                <span>Notifications & Alerts</span>
                <button class="btn">View All</button>
            </div>
            <div class="notification-list">
                <div class="notification-item">
                    <div class="notification-icon alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>Urgent:</strong> Final deadline for Tech Conference materials is tomorrow at 5 PM!</div>
                        <div class="notification-time">Today, 3:30 PM</div>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="notification-icon warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>Reminder:</strong> Payment for Global Industries event is due next Monday</div>
                        <div class="notification-time">Today, 11:45 AM</div>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="notification-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>New Message:</strong> You have 3 new client inquiries to review</div>
                        <div class="notification-time">Today, 9:20 AM</div>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="notification-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path>
                        </svg>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text"><strong>System Update:</strong> New event templates are now available in the system</div>
                        <div class="notification-time">Yesterday, 2:15 PM</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for interactive elements -->
    <script>
        // Toggle user dropdown menu
        document.addEventListener('DOMContentLoaded', function() {
            const userMenu = document.querySelector('.user-menu');
            const dropdownMenu = document.getElementById('userDropdown');
            
            userMenu.addEventListener('click', function() {
                dropdownMenu.classList.toggle('active');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!userMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('active');
                }
            });
            
            // Create budget chart
            const ctx = document.getElementById('budgetChart').getContext('2d');
            
            // Simple chart rendering with canvas
            function drawBudgetChart() {
                const categories = ['Venue', 'Catering', 'A/V', 'Decor', 'Marketing'];
                const budgeted = [10000, 7500, 4000, 3000, 2500];
                const spent = [8500, 5200, 3700, 2100, 1800];
                
                const maxBudget = Math.max(...budgeted);
                const chartWidth = ctx.canvas.width - 100;
                const chartHeight = ctx.canvas.height - 80;
                const barHeight = 30;
                const spacing = 15;
                const startY = 50;
                
                // Clear canvas
                ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
                
                // Draw title
                ctx.font = 'bold 16px Helvetica Neue, Arial, sans-serif';
                ctx.fillStyle = '#39364f';
                ctx.fillText('Budget Allocation by Category', 20, 30);
                
                // Draw categories and bars
                categories.forEach((category, index) => {
                    const y = startY + index * (barHeight + spacing);
                    
                    // Draw category label
                    ctx.font = '14px Helvetica Neue, Arial, sans-serif';
                    ctx.fillStyle = '#6f7287';
                    ctx.fillText(category, 20, y + barHeight/2 + 5);
                    
                    // Draw budgeted bar (background)
                    ctx.fillStyle = '#e7e7e7';
                    ctx.fillRect(100, y, chartWidth * (budgeted[index] / maxBudget), barHeight);
                    
                    // Draw spent bar (foreground)
                    ctx.fillStyle = '#3d64ff';
                    ctx.fillRect(100, y, chartWidth * (spent[index] / maxBudget), barHeight);
                    
                    // Draw amount text
                    ctx.font = '12px Helvetica Neue, Arial, sans-serif';
                    ctx.fillStyle = '#39364f';
                    ctx.fillText(`$${spent[index]} / $${budgeted[index]}`, 
                                 100 + chartWidth * (spent[index] / maxBudget) + 10, 
                                 y + barHeight/2 + 4);
                });
                
                // Draw legend
                const legendY = startY + categories.length * (barHeight + spacing) + 20;
                
                // Spent legend item
                ctx.fillStyle = '#3d64ff';
                ctx.fillRect(100, legendY, 15, 15);
                ctx.font = '12px Helvetica Neue, Arial, sans-serif';
                ctx.fillStyle = '#6f7287';
                ctx.fillText('Spent', 125, legendY + 12);
                
                // Budgeted legend item
                ctx.fillStyle = '#e7e7e7';
                ctx.fillRect(200, legendY, 15, 15);
                ctx.fillStyle = '#6f7287';
                ctx.fillText('Budgeted', 225, legendY + 12);
            }
            
            // Draw chart initially and on window resize
            drawBudgetChart();
            window.addEventListener('resize', drawBudgetChart);
            
            // Add task checkbox functionality
            const taskCheckboxes = document.querySelectorAll('.task-checkbox');
            taskCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const taskItem = this.closest('.task-item');
                    if (this.checked) {
                        taskItem.style.opacity = '0.6';
                        taskItem.querySelector('.task-title').style.textDecoration = 'line-through';
                    } else {
                        taskItem.style.opacity = '1';
                        taskItem.querySelector('.task-title').style.textDecoration = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>