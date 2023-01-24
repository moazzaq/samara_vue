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
