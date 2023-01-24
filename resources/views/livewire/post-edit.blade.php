<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="Update">
        <div class="mb-3">

            <label class="form-label">Title</label>
            <input type="text" wire:model="title" class="form-control"  placeholder="your title">
            @error('title') <span class="error" style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea class="form-control" wire:model="desc" rows="3"></textarea>
            @error('desc') <span class="error" style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
</div>
