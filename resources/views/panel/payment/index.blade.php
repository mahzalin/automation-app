@extends('.layouts.master')

@section('content')
    @if(count($transactions) > 0)
        <h3 class="m-b-20">Payments list</h3>
        <table class="table table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>amount</th>
                <th>date</th>
                <th>status</th>
                <th>receiver</th>
                <th>files</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($transactions as $key => $transaction)
                <tr>
                    <td>{{ $transaction['id'] }}</td>
                    <td>{{ $transaction['amount'] }}</td>
                    <td>{{ $transaction['created_at'] }}</td>
                    <td>{{ $transaction['status'] }}</td>
                    <td>{{ $transaction['receiver']['name'] }} ({{ $transaction['receiver']['email'] }})</td>
                    <td>
                        @foreach ($transaction['files'] as $key => $file)
                            <a href="{{ url('/File/download/' . $file['id']) }}" class="open-status p-5">{{ $file['name'] }}</a>
                            @if($key + 1 < count($transaction['files']))
                                ,
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="warning-flash">You don't have any payment request yet.</div>
    @endif
@endsection
