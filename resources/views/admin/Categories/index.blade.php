@extends('admin.layout')

@section('content')
    
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
				    <div class="card-header card-header-border-bottom">
					<h2>Table Categories</h2>
                    </div>
                    <div>
                        <a href="{{ url('admin/categories/create' ) }}" class="ml-4 mb-1 btn btn-outline-primary">Add New</a>
                    </div>
				    <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th>Parent</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($categories as $c)
                                <tr>
                                    <td>{{ $c -> id }}</td>
                                    <td>{{ $c -> nama }}</td>
                                    <td>{{ $c -> slug }}</td>
                                    <td>{{ $c -> parent_id }}</td>
                                    <td>
                                        <a href="{{ url('admin/categories/'. $c->id .'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                                    {!! Form::open(['url' => 'admin/categories/'. $c->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                    {!! Form::hidden('_method','DELETE') !!}
                                    {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No Record Found</td>
                                </tr>
                                @endforelse

                            </tbody>

                        </table>
                        {{ $categories->links() }}
                    </div>
                 </div>
        </div>
    </div>
</div>

@endsection