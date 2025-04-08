<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <title>{{ config('app.name', 'MultiAuthApp') }}</title> -->
     <title>CMR_event</title>
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
        }
        .logo img {
            height: 100%;
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
        /* Admin Dashboard Section */
        .admin-section {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .admin-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #3d64ff;
        }
        .admin-stats {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .admin-stat-card {
            flex: 1;
            background-color: #f0f3ff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .admin-stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #3d64ff;
            margin-bottom: 5px;
        }
        .admin-stat-label {
            color: #6f7287;
            font-size: 14px;
        }
        .admin-recent {
            margin-top: 20px;
        }
        .admin-recent-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .admin-recent-list {
            background-color: #f9fafc;
            border-radius: 8px;
            overflow: hidden;
        }
        .admin-recent-item {
            padding: 15px;
            border-bottom: 1px solid #e7e7e7;
            display: flex;
            justify-content: space-between;
        }
        .admin-recent-item:last-child {
            border-bottom: none;
        }
        .admin-recent-info {
            flex: 1;
        }
        .admin-recent-name {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .admin-recent-date {
            font-size: 12px;
            color: #6f7287;
        }
        .admin-recent-status {
            background-color: #e6f7ee;
            color: #00a65a;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            height: fit-content;
        }
        .admin-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        .admin-action-btn {
            flex: 1;
            background-color: white;
            border: 1px solid #3d64ff;
            color: #3d64ff;
            padding: 10px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
        }
        .admin-action-btn.primary {
            background-color: #3d64ff;
            color: white;
        }
        
        /* Creation options */
        .creation-options {
            display: flex;
            gap: 20px;
            margin-bottom: 40px;
        }
        .option-card {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .option-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            color: #3d64ff;
        }
        .option-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .option-description {
            color: #6f7287;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.4;
        }
        .option-button {
            background-color: white;
            border: 1px solid #dbdae3;
            color: #39364f;
            padding: 10px 20px;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
        }
        .option-button:hover {
            background-color: #f8f7fa;
        }
        .option-button.primary {
            background-color: #3d64ff;
            color: white;
            border: none;
        }
        .option-button.primary:hover {
            background-color: #3559e0;
        }
        .option-button.admin {
            background-color: #3d64ff;
            color: white;
            border: none;
        }

        /* Checklist Section */
        .checklist {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 40px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .section-header {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
            color: #39364f;
        }
        .section-subtitle {
            color: #3d64ff;
            margin-bottom: 20px;
            text-decoration: none;
            font-weight: 500;
            display: inline-block;
        }
        .checklist-intro {
            color: #6f7287;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .checklist-items {
            margin-top: 20px;
        }
        .checklist-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #f1f1f4;
        }
        .checklist-item:last-child {
            border-bottom: none;
        }
        .checklist-info {
            flex: 1;
        }
        .checklist-title {
            color: #3d64ff;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .checklist-description {
            color: #6f7287;
            font-size: 14px;
        }
        .draft-label {
            background-color: #f8f7fa;
            padding: 5px 15px;
            border-radius: 20px;
            color: #6f7287;
            font-size: 14px;
            font-weight: 600;
        }

        /* Resources Section */
        .resources-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }
        .resource-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .resource-tag {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 15px;
            font-size: 12px;
            color: #6f7287;
        }
        .resource-content {
            padding: 0 15px 15px;
        }
        .resource-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: #39364f;
        }
        .resource-link {
            color: #3d64ff;
            font-size: 14px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        /* Academy Courses Section */
        .academy-section {
            margin-bottom: 40px;
        }
        .academy-courses {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            margin-bottom: 20px;
            padding: 10px 0;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* IE and Edge */
        }
        .academy-courses::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }
        .course-card {
            flex: 0 0 280px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: relative;
            height: 280px;
        }
        .course-image {
            height: 120px;
            background-color: #f6f7f9;
        }
        .course-tag {
            position: absolute;
            top: 130px;
            left: 15px;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            color: #6f7287;
        }
        .course-duration {
            position: absolute;
            top: 130px;
            right: 15px;
            font-size: 12px;
            color: #6f7287;
        }
        .course-content {
            padding: 35px 15px 15px;
        }
        .course-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: #39364f;
        }
        .course-description {
            color: #6f7287;
            font-size: 14px;
            margin-bottom: 15px;
            line-height: 1.4;
        }
        .course-link {
            color: #3d64ff;
            font-size: 14px;
            text-decoration: none;
            position: absolute;
            bottom: 15px;
            left: 15px;
        }
        .navigation-controls {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .nav-button {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid #e7e7e7;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .nav-button:hover {
            background-color: #f8f7fa;
        }

        /* Community Spotlight Section */
        .community-spotlight {
            background-color: white;
            border-radius: 8px;
            margin-bottom: 40px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        .spotlight-content {
            display: flex;
            padding: 20px;
        }
        .spotlight-image {
            width: 240px;
            height: 160px;
            border-radius: 4px;
            object-fit: cover;
            margin-right: 20px;
        }
        .spotlight-info {
            flex: 1;
        }
        .spotlight-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #39364f;
        }
        .spotlight-quote {
            font-size: 16px;
            font-style: italic;
            margin-bottom: 15px;
            line-height: 1.4;
            color: #39364f;
        }
        .spotlight-bio {
            color: #6f7287;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .spotlight-controls {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 0 20px 20px;
        }

        /* Help Section */
        .help-section {
            margin-bottom: 40px;
        }
        .help-options {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .help-card {
            flex: 1;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            cursor: pointer;
        }
        .help-card:hover {
            background-color: #f8f7fa;
        }
        .help-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            color: #3d64ff;
        }
        .help-title {
            font-size: 16px;
            font-weight: 600;
            color: #39364f;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .resources-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .creation-options {
                flex-direction: column;
            }
            .resources-grid {
                grid-template-columns: 1fr;
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
            .spotlight-content {
                flex-direction: column;
            }
            .spotlight-image {
                width: 100%;
                margin-right: 0;
                margin-bottom: 15px;
            }
            .help-options {
                flex-wrap: wrap;
            }
            .help-card {
                flex-basis: calc(50% - 10px);
            }
        }
    </style>
</head>
<body>
    <!-- Main Navigation -->
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <div class="logo">
                    <!-- Replace with your logo image -->
                    <img src="/path-to-your-logo.png" alt="">
                </div>
                <div class="nav-right">
                    <button class="create-btn {{ auth()->user()->role === 'admin' ? 'admin' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Create
                    </button>
                    <div class="user-menu">
                        <div class="user-avatar">{{ auth()->user()->name[0] }}</div>
                        <span>{{ auth()->user()->name }}</span>
                        <div class="dropdown-menu" id="userDropdown">
    <a 
        href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" 
        class="dropdown-item">
        Your Profile
    </a>

    <a href="#" class="dropdown-item">Account Settings</a>
    <a href="#" class="dropdown-item">Your Events</a>

    <a href="{{ route('logout') }}" class="dropdown-item"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
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
        @if(auth()->user()->role === 'admin')
        <!-- Admin Dashboard Section -->
        <div class="admin-section">
            <h2 class="admin-title">Admin Dashboard</h2>
            <p>Welcome to your admin dashboard. Here's your activity overview.</p>
            
            <div class="admin-stats">
                <div class="admin-stat-card">
                    <div class="admin-stat-value">156</div>
                    <div class="admin-stat-label">Active Events</div>
                </div>
                <div class="admin-stat-card">
                    <div class="admin-stat-value">2,147</div>
                    <div class="admin-stat-label">Registered Users</div>
                </div>
                <div class="admin-stat-card">
                    <div class="admin-stat-value">84%</div>
                    <div class="admin-stat-label">Completion Rate</div>
                </div>
            </div>
            
            <div class="admin-recent">
                <h3 class="admin-recent-title">Recent Events</h3>
                <div class="admin-recent-list">
                    <div class="admin-recent-item">
                        <div class="admin-recent-info">
                            <div class="admin-recent-name">Tech Conference 2025</div>
                            <div class="admin-recent-date">Created on April 5, 2025</div>
                        </div>
                        <div class="admin-recent-status">Published</div>
                    </div>
                    <div class="admin-recent-item">
                        <div class="admin-recent-info">
                            <div class="admin-recent-name">Annual Charity Gala</div>
                            <div class="admin-recent-date">Created on April 3, 2025</div>
                        </div>
                        <div class="admin-recent-status">Published</div>
                    </div>
                    <div class="admin-recent-item">
                        <div class="admin-recent-info">
                            <div class="admin-recent-name">Summer Music Festival</div>
                            <div class="admin-recent-date">Created on April 1, 2025</div>
                        </div>
                        <div class="admin-recent-status">Published</div>
                    </div>
                </div>
            </div>
            
            <div class="admin-actions">
                <button class="admin-action-btn">View All Events</button>
                <button class="admin-action-btn">Manage Users</button>
                <button class="admin-action-btn primary">Create New Event</button>
            </div>
        </div>
        @endif

        <!-- Welcome Header -->
        <h1 class="welcome-header">Hello there, {{ auth()->user()->name }}</h1>

        <!-- Creation Options -->
        <div class="creation-options">
            <div class="option-card">
                <div class="option-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                </div>
                <h3 class="option-title">Start from scratch</h3>
                <p class="option-description">Add all your event details, create new tickets, and set up recurring events</p>
                <button class="option-button">Create event</button>
            </div>
            <div class="option-card">
                <div class="option-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                        <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                        <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                        <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                        <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                        <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                    </svg>
                </div>
                <h3 class="option-title">Create my event faster with AI</h3>
                <p class="option-description">Answer a few quick questions to generate a ready-to-publish event almost instantly</p>
                <button class="option-button {{ auth()->user()->role === 'admin' ? 'admin' : 'primary' }}">Create with AI</button>
            </div>
        </div>

        <!-- Checklist Section -->
        <div class="checklist">
            <h2 class="section-header">Your checklist</h2>
            <p class="checklist-intro">We make it easy to host successful events. Here's how to get started!</p>
            
            <div class="checklist-items">
                <div class="checklist-item">
                    <div class="checklist-info">
                        <div class="checklist-title">Create event</div>
                        <div class="checklist-description">Publish an event to reach millions of people on C_event.</div>
                    </div>
                    <div class="draft-label">Draft</div>
                </div>
              
                <!-- Continue where the previous code left off, inside the checklist-items div -->
                <div class="checklist-item">
                    <div class="checklist-info">
                        <div class="checklist-title">Set up your organizer profile</div>
                        <div class="checklist-description">Highlight your brand by adding your organizer name, image, and bio.</div>
                    </div>
                    <div class="draft-label">Draft</div>
                </div>
                <div class="checklist-item">
                    <div class="checklist-info">
                        <div class="checklist-title">Add your bank account</div>
                        <div class="checklist-description">Get paid for future ticket sales by entering your bank details.</div>
                    </div>
                    <div class="draft-label">Draft</div>
                </div>
            </div>
        </div>

        <!-- Top Resources Section -->
        <h2 class="section-header">Top resources for you</h2>
        <a href="#" class="section-subtitle">Visit C_event Blog</a>
        
        <div class="resources-grid">
            <div class="resource-card">
                <div class="resource-tag">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    C_event Marketing Experts
                </div>
                <div class="resource-content">
                    <h3 class="resource-title">Digital Marketing Guide for Events</h3>
                    <a href="#" class="resource-link">
                        Read article
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="resource-card">
                <div class="resource-tag">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    C_event Marketing Experts
                </div>
                <div class="resource-content">
                    <h3 class="resource-title">Safety Playbook for Events</h3>
                    <a href="#" class="resource-link">
                        Read article
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="resource-card">
                <div class="resource-tag">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    C_event Marketing Experts
                </div>
                <div class="resource-content">
                    <h3 class="resource-title">10 Best Ways to Market and Sell Out Your Event</h3>
                    <a href="#" class="resource-link">
                        Read article
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Academy Courses Section -->
        <div class="academy-section">
            <h2 class="section-header">Level up your skills at C_event Academy</h2>
            <a href="#" class="section-subtitle">Visit C_event Academy</a>
            
            <div class="academy-courses">
                <div class="course-card">
                    <div class="course-image"></div>
                    <div class="course-tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        COURSE
                    </div>
                    <div class="course-duration">23 min</div>
                    <div class="course-content">
                        <h3 class="course-title">Create Tickets</h3>
                        <p class="course-description">This guide will show you how to create and edit ticket types for your event.</p>
                        <a href="#" class="course-link">View course</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-image"></div>
                    <div class="course-tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        COURSE
                    </div>
                    <div class="course-duration">7 min</div>
                    <div class="course-content">
                        <h3 class="course-title">Getting Paid via C_event</h3>
                        <p class="course-description">This guide walks through adding a payout method to your event if you're selling tickets using C_event's Payment Processing.</p>
                        <a href="#" class="course-link">View course</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-image"></div>
                    <div class="course-tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        COURSE
                    </div>
                    <div class="course-duration">14 min</div>
                    <div class="course-content">
                        <h3 class="course-title">Order Confirmation</h3>
                        <p class="course-description">Learn all about sharing details like parking, checking in at the event, things to bring, and more.</p>
                        <a href="#" class="course-link">View course</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-image"></div>
                    <div class="course-tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        COURSE
                    </div>
                    <div class="course-duration">12 min</div>
                    <div class="course-content">
                        <h3 class="course-title">Refund Policies</h3>
                        <p class="course-description">Learn how to set up refund policies for C_events.</p>
                        <a href="#" class="course-link">View course</a>
                    </div>
                </div>
            </div>
            
            <div class="navigation-controls">
                <button class="nav-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <button class="nav-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Community Spotlight Section -->
        <div class="community-spotlight">
            <div class="spotlight-content">
                <img src="/path-to-spotlight-image.jpg" alt="Community Spotlight" class="spotlight-image">
                <div class="spotlight-info">
                    <h2 class="spotlight-title">Meet Prashant</h2>
                    <p class="spotlight-quote">"As someone who completely relies on people buying tickets to [our] event to get the word out, C_event plays a huge part in my business."</p>
                    <p class="spotlight-bio">Prashant Kakad, Founder of Jai Ho! Dance Party and Bollywood Dreams Entertainment</p>
                </div>
            </div>
            <div class="spotlight-controls">
                <button class="nav-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <button class="nav-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Help Section -->
        <div class="help-section">
            <h2 class="section-header">How can we help?</h2>
            <a href="#" class="section-subtitle">Go to Help Center</a>
            
            <div class="help-options">
                <div class="help-card">
                    <div class="help-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <h3 class="help-title">Creating an event</h3>
                </div>
                <div class="help-card">
                    <div class="help-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </div>
                    <h3 class="help-title">Your account</h3>
                </div>
                <div class="help-card">
                    <div class="help-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                        </svg>
                    </div>
                    <h3 class="help-title">Marketing an event</h3>
                </div>
                <div class="help-card">
                    <div class="help-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2" ry="2"></rect>
                            <path d="M6 9h12v8H6z"></path>
                            <line x1="2" y1="8" x2="22" y2="8"></line>
                        </svg>
                    </div>
                    <h3 class="help-title">Payouts and taxes</h3>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for user dropdown menu
        document.addEventListener('DOMContentLoaded', function() {
            const userMenu = document.querySelector('.user-menu');
            const dropdown = document.getElementById('userDropdown');
            
            userMenu.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdown.classList.toggle('active');
            });
            
            document.addEventListener('click', function() {
                dropdown.classList.remove('active');
            });
            
            // Logout functionality
            document.getElementById('logoutBtn').addEventListener('click', function(e) {
                e.preventDefault();
                // Add logout functionality here
                alert('Logging out...');
            });
        });
    </script>
</body>
</html>