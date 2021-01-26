<div class="row">
    <div class="col-md-12">
        <input type="hidden" name="id" value="{{ $divisi->id }}" id="id-data">
        <div class="form-group">
            <label @error('nama') class="text-danger" @enderror>Nama Divisi @error('nama') | {{ $message }} @enderror</label>
            <input type="text" name="nama" value="{{ $divisi->nama }}" class="form-control">
        </div>
    </div>
</div>