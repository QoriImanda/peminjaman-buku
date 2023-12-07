<!-- Modal -->
<div class="modal fade" id="editListBuku{{$listBuku->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('listBuku.update', $listBuku->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode</label>
                        <input type="text" class="form-control" name="kode_buku" id="exampleInputEmail1" value="{{$listBuku->kode_buku}}"
                            placeholder="Kode Buku" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input type="text" class="form-control" name="judul_buku" id="exampleInputEmail1" value="{{$listBuku->kode_buku}}"
                            placeholder="Tambahkan Judul" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" id="exampleInputEmail1" value="{{$listBuku->kode_buku}}"
                            placeholder="Tambahkan Pengarang" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Gambar</label>
                        <input type="file" class="form-control" name="foto" id="exampleInputEmail1"
                            placeholder="Tambahkan Gambar" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori</label>
                        <select name="kategori_id" id="" class="form-control">
                            <option value="{{$listBuku->kategori_id}}">{{$listBuku->kategori->kategori}}</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
