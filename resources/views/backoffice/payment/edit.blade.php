@extends('.layouts.master')

@section('content')
    <h3 class="m-b-20">Edit new request</h3>

    @include('partials.flash_notification')

    @if(!empty($users) && count($users) != 0 && !empty($transaction))
        <div class="container">
            <form method="post" action="{{ route('paymentEdit', ['id' => $transaction['id']]) }}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <div class="control-group m-b-10" >
                    <label>Amount</label>
                    <input type="text" class="form-control" name="amount" placeholder="amount" required="required" value="{{ $transaction['amount'] }}">
                    @error('amount')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="control-group m-b-10" >
                    <label>Receiver</label>
                    <select class="form-control" name="receiverID">
                        @foreach ($users as $key => $user)
                            @if($user['id'] == $transaction['receiver_id'])
                                <option value="{{ $user['id'] }}" selected="selected">
                                    {{ $user['name'] }} ({{ $user['email'] }})
                                </option>
                            @else
                                <option value="{{ $user['id'] }}">
                                    {{ $user['name'] }} ({{ $user['email'] }})
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('receiverID')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
            </form>
        </div>
    @endif
@endsection
