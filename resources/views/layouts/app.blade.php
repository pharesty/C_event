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

        .logolo {
            height: 24px;
        }

        .logolo img {
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
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE and Edge */
        }

        .academy-courses::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
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

        /* Styling for the show popup button - using ID instead of tag */
        /* #showPopupBtn {
            background-color: #3366cc;
            color: white;
            padding: 14px 24px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(51, 102, 204, 0.3);
            transition: all 0.3s ease;
        } */

        /* #showPopupBtn:hover {
            background-color: #2855b0;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(51, 102, 204, 0.4);
        } */

        /* #showPopupBtn:active {
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(51, 102, 204, 0.3);
        } */

        /* Overlay for the popup */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            width: 450px;
            max-height: 90vh;
            /* Set max height to prevent overflow on large screens */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow-y: auto;
            /* Allow scrolling if content overflows */
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE and Edge */
        }

        /* Close icon styling */
        .close-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 24px;
            height: 24px;
            cursor: pointer;
            transition: transform 0.3s ease;
            z-index: 10;
        }

        .close-icon:hover {
            transform: rotate(90deg);
        }

        .close-icon::before,
        .close-icon::after {
            content: "";
            position: absolute;
            width: 24px;
            height: 2px;
            background-color: #777;
            top: 50%;
            left: 0;
        }

        .close-icon::before {
            transform: rotate(45deg);
        }

        .close-icon::after {
            transform: rotate(-45deg);
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .logo {
            width: 60px;
            height: 60px;
            background-color: #3366cc;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .logo span {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        /* Using class for h2 instead of tag selector */
        .form-title {
            color: #333;
            margin-top: 10px;
            margin-bottom: 5px;
            font-size: 1.5em;
            font-weight: bold;
        }

        .subtitle {
            color: #777;
            font-size: 14px;
            margin-bottom: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        /* Using class for label instead of tag selector */
        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        /* Using classes for form elements instead of tag selectors */
        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .form-textarea {
            height: 100px;
            resize: vertical;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        /* Using class for button instead of tag selector */
        .btn {
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            border: none;
            flex: 1;
        }

        .submit-btn {
            background-color: #3366cc;
            color: white;
        }

        .submit-btn:hover {
            background-color: #2855b0;
        }

        .cancel-btn {
            background-color: #f0f0f0;
            color: #333;
        }

        .cancel-btn:hover {
            background-color: #e0e0e0;
        }

        .required {
            color: #e74c3c;
            margin-left: 3px;
        }

        .file-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 2px dashed #ddd;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .file-upload:hover {
            border-color: #3366cc;
        }

        .file-upload-icon {
            width: 50px;
            height: 50px;
            background-color: #f0f0f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .file-upload-icon svg {
            width: 25px;
            height: 25px;
            fill: #777;
        }

        .file-upload-text {
            color: #555;
            margin-bottom: 10px;
        }

        .file-upload-btn {
            background-color: #f0f0f0;
            color: #333;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .file-upload-btn:hover {
            background-color: #e0e0e0;
        }

        .file-upload input[type="file"] {
            display: none;
        }

        .file-types {
            color: #777;
            font-size: 12px;
            margin-top: 5px;
        }

        .preview-container {
            display: none;
            margin-top: 10px;
            text-align: center;
        }

        .preview-image {
            max-width: 100%;
            max-height: 200px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .date-time-group {
            display: flex;
            gap: 10px;
        }

        .date-time-group>div {
            flex: 1;
        }

        .duration-container {
            display: flex;
            gap: 10px;
        }

        .duration-container>div {
            flex: 1;
        }
    </style>
</head>

<body>
    <!-- Main Navigation -->
    <nav class="main-nav">
        <div class="container">
            <div class="nav-content">
                <div class="logololo">
                    <!-- Replace with your logolo image -->
                    <img src="/path-to-your-logolo.png" alt="">
                </div>
                <div class="nav-right">
                    <button class="create-btn {{ auth()->user()->role === 'admin' ? 'admin' : '' }}" id="showPopupBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Create
                    </button>
                    <div class="user-menu">
                        <div class="user-avatar">{{ auth()->user()->name[0] }}</div>
                        <span>{{ auth()->user()->name }}</span>
                        <div class="dropdown-menu" id="userDropdown">
                            <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
                                class="dropdown-item">
                                Your Profile
                            </a>

                            <a href="#" class="dropdown-item">Account Settings</a>
                            <a href= "{{ route('myevents') }}" class="dropdown-item">Your Events</a>

                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                logout
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
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
        </a>
        <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
        </a>
        <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
        </a>
        <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <line x1="18" y1="20" x2="18" y2="10"></line>
                <line x1="12" y1="20" x2="12" y2="4"></line>
                <line x1="6" y1="20" x2="6" y2="14"></line>
            </svg>
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @if (auth()->user()->role === 'admin')
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

        <!-- Button to trigger popup -->
        {{-- <button id="showPopupBtn">Create Event</button> --}}

        <!-- Overlay for popup -->
        <div class="overlay">
            <!-- The popup form -->
            <div class="popup">
                <!-- Close icon -->
                <div class="close-icon" id="closePopup"></div>

                <div class="header">
                    <div class="logo">
                        <span>E</span>
                    </div>
                    <h2 class="form-title">Create New Event</h2>
                    <p class="subtitle">
                        Complete the form below to create your event
                    </p>
                </div>

                <!-- Display success or error messages -->
                <div id="responseMessage" style="display: none;" class="alert"></div>

                <form id="eventForm" class="event-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="eventName">
                            Event Name <span class="required">*</span>
                        </label>
                        <input class="form-input" type="text" id="eventName" name="eventName"
                            placeholder="Enter event name" required />
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Event Date & Time <span class="required">*</span>
                        </label>
                        <div class="date-time-group">
                            <div>
                                <input class="form-input" type="date" id="eventDate" name="eventDate" required />
                            </div>
                            <div>
                                <input class="form-input" type="time" id="eventTime" name="eventTime" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Event Duration <span class="required">*</span>
                        </label>
                        <div class="duration-container">
                            <div>
                                <select class="form-select" id="durationHours" name="durationHours" required>
                                    <option value="" disabled selected>
                                        Hours
                                    </option>
                                    <option value="1">1 hour</option>
                                    <option value="2">2 hours</option>
                                    <option value="3">3 hours</option>
                                    <option value="4">4 hours</option>
                                    <option value="5">5 hours</option>
                                    <option value="6">6 hours</option>
                                    <option value="8">8 hours</option>
                                    <option value="10">10 hours</option>
                                    <option value="12">12 hours</option>
                                    <option value="24">24 hours</option>
                                    <option value="48">2 days</option>
                                    <option value="72">3 days</option>
                                </select>
                            </div>
                            <div>
                                <select class="form-select" id="durationMinutes" name="durationMinutes" required>
                                    <option value="0" selected>
                                        0 minutes
                                    </option>
                                    <option value="15">15 minutes</option>
                                    <option value="30">30 minutes</option>
                                    <option value="45">45 minutes</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eventType">
                            Event Type <span class="required">*</span>
                        </label>
                        <select class="form-select" id="eventType" name="eventType" required>
                            <option value="" disabled selected>
                                Select event type
                            </option>
                            <option value="mariage">Mariage</option>
                            <option value="concert">Concert</option>
                            <option value="seminary">Seminary</option>
                            <option value="match">Match</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="numberOfPlaces">
                            Number of Places <span class="required">*</span>
                        </label>
                        <select class="form-select" id="numberOfPlaces" name="numberOfPlaces" required>
                            <option value="" disabled selected>
                                Select capacity
                            </option>
                            <option value="250">>=250</option>
                            <option value="500">>=500</option>
                            <option value="1000">>=1000</option>
                            <option value="2500">>=2500</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eventLocation">
                            Event Location <span class="required">*</span>
                        </label>
                        <select class="form-select" id="eventLocation" name="eventLocation" required>
                            <option value="" disabled selected>
                                Select venue location
                            </option>
                            <option value="conference_center">
                                Conference Center
                            </option>
                            <option value="stadium">Stadium</option>
                            <option value="concert_hall">Concert Hall</option>
                            <option value="exhibition_center">
                                Exhibition Center
                            </option>
                            <option value="hotel_ballroom">
                                Hotel Ballroom
                            </option>
                            <option value="outdoor_venue">Outdoor Venue</option>
                            <option value="theater">Theater</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Event Image / Flyer</label>
                        <div class="file-upload">
                            <div class="file-upload-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z">
                                    </path>
                                </svg>
                            </div>
                            <div class="file-upload-text">
                                Drag & drop image here or
                            </div>
                            <label for="eventImage" class="file-upload-btn">
                                Browse Files
                            </label>
                            <input type="file" id="eventImage" name="eventImage" accept="image/*" />
                            <div class="file-types">
                                Accepted formats: JPG, PNG, GIF (max 5MB)
                            </div>
                            <div class="preview-container">
                                <img id="imagePreview" class="preview-image" src=""
                                    alt="Event Image Preview" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="eventDescription">Event Description</label>
                        <textarea class="form-textarea" id="eventDescription" name="eventDescription"
                            placeholder="Add any additional details about your event..."></textarea>
                    </div>

                    <div class="button-group">
                        <button type="button" class="btn cancel-btn" id="cancelBtn">
                            Cancel
                        </button>
                        <button type="submit" class="btn submit-btn">
                            Create Event
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Creation Options -->
        <div class="creation-options">
            <div class="option-card">
                <div class="option-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                </div>
                <h3 class="option-title">Start from scratch</h3>
                <p class="option-description">Add all your event details, create new tickets, and set up recurring
                    events</p>
                <button class="option-button" id="showPopupBtn">Create event</button>
            </div>
            <div class="option-card">
                <div class="option-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
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
                <p class="option-description">Answer a few quick questions to generate a ready-to-publish event almost
                    instantly</p>
                <button class="option-button {{ auth()->user()->role === 'admin' ? 'admin' : 'primary' }}">Create with
                    AI</button>
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
                        <div class="checklist-description">Publish an event to reach millions of people on C_event.
                        </div>
                    </div>
                    <div class="draft-label">Draft</div>
                </div>

                <!-- Continue where the previous code left off, inside the checklist-items div -->
                <div class="checklist-item">
                    <div class="checklist-info">
                        <div class="checklist-title">Set up your organizer profile</div>
                        <div class="checklist-description">Highlight your brand by adding your organizer name, image,
                            and bio.</div>
                    </div>
                    <div class="draft-label">Draft</div>
                </div>
                <div class="checklist-item">
                    <div class="checklist-info">
                        <div class="checklist-title">Add your bank account</div>
                        <div class="checklist-description">Get paid for future ticket sales by entering your bank
                            details.</div>
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    C_event Marketing Experts
                </div>
                <div class="resource-content">
                    <h3 class="resource-title">Digital Marketing Guide for Events</h3>
                    <a href="#" class="resource-link">
                        Read article
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="resource-card">
                <div class="resource-tag">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    C_event Marketing Experts
                </div>
                <div class="resource-content">
                    <h3 class="resource-title">Safety Playbook for Events</h3>
                    <a href="#" class="resource-link">
                        Read article
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="resource-card">
                <div class="resource-tag">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    C_event Marketing Experts
                </div>
                <div class="resource-content">
                    <h3 class="resource-title">10 Best Ways to Market and Sell Out Your Event</h3>
                    <a href="#" class="resource-link">
                        Read article
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        COURSE
                    </div>
                    <div class="course-duration">23 min</div>
                    <div class="course-content">
                        <h3 class="course-title">Create Tickets</h3>
                        <p class="course-description">This guide will show you how to create and edit ticket types for
                            your event.</p>
                        <a href="#" class="course-link">View course</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-image"></div>
                    <div class="course-tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        COURSE
                    </div>
                    <div class="course-duration">7 min</div>
                    <div class="course-content">
                        <h3 class="course-title">Getting Paid via C_event</h3>
                        <p class="course-description">This guide walks through adding a payout method to your event if
                            you're selling tickets using C_event's Payment Processing.</p>
                        <a href="#" class="course-link">View course</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-image"></div>
                    <div class="course-tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        COURSE
                    </div>
                    <div class="course-duration">14 min</div>
                    <div class="course-content">
                        <h3 class="course-title">Order Confirmation</h3>
                        <p class="course-description">Learn all about sharing details like parking, checking in at the
                            event, things to bring, and more.</p>
                        <a href="#" class="course-link">View course</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-image"></div>
                    <div class="course-tag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <button class="nav-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
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
                    <p class="spotlight-quote">"As someone who completely relies on people buying tickets to [our]
                        event to get the word out, C_event plays a huge part in my business."</p>
                    <p class="spotlight-bio">Prashant Kakad, Founder of Jai Ho! Dance Party and Bollywood Dreams
                        Entertainment</p>
                </div>
            </div>
            <div class="spotlight-controls">
                <button class="nav-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <button class="nav-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </div>
                    <h3 class="help-title">Your account</h3>
                </div>
                <div class="help-card">
                    <div class="help-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                            </path>
                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                        </svg>
                    </div>
                    <h3 class="help-title">Marketing an event</h3>
                </div>
                <div class="help-card">
                    <div class="help-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
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
        // Get the elements
        const showPopupBtn = document.getElementById("showPopupBtn");
        const overlay = document.querySelector(".overlay");
        const popup = document.querySelector(".popup");
        const closePopup = document.getElementById("closePopup");
        const cancelBtn = document.getElementById("cancelBtn");
        const fileInput = document.getElementById("eventImage");
        const previewContainer = document.querySelector(".preview-container");
        const imagePreview = document.getElementById("imagePreview");
        const eventForm = document.getElementById("eventForm");
        const responseMessage = document.getElementById("responseMessage");

        // Show the popup when the button is clicked
        showPopupBtn.addEventListener("click", function() {
            overlay.style.display = "flex"; // Show the overlay with popup
        });

        // Close the popup when the close icon is clicked
        closePopup.addEventListener("click", function() {
            overlay.style.display = "none";
            resetForm();
        });

        // Close the popup when the cancel button is clicked
        cancelBtn.addEventListener("click", function() {
            overlay.style.display = "none";
            resetForm();
        });

        // Close the popup when clicking outside of it
        overlay.addEventListener("click", function(event) {
            if (event.target === overlay) {
                overlay.style.display = "none";
                resetForm();
            }
        });

        // Prevent popup from closing when clicking inside it
        popup.addEventListener("click", function(event) {
            event.stopPropagation();
        });

        // Handle file upload preview
        fileInput.addEventListener("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function() {
                    imagePreview.setAttribute("src", this.result);
                    previewContainer.style.display = "block";
                });

                reader.readAsDataURL(file);
            }
        });

        // Form submission with AJAX
        eventForm.addEventListener("submit", function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch("{{ route('events.store') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    credentials: 'same-origin'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        responseMessage.className = "alert alert-success";
                        responseMessage.textContent = data.message;
                        responseMessage.style.display = "block";
                        resetForm();

                        // Hide success message after 3 seconds
                        setTimeout(() => {
                            responseMessage.style.display = "none";
                            overlay.style.display = "none";
                        }, 3000);
                    } else {
                        responseMessage.className = "alert alert-danger";
                        responseMessage.textContent = data.message || "An error occurred";
                        responseMessage.style.display = "block";
                    }
                })
                .catch(error => {
                    responseMessage.className = "alert alert-danger";
                    responseMessage.textContent = "An error occurred while creating the event";
                    responseMessage.style.display = "block";
                });
        });

        // Function to reset the form
        function resetForm() {
            eventForm.reset();
            previewContainer.style.display = "none";
            responseMessage.style.display = "none";
        }


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

            // logolout functionality
            document.getElementById('logoutBtn').addEventListener('click', function(e) {
                e.preventDefault();
                // Add logolout functionality here
                alert('Logging out...');
            });
        });
    </script>
</body>

</html>
