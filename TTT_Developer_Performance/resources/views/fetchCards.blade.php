<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Trello Boards and Cards</h1>

    @if(count($cardsWithDetails) > 0)
        <table border="1">
            <thead>
                <tr>
                    <th>Board Name</th>
                    <th>List Name</th>
                    <th>Card Title</th>
                    <th>Card Description</th>
                    <th>Members</th>
                    <th>Plugin Value (Points)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cardsWithDetails as $card)
                    <tr>
                        <td>{{ $card['board_name'] }}</td>
                        <td>{{ $card['list_name'] }}</td>
                        <td>{{ $card['card_title'] }}</td>
                        <td>{{ $card['card_description'] }}</td>
                        <td>
                            @foreach($card['members'] as $member)
                                {{ $member }}<br>
                            @endforeach
                        </td>
                        <td>
                            @if($card['plugin_value'] && isset($card['plugin_value']['points']))
                                {{ $card['plugin_value']['points'] }}
                            @else
                                No Points
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No data available</p>
    @endif

</body>
</html>
