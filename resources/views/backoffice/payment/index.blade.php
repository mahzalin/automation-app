@extends('.layouts.master')

@section('content')
    <h3 class="m-b-20">Payments list</h3>

    @include('partials.flash_notification')

    @if(count($transactions) > 0)
        <table class="table table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>amount</th>
                <th>receiver</th>
                <th>date</th>
                <th>status</th>
                <th>files</th>
                <th>operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($transactions as $key => $transaction)
                <tr>
                    <td><a href="{{ url('backoffice/payment/edit/' . $transaction['id']) }}">{{ $transaction['id'] }}</a></td>
                    <td><a href="{{ url('backoffice/payment/edit/' . $transaction['id']) }}">{{ $transaction['amount'] }}</a></td>
                    <td><a href="{{ url('backoffice/payment/edit/' . $transaction['id']) }}">{{ $transaction['receiver']['name'] }} ({{ $transaction['receiver']['email'] }})</a></td>
                    <td><a href="{{ url('backoffice/payment/edit/' . $transaction['id']) }}">{{ $transaction['created_at'] }}</a></td>
                    <td>{{ $transaction['status'] }}</td>
                    <td>
                        @if(count($transaction['files']) > 0)
                            @foreach ($transaction['files'] as $key => $file)
                                <a href="{{ url('/File/download/' . $file['id']) }}" class="open-status p-5">{{ $file['name'] }}</a>
                                @if($key + 1 < count($transaction['files']))
                                    ,
                                @endif
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if($transaction['status'] == 'PENDING')
                            <form method="post" action="{{ route('paymentStatus', ['id' => $transaction['id']]) }}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="isAccepted" value="1">
                                <button type="submit" class="btn btn-primary btn-success" style="margin-top:10px">Confirm</button>
                            </form>
                        @elseif($transaction['status'] == 'CONFIRM')
                            <form method="post" action="{{ route('paymentStatus', ['id' => $transaction['id']]) }}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="isAccepted" value="0">
                                <button type="submit" class="btn btn-primary btn-danger" style="margin-top:10px">Reject</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
