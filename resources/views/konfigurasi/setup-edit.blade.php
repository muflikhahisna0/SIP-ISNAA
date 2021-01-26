<div class="row">
    <div class="col-md-6">
    <input type="hidden" name="id" value="{{ $setup->id }}" id="id-data">
        <div class="form-group">
            <label @error('nama_aplikasi') class="text-danger" @enderror>Nama Aplikasi @error('nama_aplikasi') | {{ $message }} @enderror</label>
            <input type="text" name="nama_aplikasi" value="{{ $setup->nama_aplikasi }}" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label @error('jumlah_hari_kerja') class="text-danger" @enderror>Jumlah Hari Kerja @error('jumlah_hari_kerja') | {{ $message }} @enderror</label>
            <input type="text" name="jumlah_hari_kerja" value="{{ $setup->jumlah_hari_kerja }}" class="form-control">
        </div>
    </div>
</div>