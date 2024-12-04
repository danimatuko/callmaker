<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
>
    </head>
   <body class="container">

<h1>Call Report</h1>

<form method="GET" action="{{ route('calls.index') }}">
    <div class="grid">
        <fieldset>
            <label for="agent">Filter by Agent:</label>
            <select name="agent_id" id="agent">
                <option value="">All Agents</option>
                @foreach($agents as $agent)
                    <option value="{{ $agent->id }}" {{ request('agent_id') == $agent->id ? 'selected' : '' }}>
                        {{ $agent->name }}
                    </option>
                @endforeach
            </select>
        </fieldset>

        <fieldset>
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" value="{{ request('start_date') }}">
        </fieldset>

        <fieldset>
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" value="{{ request('end_date') }}">
        </fieldset>
    </div>

    <fieldset>
        <button type="submit">Filter</button>
    </fieldset>
</form>


<table>
    <thead>
        <tr>
            <th>Customer</th>
            <th>Agent</th>
            <th>Duration</th>
            <th>Call Time</th>
        </tr>
    </thead>
    <tbody>
        @foreach($calls as $call)
            <tr>
                <td>{{ $call->customer->name }}</td>
                <td>{{ $call->agent->name }}</td>
                <td>{{ $call->duration }} seconds</td>
                <td>{{ $call->call_time }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $calls->links() }}

   </body>
</html>
