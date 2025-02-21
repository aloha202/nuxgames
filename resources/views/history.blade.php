<x-app-layout>
    <div class="page">
        <table>
            <tr>
                <th>Type</th>
                <th>Number</th>
                <th>Win</th>
            </tr>
            @foreach($histories as $history)
            <tr>
                <td>{{ $history->type }}</td>
                <td>{{ $history->number }}</td>
                <td>{{ $history->amount_formatted }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
