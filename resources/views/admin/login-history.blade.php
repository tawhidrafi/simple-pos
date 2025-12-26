<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup || POS</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    <section class="bg-gray-50">
        <x-table.table>
            <x-slot name="header">
                <x-table.table-header>
                    <x-table.table-header-cell>User ID</x-table.table-header-cell>
                    <x-table.table-header-cell>User Name</x-table.table-header-cell>
                    <x-table.table-header-cell>Login Time</x-table.table-header-cell>
                    <x-table.table-header-cell>IP Address</x-table.table-header-cell>
                    <x-table.table-header-cell>User Agent</x-table.table-header-cell>
                </x-table.table-header>
            </x-slot>

            @foreach ($loginHistories as $history)
            <x-table.table-row>
                <x-table.table-cell>{{ $history->user->id }}</x-table.table-cell>
                <x-table.table-cell>{{ $history->user->name }}</x-table.table-cell>
                <x-table.table-cell>{{ $history->login_time }}</x-table.table-cell>
                <x-table.table-cell>{{ $history->ip_address }}</x-table.table-cell>
                <x-table.table-cell>{{ $history->user_agent }}</x-table.table-cell>
            </x-table.table-row>
            @endforeach
        </x-table.table>
    </section>
</body>

</html>