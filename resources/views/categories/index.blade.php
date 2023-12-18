@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">               	
                <div class="row">
                    <h4 class="col-auto me-auto">
                        Categories							
                    </h4>	       
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                            Create Category
                        </button>                          
                        @include('categories.create-modal')
                    </div>	
                </div>		
                <div class="mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>								
                                <th>Created At</th>		
                                <th></th>						
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($categories) == 0)
                                <tr> 
                                    <td></td>
                                    <td></td>
                                    <td>No Categories found</td> 
                                    <td></td>
                                </tr>
                            @else
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name}}</td>								
                                        <td>{{  $category->created_at }}</td>
                                        <td class="flex-row"> 
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-sm btn-danger" value="Delete"
                                                    onclick="return confirm('Are you sure?')" />
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach 
                            @endif	
                        </tbody>
                    </table>
                </div>			
            </div>
        </div>
	</div>
@endsection