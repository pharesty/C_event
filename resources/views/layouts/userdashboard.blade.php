<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMR_event- User Dashboard</title>
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
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #39364f;
        }

        /* Dashboard cards */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
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

        /* Section styles */
        .section {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .section-header {
            font-size: 18px;
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
        
        /* Events list */
        .events-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .event-card {
            border: 1px solid #e7e7e7;
            border-radius: 8px;
            overflow: hidden;
        }
        .event-image {
            height: 160px;
            background-color: #f0f3ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3d64ff;
        }
        .event-details {
            padding: 15px;
        }
        .event-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #39364f;
        }
        .event-meta {
            font-size: 14px;
            color: #6f7287;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .event-meta svg {
            color: #3d64ff;
        }
        .event-actions {
            display: flex;
            margin-top: 15px;
        }
        .event-btn {
            flex: 1;
            padding: 8px 0;
            text-align: center;
            border: none;
            background-color: #3d64ff;
            color: white;
            font-weight: 600;
            cursor: pointer;
            border-radius: 4px;
        }
        .event-btn.secondary {
            background-color: transparent;
            color: #3d64ff;
            border: 1px solid #3d64ff;
            margin-right: 10px;
        }
        
        /* Calendar view */
        .calendar-view {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }
        .calendar-day {
            border: 1px solid #e7e7e7;
            border-radius: 4px;
            padding: 10px;
            min-height: 80px;
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
        .calendar-event.registered {
            background-color: #e6f7ee;
            border-left: 3px solid #00a65a;
        }
        .calendar-event.interested {
            background-color: #fff9e6;
            border-left: 3px solid #ffa500;
        }
        
        /* Profile section */
        .profile-section {
            display: flex;
            gap: 30px;
        }
        .profile-info {
            flex: 1;
        }
        .profile-field {
            margin-bottom: 15px;
        }
        .profile-label {
            font-weight: 600;
            margin-bottom: 5px;
            color: #6f7287;
        }
        .profile-value {
            padding: 10px;
            border: 1px solid #e7e7e7;
            border-radius: 4px;
            background-color: #f8f7fa;
        }
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #f0f3ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            color: #3d64ff;
            margin-bottom: 15px;
        }
        
        /* Notifications */
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
        .notification-icon.reminder {
            background-color: #fff9e6;
            color: #ffa500;
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
        
        /* Registration form */
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #39364f;
        }
        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #e7e7e7;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-input:focus {
            outline: none;
            border-color: #3d64ff;
        }
        .form-submit {
            background-color: #3d64ff;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
        }
        
        /* Quick links */
        .quick-links {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }
        .quick-link {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            flex: 1;
            min-width: 200px;
            color: #39364f;
            text-decoration: none;
        }
        .quick-link:hover {
            transform: translateY(-3px);
            transition: transform 0.2s;
        }
        .quick-link-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background-color: #f0f3ff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #3d64ff;
        }
        .quick-link-text {
            font-weight: 600;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .events-list {
                grid-template-columns: 1fr;
            }
            .profile-section {
                flex-direction: column;
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            .calendar-view {
                grid-template-columns: repeat(3, 1fr);
            }
            .quick-links {
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
                <div class="logo">EventManager</div>
                <div class="nav-right">
                    <button class="create-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                        Register for Event
                    </button>
                    <div class="user-menu">
                        <div class="user-avatar">U</div>
                        <span>User Name</span>
                        <div class="dropdown-menu" id="userDropdown">
                            <a href="#profile" class="dropdown-item">Your Profile</a>
                            <a href="#" class="dropdown-item">Account Settings</a>
                            <a href="#" class="dropdown-item">Your Tickets</a>
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
        <a href="#events">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
        </a>
        <a href="#profile">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
        </a>
        <a href="#notifications">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="welcome-header">Welcome back, User!</h1>
        
        <!-- Dashboard Stats -->
        <div class="dashboard-grid">
            <div class="stats-card">
                <div class="stats-title">Your Events</div>
                <div class="stats-value">3</div>
                <div class="stats-subtitle">Next event in 2 days</div>
            </div>
            <div class="stats-card">
                <div class="stats-title">Available Tickets</div>
                <div class="stats-value">2</div>
                <div class="stats-subtitle">Tech Conference, Business Summit</div>
            </div>
        </div>
        
        <!-- Quick Links -->
        <div class="quick-links">
            <a href="#events" class="quick-link">
                <div class="quick-link-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                </div>
                <div class="quick-link-text">Browse Events</div>
            </a>
            <a href="#register" class="quick-link">
                <div class="quick-link-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                </div>
                <div class="quick-link-text">Your Tickets</div>
            </a>
            <a href="#profile" class="quick-link">
                <div class="quick-link-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="quick-link-text">Update Profile</div>
            </a>
        </div>
        
        <!-- Events Section -->
        <div id="events" class="section">
            <div class="section-header">
                <span>Upcoming Events</span>
                <button class="btn">View All</button>
            </div>
            <div class="events-list">
                <div class="event-card">
                    <div class="event-image">
                        <!-- Image placeholder - would be replaced with actual image -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                    </div>
                    <div class="event-details">
                        <h3 class="event-title">Annual Tech Conference</h3>
                        <div class="event-meta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            Apr 15, 2025
                        </div>
                        <div class="event-meta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Grand Plaza Hotel
                        </div>
                        <div class="event-actions">
                            <button class="event-btn secondary">Details</button>
                            <button class="event-btn" id="register-tech-conf">Register</button>
                        </div>
                    </div>
                </div>
                <div class="event-card">
                    <div class="event-image">
                        <!-- Image placeholder - would be replaced with actual image -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                    </div>
                    <div class="event-details">
                        <h3 class="event-title">Business Leadership Summit</h3>
                        <div class="event-meta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            Apr 22, 2025
                        </div>
                        <div class="event-meta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Riverside Conference Center
                        </div>
                        <div class="event-actions">
                            <button class="event-btn secondary">Details</button>
                            <button class="event-btn" id="register-business-summit">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Calendar Section -->
        <div class="section">
            <div class="section-header">
                <span>Your Event Calendar</span>
                <button class="btn">Export</button>
            </div>
            <div class="calendar-view">
                <div class="calendar-day">
                    <div class="calendar-day-header">Mon</div>
                    <div class="calendar-date">Apr 8</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Tue</div>
                    <div class="calendar-date">Apr 9</div>
                    <div class="calendar-event interested">Tech Meetup</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Wed</div>
                    <div class="calendar-date">Apr 10</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Thu</div>
                    <div class="calendar-date">Apr 11</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Fri</div>
                    <div class="calendar-date">Apr 12</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Sat</div>
                    <div class="calendar-date">Apr 13</div>
                </div>
                <div class="calendar-day">
                    <div class="calendar-day-header">Sun</div>
                    <div class="calendar-date">Apr 14</div>
                </div>
            </div>
        </div>
        
        <!-- Registration Form -->
        <div id="register" class="section">
            <div class="section-header">
                <span>Event Registration</span>
            </div>
            <form id="event-registration-form" class="registration-form">
                <div class="form-group">
                    <label class="form-label">Select Event</label>
                    <select class="form-input" id="event-select" required>
                        <option value="">-- Select an Event --</option>
                        <option value="tech-conference">Annual Tech Conference</option>
                        <option value="business-summit">Business Leadership Summit</option>
                        <option value="team-building">Team Building Workshop</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-input" id="attendee-name" placeholder="Your full name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-input" id="attendee-email" placeholder="Your email" required>
                    </div>
                    <!-- Continuing from your registration form -->
                <div class="form-group">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" class="form-input" id="attendee-phone" placeholder="Your phone number">
                </div>
                <div class="form-group">
                    <label class="form-label">Ticket Type</label>
                    <select class="form-input" id="ticket-type" required>
                        <option value="">-- Select Ticket Type --</option>
                        <option value="standard">Standard ($99)</option>
                        <option value="premium">Premium ($199)</option>
                        <option value="vip">VIP ($299)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Additional Requirements</label>
                    <textarea class="form-input" id="additional-requirements" placeholder="Any special requirements or accommodations"></textarea>
                </div>
                <button type="submit" class="form-submit">Complete Registration</button>
            </form>
        </div>
        
        <!-- Profile Section -->
        <div id="profile" class="section">
            <div class="section-header">
                <span>Your Profile</span>
                <button class="btn">Edit Profile</button>
            </div>
            <div class="profile-section">
                <div class="profile-info">
                    <div class="profile-field">
                        <div class="profile-label">Full Name</div>
                        <div class="profile-value">User Name</div>
                    </div>
                    <div class="profile-field">
                        <div class="profile-label">Email Address</div>
                        <div class="profile-value">user@example.com</div>
                    </div>
                    <div class="profile-field">
                        <div class="profile-label">Phone Number</div>
                        <div class="profile-value">+1 (555) 123-4567</div>
                    </div>
                    <div class="profile-field">
                        <div class="profile-label">Location</div>
                        <div class="profile-value">New York, USA</div>
                    </div>
                    <div class="profile-field">
                        <div class="profile-label">Interests</div>
                        <div class="profile-value">Technology, Business Development, Marketing</div>
                    </div>
                </div>
                <div>
                    <div class="profile-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <button class="event-btn">Change Avatar</button>
                </div>
            </div>
        </div>
        
        <!-- Notifications Section -->
        <div id="notifications" class="section">
            <div class="section-header">
                <span>Notifications</span>
                <button class="btn">Mark All as Read</button>
            </div>
            <div class="notification-list">
                <div class="notification-item">
                    <div class="notification-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="M9 12l2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text">Your registration for <strong>Team Building Workshop</strong> has been confirmed.</div>
                        <div class="notification-time">2 hours ago</div>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="notification-icon reminder">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text">Reminder: <strong>Tech Meetup</strong> is tomorrow at 6:00 PM.</div>
                        <div class="notification-time">5 hours ago</div>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="notification-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text">New event <strong>Digital Marketing Conference</strong> has been added that matches your interests.</div>
                        <div class="notification-time">Yesterday</div>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="notification-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <div class="notification-content">
                        <div class="notification-text">You received an email with your tickets for <strong>Annual Tech Conference</strong>.</div>
                        <div class="notification-time">2 days ago</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- My Tickets Section -->
        <div id="tickets" class="section">
            <div class="section-header">
                <span>My Tickets</span>
                <button class="btn">Download All</button>
            </div>
            <div class="events-list">
                <div class="event-card">
                    <div class="event-image">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                    </div>
                    <div class="event-details">
                        <h3 class="event-title">Team Building Workshop</h3>
                        <div class="event-meta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            Apr 12, 2025
                        </div>
                        <div class="event-meta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Mountain View Lodge
                        </div>
                        <div class="event-meta">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                            Ticket #TBW-2025-0123
                        </div>
                        <div class="event-actions">
                            <button class="event-btn secondary">Download</button>
                            <button class="event-btn">View Details</button>
                        </div>
                    </div>
                </div>
                <!-- More tickets can be added here -->
            </div>
        </div>
    </div>

    <!-- Add JavaScript for interactivity -->
    <script>
        // User dropdown menu toggle
        document.querySelector('.user-menu').addEventListener('click', function() {
            document.getElementById('userDropdown').classList.toggle('active');
        });

        // Close dropdown when clicking elsewhere
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.user-menu')) {
                document.getElementById('userDropdown').classList.remove('active');
            }
        });

        // Event registration handling
        document.getElementById('register-tech-conf').addEventListener('click', function() {
            document.getElementById('event-select').value = 'tech-conference';
            document.getElementById('register').scrollIntoView({ behavior: 'smooth' });
        });

        document.getElementById('register-business-summit').addEventListener('click', function() {
            document.getElementById('event-select').value = 'business-summit';
            document.getElementById('register').scrollIntoView({ behavior: 'smooth' });
        });

        // Form submission handling
        document.getElementById('event-registration-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const event = document.getElementById('event-select').value;
            const name = document.getElementById('attendee-name').value;
            const email = document.getElementById('attendee-email').value;
            const phone = document.getElementById('attendee-phone').value;
            const ticketType = document.getElementById('ticket-type').value;
            
            // In a real application, you would send this data to a server
            console.log('Registration submitted:', { event, name, email, phone, ticketType });
            
            // For demo purposes, show success message
            alert('Registration submitted successfully!');
            
            // Clear form
            this.reset();
        });
    </script>
</body>
</html>