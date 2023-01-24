<div>
    <a href="{{route('posts.create')}}" class="btn btn-dark">Add New Post</a>
    <input type="search" class="form-control" wire:model.debounce.500ms="search" placeholder="Search here ....">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Created</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->desc}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>
                <a href="{{route('posts.edit', $post)}}"  class="btn btn-outline-primary">Edit</a>
                <button wire:click="delete({{$post->id}})" class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}


    <button wire:click="ShowForm" class="btn btn-outline-primary">Add New</button>


    @if($show)
    <div>
        <form wire:submit.prevent="Store">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" wire:model.lazy="title" class="form-control"  placeholder="your title">
                @error('title') <span class="error" style="color: red">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea class="form-control" wire:model="desc" rows="3"></textarea>
                @error('desc') <span class="error" style="color: red">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3" wire:loading.remove>
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
            <div wire:loading>
                Loading...
            </div>
        </form>
    </div>
    @endif
</div>
