<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Events</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
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

        h1 {
            color: #333;
            margin-top: 10px;
        }

        .create-btn {
            display: inline-block;
            background-color: #3366cc;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        .create-btn:hover {
            background-color: #2855b0;
            transform: translateY(-2px);
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .event-card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .event-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .placeholder-image {
            width: 100%;
            height: 180px;
            background-color: #e9e9e9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 14px;
            border-bottom: 1px solid #eee;
        }

        .event-content {
            padding: 20px;
        }

        .event-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .event-detail {
            display: flex;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .event-label {
            font-weight: bold;
            width: 80px;
            color: #666;
        }

        .event-value {
            color: #333;
        }

        .view-btn {
            display: inline-block;
            background-color: #f0f0f0;
            color: #333;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin-top: 15px;
            transition: all 0.3s ease;
        }

        .view-btn:hover {
            background-color: #e0e0e0;
        }

        .empty-state {
            text-align: center;
            padding: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .empty-state h2 {
            margin-bottom: 15px;
            color: #555;
        }

        .empty-state p {
            color: #777;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <span>E</span>
            </div>
            <h1>All Events</h1>
        </div>

        {{-- <a href="{{ route('events.create') }}" class="create-btn">Create New Event</a> --}}

        @if ($events->count() > 0)
            <div class="events-grid">
                @foreach ($events as $event)
                    <div class="event-card">
                        @if ($event->image_path)
                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->name }}"
                                class="event-image">
                        @else
                            <div class="placeholder-image">No Image Available</div>
                        @endif

                        <div class="event-content">
                            <div class="event-title">{{ $event->name }}</div>

                            <div class="event-detail">
                                <div class="event-label">Date:</div>
                                <div class="event-value">
                                    {{ \Carbon\Carbon::parse($event->start_date_time)->format('M j, Y') }}</div>
                            </div>

                            <div class="event-detail">
                                <div class="event-label">Time:</div>
                                <div class="event-value">
                                    {{ \Carbon\Carbon::parse($event->start_date_time)->format('g:i A') }}</div>
                            </div>

                            <div class="event-detail">
                                <div class="event-label">Type:</div>
                                <div class="event-value">{{ ucfirst($event->type) }}</div>
                            </div>

                            <div class="event-detail">
                                <div class="event-label">Location:</div>
                                <div class="event-value">{{ str_replace('_', ' ', ucfirst($event->location)) }}</div>
                            </div>

                            <a href="#" class="view-btn">View
                                Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h2>No Events Found</h2>
                <p>There are currently no events registered in the system.</p>
                {{-- <a href="{{ route('events.create') }}" class="create-btn">Create Your First Event</a> --}}
            </div>
        @endif
    </div>
</body>

</html>
