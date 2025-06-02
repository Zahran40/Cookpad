<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Resep - Sup Ayam Favorit</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css?family=Inter:400,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #fff;
            margin: 0;
            padding: 0;
            color: #222;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            padding: 32px 32px 24px 32px;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .header {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-bottom: 12px;
        }

        .btn {
            border: none;
            border-radius: 6px;
            padding: 10px 24px;
            font-size: 16px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s;
        }

        .btn-delete {
            background: #fff;
            color: #f44336;
            border: 2px solid #f44336;
            margin-right: auto;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-save {
            background: #fff;
            color: #222;
            border: 2px solid #ddd;
        }

        .btn-publish {
            background: #ff9800;
            color: #fff;
            border: none;
        }

        .main-content {
            display: flex;
            gap: 32px;
        }

        .photo-section {
            width: 260px;
            min-width: 220px;
            background: #faf8f6;
            border-radius: 8px;
            height: 340px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #bdbdbd;
            font-size: 18px;
            border: 1px solid #f2ede8;
        }

        .photo-section .icon {
            font-size: 48px;
            margin-bottom: 12px;
        }

        .photo-section .desc {
            font-weight: 700;
            color: #888;
            margin-bottom: 4px;
        }

        .photo-section .subdesc {
            font-size: 14px;
            color: #bdbdbd;
        }

        .form-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .title-input {
            font-size: 28px;
            font-weight: 700;
            background: #faf8f6;
            border: none;
            outline: none;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 8px;
            width: 100%;
        }

        .user-row {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 6px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
        }

        .username {
            font-weight: 700;
            color: #222;
            font-size: 16px;
        }

        .user-handle {
            color: #888;
            font-size: 15px;
        }

        .story-textarea {
            width: 100%;
            min-height: 48px;
            background: #faf8f6;
            border: none;
            border-radius: 6px;
            padding: 12px 16px;
            font-size: 15px;
            resize: none;
            margin-bottom: 8px;
        }

        .section-row {
            display: flex;
            gap: 32px;
            margin-top: 24px;
        }

        .section-col {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .section-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 2px;
        }

        .label-row {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 6px;
        }

        .label {
            font-size: 15px;
            color: #888;
            min-width: 60px;
        }

        .input-small {
            background: #faf8f6;
            border: none;
            border-radius: 6px;
            padding: 7px 12px;
            font-size: 15px;
            width: 110px;
        }

        .textarea-section {
            width: 100%;
            min-height: 120px;
            background: #faf8f6;
            border: none;
            border-radius: 6px;
            padding: 12px 16px;
            font-size: 15px;
            resize: vertical;
            margin-top: 6px;
        }

        @media (max-width: 900px) {

            .main-content,
            .section-row {
                flex-direction: column;
                gap: 18px;
            }

            .photo-section {
                width: 100%;
                min-width: 0;
                height: 220px;
            }
        }
    </style>
</head>

<body>
    <form id="upload-form" action=" {{route ('resep.store')}}" method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="header">
            <button class="btn btn-delete">
                <span style="font-size:18px;">🗑️</span> Hapus
            </button>
            <button class="btn btn-save">Simpan dan Tutup</button>
            <button class="btn btn-publish">Terbitkan</button>
        </div>
        <div class="main-content">
            <div class="photo-section">
            @csrf
            <label for="gambar_resep" style="cursor:pointer;">
                <div class="icon">📷</div>
                <div class="desc">[Opsional] Foto Resep</div>
                <div class="subdesc">Tambahkan foto akhir masakan</div>
            </label>
            <input type="file" id="gambar_resep" name="gambar_resep" accept="image/*" style="display:none;" onchange="previewImage(event)">
            <img id="preview" src="#" alt="Preview" style="display:none; max-width: 180px; margin-top: 10px; border-radius:8px;">
        </div>
        <div class="form-section">
            <input class="title-input" type="text" name="nama_resep" placeholder="[Wajib] Judul: Sup Ayam Favorit" required>
            <div class="user-row">
                <img class="avatar" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Vincent Simbolon">
                <span class="username">Vincent Simbolon</span>
                <span class="user-handle">@vincentjcas</span>
            </div>
            <textarea class="story-textarea" name="deskripsi"
            placeholder="[Opsional] Cerita di balik masakan ini. Apa atau siapa yang menginspirasimu? Apa yang membuatnya istimewa? Bagaimana caramu menikmatinya? Gunakan @ untuk menandai pengguna lain."></textarea>
            <div class="section-row">
                <div class="section-col">
                    <div class="section-title">Bahan-bahan</div>
                    <textarea class="textarea-section" placeholder="
                    2 buah wortel" name="bahan" required></textarea>
                </div>
                <div class="section-col">
                    <div class="section-title">Langkah</div>
                    <div class="label-row">
                        <span class="label">Lama memasak</span>
                        <input class="input-small" name="waktu_pembuatan" type="text" placeholder="1 jam 30 menit" required>
                    </div>
                    <textarea class="textarea-section" name="langkah"
                    placeholder="1. Potong ayam menjadi beberapa bagian, sisihkan." required></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
</body>

</html>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>