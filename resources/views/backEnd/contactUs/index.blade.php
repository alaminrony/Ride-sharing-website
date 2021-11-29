@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'contact'
])
@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">@lang('lang.CONTACT_REQUEST')</h3>
                        </div>
                        <div class="col-4 text-right">
                            {{-- <a href="#" onclick="addbtn()" class="btn btn-sm btn-primary">@lang('lang.ADD_OPTION')</a> --}}

                            {{-- <a href="{{route('bill-options.create')}}" class="btn btn-sm btn-primary">@lang('lang.ADD_OPTION')</a> --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>SL </th>
                                <th>@lang('lang.NAME') </th>
                                <th>@lang('lang.EMAIL') </th>
                                <th>@lang('lang.PHONE') </th>
                                <th>@lang('lang.SUBJECT') </th>
                                <th>@lang('lang.MESSAGE')</th>
                                <th>@lang('lang.CREATED_AT')</th>
                                <th>@lang('lang.ACTION')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach($targets as $contact)
                            <?php $i++; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{Str::limit($contact->message,30)}}</td>
                                <td>{{ datefunction($contact->created_at) }}</td>
                                <td width='10%'>
                                    <form action="{{ route('contact.destroy',$contact->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary contactView"  type="button" data-toggle="modal" data-id='{{$contact->id}}' data-target='#viewCreateModal'>
                                            <i class="fa fa-eye"></i>
                                        </a> 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure')" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $targets->links() }}
            </div>
        </div>
    </div>
</div>

<!--view contact Number Modal -->
<div class="modal fade" id="viewCreateModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div id="CreateModalShow">
        </div>
    </div>
</div>
<!--end view Modal -->
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).on('click', '.contactView', function () {
        var id = $(this).data('id');
        $.ajax({
            url: "{{url('admin/contact-view')}}",
            type: "post",
            data: {id: id},
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log(data);
//                $('#viewCreateModal').modal('show');
                $('#CreateModalShow').html(data.data);
            }
        });

    });
</script>
@endpush