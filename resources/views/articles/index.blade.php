@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">               	
                <div class="row">
                    <h4 class="col-auto me-auto">
                        Articles							
                    </h4>	       
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createArticleModal">
                            Create Article
                        </button>                          
                        @include('articles.create-modal')
                    </div>	
                </div>		
                <div class="mt-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Title</th>								
                                <th>Category</th>	
                                @if (auth()->user()->is_admin)
                                    <th>User</th>
                                @endif	
                                <th>Created At</th>		
                                <th>Published At</th>		
                                <th></th>						
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($articles) == 0)
                                <tr> 
                                    <td></td>
                                    <td></td>
                                    <td>No articles found</td> 
                                    <td></td>
                                    <td></td>
                                </tr>
                            @else
                                @foreach ($articles as $key => $article)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <a href="{{ url('articles/' . $article->id)}}">{{ $article->title}}</a>
                                        </td>								
                                        <td>{{ $article->category_id}}</td>
                                        @if (auth()->user()->is_admin)
                                            <td>{{ $article->user->name }}</td>
                                        @endif	
                                        <td>{{  $article->created_at }}</td>
                                        <td>{{  $article->published_at }}</td>
                                        <td class="flex-row"> 
                                            <a type="button" class="btn btn-sm btn-secondary" href="{{ route('articles.edit', $article->id) }}">Edit </a>    
                                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline">
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