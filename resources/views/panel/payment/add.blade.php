@extends('.layouts.master')

@section('content')
    <h3 class="m-b-20">Add new request</h3>
    @if(empty($users) || count($users) == 0)
        <div class="warning-flash">There is no any user yet.</div>
    @else
        <div class="container">
            <form method="post" action="{{ route('addPayment') }}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="control-group m-b-10" >
                    <label>Amount</label>
                    <input type="text" class="form-control" name="amount" placeholder="amount" required="required">
                </div>
                <div class="control-group m-b-10" >
                    <label>Receiver</label>
                    <select class="form-control" name="receiverID">
                        @foreach ($users as $key => $user)
                            <option value="{{ $user['id'] }}" selected="selected">
                                {{ $user['name'] }} ({{ $user['email'] }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <label>Files</label>
                <div class="input-group control-group increment" >
                    <input type="file" name="files[]" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-success add" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                </div>
                <div class="clone hide">
                    <div class="control-group input-group" style="margin-top:10px">
                        <input type="file" name="files[]" class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
            </form>
        </div>
    @endif
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".remove",function(){
                $(this).parents(".control-group").remove();
            });
        });
    </script>
@endsection
