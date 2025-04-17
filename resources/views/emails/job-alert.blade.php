<!DOCTYPE html>
<html>
<head>
    <title>Job Alert</title>
</head>
<body>
    <h1>New Job Listings</h1>
    <ul>
        @foreach($jobs as $job)
            <li>{{ $job->title }} - {{ $job->company }}</li>
        @endforeach
    </ul>
</body>
</html>
